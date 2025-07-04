<?php
session_start();
include 'includes/db.php';
include 'includes/header.php';

// Only allow admin access
if (!isset($_SESSION['user_id']) || $_SESSION['is_admin'] != 1) {
    header("Location: login.php");
    exit();
}

// Handle status update from admin
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['trip_id'], $_POST['action'])) {
    $trip_id = (int) $_POST['trip_id'];
    $action = $_POST['action'];

    if (in_array($action, ['approved', 'rejected', 'travelled'])) {
        $stmt = $conn->prepare("UPDATE trips SET status = ? WHERE id = ?");
        $stmt->bind_param("si", $action, $trip_id);
        $stmt->execute();
    }
}

// Fetch all trip records with user info
$query = "SELECT trips.id, trips.user_id, trips.destination, trips.travel_date, trips.status, trips.phone, trips.feedback, users.name 
          FROM trips 
          JOIN users ON trips.user_id = users.id 
          ORDER BY trips.travel_date DESC";

$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel | Manage Trips</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>
<body>

<div class="admin-container">
    <h2>Admin Panel - Manage Trips</h2>

    <?php while ($row = $result->fetch_assoc()) : ?>
        <div class="trip-card">
            <p><strong>User:</strong> <?= htmlspecialchars($row['name']) ?></p>
            <p><strong>Phone:</strong> <?= htmlspecialchars($row['phone']) ?></p>
            <p><strong>Destination:</strong> <?= htmlspecialchars($row['destination']) ?></p>
            <p><strong>Travel Date:</strong> <?= htmlspecialchars($row['travel_date']) ?></p>
            <p><strong>Status:</strong> <?= htmlspecialchars($row['status']) ?></p>
            <p><strong>Feedback:</strong> <?= nl2br(htmlspecialchars($row['feedback'])) ?></p>

            <form method="post">
                <input type="hidden" name="trip_id" value="<?= $row['id'] ?>">
                <select name="action" required>
                    <option value="">-- Change status --</option>
                    <option value="approved">Approve</option>
                    <option value="rejected">Reject</option>
                    <option value="travelled">Mark as Travelled</option>
                </select>
                <button type="submit">Update</button>
            </form>
        </div>
    <?php endwhile; ?>
</div>

<?php include 'includes/footer.php'; ?>
</body>
</html>

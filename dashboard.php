<?php
session_start();
include 'includes/db.php';
include 'includes/header.php';

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch user trips from `trips` table
$sql = "SELECT destination, travel_date, status FROM trips WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Categorize trips by status
$approved = [];
$rejected = [];
$travelled = [];
$Pending = [];

while ($row = $result->fetch_assoc()) {
    if ($row['status'] === 'approved') {
        $approved[] = $row;
    } elseif ($row['status'] === 'rejected') {
        $rejected[] = $row;
    } elseif ($row['status'] === 'travelled') {
        $travelled[] = $row;
    } elseif ($row['status'] === 'Pending') {
        $Pending[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | Canvas Travels</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>
<body>

<section class="dashboard">
    <h2>Welcome to Your Dashboard</h2>

    <!-- Approved (Upcoming) -->
    <div class="trip-section">
        <h3>Upcoming Approved Trips</h3>
        <?php if (!empty($approved)) : ?>
            <?php foreach ($approved as $trip) : ?>
                <div class="trip-card">
                    <strong>Destination:</strong> <?= htmlspecialchars($trip['destination']) ?><br>
                    <strong>Date:</strong> <?= htmlspecialchars($trip['travel_date']) ?><br>
                    <strong>Status:</strong> ✅ <?= ucfirst($trip['status']) ?>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No upcoming trips yet.</p>
        <?php endif; ?>
    </div>

        <!-- Pending -->
    <div class="trip-section">
        <h3>Your Pending Trips</h3>
        <?php if (!empty($Pending)) : ?>
            <?php foreach ($Pending as $trip) : ?>
                <div class="trip-card pending">
                    <strong>Destination:</strong> <?= htmlspecialchars($trip['destination']) ?><br>
                    <strong>Date:</strong> <?= htmlspecialchars($trip['travel_date']) ?><br>
                    <strong>Status:</strong> 🔜 <?= ucfirst($trip['status']) ?>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No pending trips.</p>
        <?php endif; ?>
    </div>

    <!-- Travelled (Completed) -->
    <div class="trip-section">
        <h3>Completed Trips</h3>
        <?php if (!empty($travelled)) : ?>
            <?php foreach ($travelled as $trip) : ?>
                <div class="trip-card travelled">
                    <strong>Destination:</strong> <?= htmlspecialchars($trip['destination']) ?><br>
                    <strong>Date:</strong> <?= htmlspecialchars($trip['travel_date']) ?><br>
                    <strong>Status:</strong> 🏁 <?= ucfirst($trip['status']) ?>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No completed trips yet.</p>
        <?php endif; ?>
    </div>

    <!-- Rejected Trips -->
    <div class="trip-section">
        <h3>Rejected Trips</h3>
        <?php if (!empty($rejected)) : ?>
            <?php foreach ($rejected as $trip) : ?>
                <div class="trip-card rejected">
                    <strong>Destination:</strong> <?= htmlspecialchars($trip['destination']) ?><br>
                    <strong>Date:</strong> <?= htmlspecialchars($trip['travel_date']) ?><br>
                    <strong>Status:</strong> ❌ <?= ucfirst($trip['status']) ?>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No rejected trips.</p>
        <?php endif; ?>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
</body>
</html>

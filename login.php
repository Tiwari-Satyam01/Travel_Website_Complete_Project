<?php
session_start();
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, name, password, is_admin FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($row = $res->fetch_assoc()) {
        if ($row['password'] === $password) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['is_admin'] = $row['is_admin'];

            if ($row['is_admin'] == 1) {
                header("Location: admin_panel.php");
            } else {
                header("Location: destinations.php");
            }
            exit;
        }
    }

    $error = "Invalid email or password";
}

include 'includes/header.php';
?>

<link rel="stylesheet" href="css/login.css">
<link rel="stylesheet" href="css/responsive.css">
<div class="login-background">
    <div class="login-container">
        <div class="form-box">
            <h2>Login to Your Account</h2>
            <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
            <form method="post">
                <div class="input-group">
                    <label>Email Address</label>
                    <input type="email" name="email" required placeholder="Enter your email">
                </div>
                <div class="input-group">
                    <label>Password</label>
                    <input type="password" name="password" required placeholder="Enter your password">
                </div>
                <button type="submit" class="btn">Login</button>
                <p class="signup-link">Don't have an account? <a href="signup.php">Sign up here</a></p>
            </form>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

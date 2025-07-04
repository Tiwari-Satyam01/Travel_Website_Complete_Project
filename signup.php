<?php
session_start();
include 'includes/header.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Canvas Travels | Sign Up</title>
  <link rel="stylesheet" href="css/signup.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/responsive.css">
</head>
<body>

<main>
  <div class="signup-container">
    <div class="form-box">
      <h2>Create Account</h2>
      <?php
      if (isset($_SESSION['error'])) {
        echo "<p class='error'>" . $_SESSION['error'] . "</p>";
        unset($_SESSION['error']);
      }
      ?>
      <form action="includes/register_process.php" method="post">
        <div class="input-group">
          <label for="fullname">Full Name</label>
          <input type="text" id="fullname" name="fullname" required />
        </div>
        <div class="input-group">
          <label for="email">Email Address</label>
          <input type="email" id="email" name="email" required />
        </div>
        <div class="input-group">
          <label for="phone">Phone Number</label>
          <input type="tel" id="phone" name="phone" required />
        </div>
        <div class="input-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required minlength="6" />
        </div>
        <div class="input-group">
          <label for="cpassword">Confirm Password</label>
          <input type="password" id="cpassword" name="cpassword" required />
        </div>
        <button type="submit" class="btn">Sign Up</button>
        <p class="login-link">Already have an account? <a href="login.php">Log in here</a></p>
      </form>
    </div>
  </div>
</main>

<?php include 'includes/footer.php'; ?>

</body>
</html>

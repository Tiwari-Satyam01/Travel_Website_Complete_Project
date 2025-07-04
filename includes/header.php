<?php include 'session.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/main.css" />

  <?php
  $page = basename($_SERVER['PHP_SELF']);
  if ($page == 'index.php') echo '<link rel="stylesheet" href="css/home.css">';
  elseif ($page == 'destinations.php') echo '<link rel="stylesheet" href="css/destinations.css">';
  elseif ($page == 'booking.php') echo '<link rel="stylesheet" href="css/register.css">';
  elseif ($page == 'admin_panel.php') echo '<link rel="stylesheet" href="css/admin.css">';
  ?>

  <title>Canvas Travels</title>
</head>
<body>
<header>
  <div class="container">
    <h1 class="logo">Canvas Travels</h1>
    <nav>
      <ul>
        <?php
        // If admin and on admin panel page, We only show Admin Panel + Logout
        if (is_logged_in() && isset($_SESSION['isadmin']) && $_SESSION['isadmin'] == 1 && $page == 'admin_panel.php') {
        ?>
          <li><a href="admin_panel.php" <?= $page == 'admin_panel.php' ? 'class="active"' : '' ?>>Admin Panel</a></li>
          <li><a href="logout.php">Logout</a></li>
        <?php
        } else {
        ?>
          <li><a href="index.php" <?= $page == 'index.php' ? 'class="active"' : '' ?>>Home</a></li>
          <li><a href="destinations.php" <?= $page == 'destinations.php' ? 'class="active"' : '' ?>>Destinations</a></li>

          <?php if (is_logged_in()): ?>
            <?php if ($_SESSION['is_admin'] == 1): ?>
              <li><a href="admin_panel.php" <?= $page == 'admin_panel.php' ? 'class="active"' : '' ?>>Admin Panel</a></li>
              <li><a href="logout.php">Logout</a></li>
            <?php else: ?>
              <li><a href="booking.php" <?= $page == 'booking.php' ? 'class="active"' : '' ?>>Book Now</a></li>
              <li><a href="dashboard.php" <?= $page == 'dashboard.php' ? 'class="active"' : '' ?>>Dashboard</a></li>
              <li><a href="logout.php">Logout</a></li>
            <?php endif; ?>
          <?php else: ?>
            <li><a href="signup.php">Sign Up</a></li>
            <li><a href="login.php">Login</a></li>
          <?php endif; ?>
        <?php
        }
        ?>
      </ul>
    </nav>
  </div>
</header>
</body>
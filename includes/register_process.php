<?php
include 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $conn->real_escape_string($_POST['fullname']); // Still use the form field 'fullname'
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $password = $conn->real_escape_string($_POST['password']);
    $cpassword = $conn->real_escape_string($_POST['cpassword']);

    if ($password !== $cpassword) {
        $_SESSION['error'] = "Passwords do not match!";
        header("Location: ../signup.php");
        exit();
    }

    // Not hashing since you requested plain password
    $stmt = $conn->prepare("INSERT INTO users (name, email, phone, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $phone, $password);

    if ($stmt->execute()) {
        header("Location: ../login.php?msg=Registered successfully");
    } else {
        $_SESSION['error'] = "Something went wrong!";
        header("Location: ../signup.php");
    }
    $stmt->close();
}
?>

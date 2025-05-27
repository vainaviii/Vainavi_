<?php
session_start();
if ($_POST['username'] === 'admin' && $_POST['password'] === 'admin123') {
    $_SESSION['user_id'] = 1;
    $_SESSION['role'] = 'admin';
    header("Location: admin_dashboard.php");
    exit();
} else {
    die("Invalid credentials!");
}
?>

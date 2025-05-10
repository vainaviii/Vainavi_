<?php
session_start();
include 'config.php'; // Database connection

$username = $_POST['username'];
$password = $_POST['password'];

// Fetch user from the database
$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql); // Prevent SQL injection
$stmt->bind_param("s", $username); // "s" = string type
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  $user = $result->fetch_assoc();
  // Verify password against the hashed password in the database
  if (password_verify($password, $user['password'])) {
    // Login success: Store user data in session
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['role'] = $user['role'];
    header("Location: admin_dashboard.php"); // Redirect to admin panel
    exit();
  } else {
    echo "Invalid password!";
  }
} else {
  echo "User not found!";
}
?>

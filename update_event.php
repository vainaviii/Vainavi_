<?php
session_start();
include 'config.php';

$id = $_POST['id'];
$title = htmlspecialchars($_POST['title']);
$date = $_POST['date'];
$location = htmlspecialchars($_POST['location']);

// Update the database
$sql = "UPDATE events SET title = ?, date = ?, location = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi", $title, $date, $location, $id);
$stmt->execute();

header("Location: admin_dashboard.php");
?>

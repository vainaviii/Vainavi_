<?php
session_start();
include 'config.php';

$id = $_POST['id'];
$title = htmlspecialchars($_POST['title']);
$date = $_POST['date'];
$location = htmlspecialchars($_POST['location']);


$sql = "UPDATE events SET title = ?, date = ?, location = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi", $title, $date, $location, $id);
$stmt->execute();

if (empty($_POST['title']) || empty($_POST['date'])) {
  die("Error: Title and date are required!");
}

header("Location: admin_dashboard.php");
?>

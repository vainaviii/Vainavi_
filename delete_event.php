<?php
session_start();
include 'config.php';

// Delete event
$event_id = $_GET['id'];
$sql = "DELETE FROM events WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $event_id);
$stmt->execute();

header("Location: admin_dashboard.php");
?>

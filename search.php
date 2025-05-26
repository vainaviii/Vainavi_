<?php
include 'config.php';

$query = $_GET['query'] ?? '';
$stmt = $conn->prepare("SELECT * FROM events WHERE title LIKE ?");
$searchTerm = "%$query%";
$stmt->bind_param("s", $searchTerm);
$stmt->execute();

$result = $stmt->get_result();
$events = $result->fetch_all(MYSQLI_ASSOC);

header('Content-Type: application/json');
echo json_encode($events);

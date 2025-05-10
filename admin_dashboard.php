<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Add New Event</h1>
  <form action="add_event.php" method="POST">
    <input type="text" name="title" placeholder="Title" required>
    <input type="date" name="date" required>
    <input type="text" name="location" placeholder="Location" required>
    <input type="text" name="category" placeholder="Category">
    <textarea name="description" placeholder="Description"></textarea>
    <input type="number" name="price" step="0.01" placeholder="Price">
    <button type="submit">Add Event</button>
  </form>

  <h2>Existing Events</h2>
  <table>
    <tr>
      <th>Title</th>
      <th>Date</th>
      <th>Actions</th>
    </tr>
    <?php

    $sql = "SELECT * FROM events";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
      echo "<tr>
              <td>{$row['title']}</td>
              <td>{$row['date']}</td>
              <td>
                <a href='edit_event.php?id={$row['id']}'>Edit</a>
                <a href='delete_event.php?id={$row['id']}'>Delete</a>
              </td>
            </tr>";
    }
    ?>
  </table>
</body>
</html>

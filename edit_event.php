<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Event</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Edit Event</h1>
  <form action="update_event.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $event['id']; ?>">
    <input type="text" name="title" value="<?php echo $event['title']; ?>" required>
    <input type="date" name="date" value="<?php echo $event['date']; ?>" required>
    <input type="text" name="location" value="<?php echo $event['location']; ?>" required>
    <button type="submit">Update Event</button>
  </form>
</body>
</html>

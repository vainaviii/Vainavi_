<?php
include 'php/config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Events</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Navigation (copy from your existing navbar) -->

    <div class="container">
        <h1>Upcoming Events</h1>

        <!-- Search Bar -->
        <input type="text" id="search" placeholder="Search events...">

        <!-- Event List -->
        <div class="event-grid" id="event-container">
            <?php
            $result = $conn->query("SELECT * FROM events");
            while($row = $result->fetch_assoc()):
            ?>
            <div class="event-card">
                <h3><?= $row['title'] ?></h3>
                <p>Date: <?= $row['date'] ?></p>
                <p>Location: <?= $row['location'] ?></p>
            </div>
            <?php endwhile; ?>
        </div>
    </div>

    <script>
    // AJAX Search
    document.getElementById('search').addEventListener('input', function(e) {
        fetch(`php/search.php?query=${e.target.value}`)
            .then(response => response.json())
            .then(events => {
                document.getElementById('event-container').innerHTML = events.map(event => `
                    <div class="event-card">
                        <h3>${event.title}</h3>
                        <p>Date: ${event.date}</p>
                        <p>Location: ${event.location}</p>
                    </div>
                `).join('');
            });
    });
    </script>
</body>
</html>

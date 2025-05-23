<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lost_found";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT item_name, category, description, location_lost, date_lost, image_path FROM lost_items ORDER BY date_lost DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="item-card">';
        
        if (!empty($row["image_path"])) {
            echo '<div class="item-image">';
            echo '<img src="' . htmlspecialchars($row["image_path"]) . '" alt="Lost Item Image" style="max-width: 100%; height: auto;">';
            echo '</div>';
        }

        echo '<div class="item-details">';
        echo '<h4>' . htmlspecialchars($row["item_name"]) . '</h4>';
        echo '<p><strong>Category:</strong> ' . htmlspecialchars($row["category"]) . '</p>';
        echo '<p>' . htmlspecialchars($row["description"]) . '</p>';
        echo '<p><strong>Lost At:</strong> ' . htmlspecialchars($row["location_lost"]) . '</p>';
        echo '<p><strong>Date:</strong> ' . htmlspecialchars($row["date_lost"]) . '</p>';
        echo '<span class="item-status status-lost">Lost</span>';
        echo '</div>';

        echo '</div>';
    }
} else {
    echo "<p>No lost items found.</p>";
}

$conn->close();
?>

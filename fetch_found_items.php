<?php
$servername = "localhost";
$username = "root"; // your DB username
$password = "";     // your DB password
$dbname = "lost_found"; // your DB name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT item_name, category, description, location_found, date_found, image_path FROM found_items ORDER BY date_found DESC";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="item-card">';
        if (!empty($row["image_path"])) {
            echo '<div class="item-image"><img src="' . htmlspecialchars($row["image_path"]) . '" alt="Found Item Image" style="width:100%; height:100%; object-fit:cover;"></div>';
        } else {
            echo '<div class="item-image"><i class="fas fa-box"></i></div>';
        }
        echo '<div class="item-details">';
        echo '<h4>' . htmlspecialchars($row["item_name"]) . '</h4>';
        echo '<p><strong>Category:</strong> ' . htmlspecialchars($row["category"]) . '</p>';
        echo '<p>' . htmlspecialchars($row["description"]) . '</p>';
        echo '<p><strong>Found At:</strong> ' . htmlspecialchars($row["location_found"]) . '</p>';
        echo '<p><strong>Date:</strong> ' . htmlspecialchars($row["date_found"]) . '</p>';
        echo '<span class="item-status status-found">Found</span>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "<p>No found items available.</p>";
}

$conn->close();
?>

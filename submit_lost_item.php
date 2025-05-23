<?php
// Database connection
$host = "localhost";
$user = "root";
$pass = "";
$db = "lost_found";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle file upload
$imagePath = '';
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $uploadDir = "uploads/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }
    $imagePath = $uploadDir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);
}

// Prepare SQL
$stmt = $conn->prepare("
    INSERT INTO lost_items (item_name, category, description, location_lost, date_lost, image_path, contact_info)
    VALUES (?, ?, ?, ?, ?, ?, ?)
");

$stmt->bind_param("sssssss",
    $_POST['item_name'],
    $_POST['category'],
    $_POST['description'],
    $_POST['location'],
    $_POST['date'],
    $imagePath,
    $_POST['contact']
);

// Execute
if ($stmt->execute()) {
    echo "<h2>✅ Lost item reported successfully.</h2>";
} else {
    echo "<h2>❌ Error: " . $stmt->error . "</h2>";
}

$conn->close();
?>

<?php
include 'connect12.php'; // Include your DB config

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Handle image upload
$imagePath = '';
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $targetDir = "uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true);
    }
    $imagePath = $targetDir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);
}

// Prepare SQL (without serial_number)
$stmt = $conn->prepare("
    INSERT INTO found_items 
    (item_name, category, description, location_found, date_found, image_path, contact_info, current_location) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)
");

$stmt->bind_param("ssssssss",
    $_POST['item_name'],
    $_POST['category'],
    $_POST['description'],
    $_POST['location'],
    $_POST['date'],
    $imagePath,
    $_POST['contact'],
    $_POST['current_location']
);

// Execute
if ($stmt->execute()) {
    echo "<h2>✅ Found item reported successfully.</h2>";
} else {
    echo "<h2>❌ Error: " . $stmt->error . "</h2>";
}

$conn->close();
?>

<?php
// login_connection.php

// 1. Connect to Database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lost_found";

$conn = new mysqli($servername, $username, $password, $dbname);

// 2. Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 3. Get User Input
$email = $_POST['email'];
$password = $_POST['password'];

// 4. Fetch user from Database
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

// 5. Check if User Exists
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    // 6. Verify Password
    if (password_verify($password, $row['password'])) {
        // Successful login
        
        // Optional: Start session
        // session_start();
        // $_SESSION['user_id'] = $row['id'];
        
        // Redirect to index.html
        header("Location: index.php");
        exit();
        
    } else {
        echo "Incorrect Email or Password.";
    }
} else {
    echo "Incorrect Email or Password.";
}

// 7. Close Connection
$conn->close();
?>

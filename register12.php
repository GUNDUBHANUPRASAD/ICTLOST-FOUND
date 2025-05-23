<?php
// register12.php

// 1. Connect to Database
$servername = "localhost";
$username = "root"; // your MySQL username
$password = "";     // your MySQL password
$dbname = "lost_found"; // change to your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// 2. Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 3. Get User Input
$fName = trim($_POST['fName']);
$lName = trim($_POST['lName']);
$email = trim($_POST['email']);
$password = $_POST['password'];

// 4. Check if Email Already Exists
$checkEmail = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($checkEmail);

if ($result->num_rows > 0) {
    echo "Error: Email already registered. <a href='register.html'>Try again</a>";
} else {
    // 5. Hash the Password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // 6. Insert into Database
    $sql = "INSERT INTO users (first_name, last_name, email, password) 
            VALUES ('$fName', '$lName', '$email', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {
        echo "<h3>Registration successful!</h3>";
        echo "<a href='index2.php'><button>Go to Login</button></a>"; // Updated link
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// 7. Close Connection
$conn->close();
?>

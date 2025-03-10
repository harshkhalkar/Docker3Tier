<?php
session_start();

$servername = "db";
$username = "root";
$password = "Pass1972";
$dbname = "info";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data and sanitize
$name = htmlspecialchars(trim($_POST["name"]));
$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
$website = filter_var($_POST["website"], FILTER_SANITIZE_URL);
$comment = htmlspecialchars(trim($_POST["comment"]));
$gender = htmlspecialchars($_POST["gender"]);

// Validate required fields
if (empty($name) || empty($email) || empty($gender)) {
    die("Error: Name, Email, and Gender are required.");
}

// Validate email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Error: Invalid email format.");
}

// Prepare and execute the SQL statement
$stmt = $conn->prepare("INSERT INTO users (name, email, website, comment, gender) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $email, $website, $comment, $gender);

if ($stmt->execute()) {
    echo "New record created successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close resources
$stmt->close();
$conn->close();
?>

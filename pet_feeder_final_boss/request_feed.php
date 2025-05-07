<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "feeder_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert feed request
$sql = "INSERT INTO feed_requests (request_status) VALUES (0)";
if ($conn->query($sql) === TRUE) {
    echo "Feeding request sent!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>

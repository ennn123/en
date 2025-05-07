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

// Reset the most recent request
$sql = "UPDATE feed_requests SET request_status = 0 ORDER BY id DESC LIMIT 1";

if ($conn->query($sql) === TRUE) {
    echo "Feed request reset";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>

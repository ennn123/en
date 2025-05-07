<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "feeder_db";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed");
}

// Insert a new feed request with status 1
$sql = "INSERT INTO feed_requests (request_status, last_updated) VALUES (1, NOW())";
$conn->query($sql);

$conn->close();

echo "Feeding request sent!";
?>

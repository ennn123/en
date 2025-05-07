<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "feeder_db"; // Your DB name

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed");
}

// Get the latest row
$sql = "SELECT request_status FROM feed_requests ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($row = $result->fetch_assoc()) {
    echo $row["request_status"]; // Will return "0" or "1"
} else {
    echo "0";
}

$conn->close();
?>

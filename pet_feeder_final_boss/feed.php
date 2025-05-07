<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "feeder_db";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) die("Connection failed");

$conn->query("UPDATE tbl_data SET feed_status = 1 ORDER BY id DESC LIMIT 1");
$conn->close();

echo "Feeding triggered!";
?>

<?php
// File: config/db.php
$host = 'localhost';
$db   = 'task_manager';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
?>
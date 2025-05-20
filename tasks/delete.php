<?php
include '../config/db.php';
session_start();
if (!isset($_SESSION['user_id'])) header('Location: ../auth/login.php');

$id = $_GET['id'];
$conn->query("DELETE FROM tasks WHERE id = $id");
header('Location: ../dashboard.php');
?>

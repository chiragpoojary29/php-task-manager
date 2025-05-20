<?php
include '../config/db.php';
session_start();
if (!isset($_SESSION['user_id'])) header('Location: ../auth/login.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO tasks (user_id, title, description) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $user_id, $title, $desc);
    $stmt->execute();
    header('Location: ../dashboard.php');
}
?>
<form method="post">
    <input type="text" name="title" placeholder="Task Title" required><br>
    <textarea name="description" placeholder="Task Description"></textarea><br>
    <button type="submit">Add Task</button>
</form>

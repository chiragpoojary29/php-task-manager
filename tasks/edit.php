<?php
include '../config/db.php';
session_start();
if (!isset($_SESSION['user_id'])) header('Location: ../auth/login.php');

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM tasks WHERE id = $id");
$task = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE tasks SET title = ?, description = ?, status = ? WHERE id = ?");
    $stmt->bind_param("sssi", $title, $desc, $status, $id);
    $stmt->execute();
    header('Location: ../dashboard.php');
}
?>
<form method="post">
    <input type="text" name="title" value="<?= $task['title'] ?>" required><br>
    <textarea name="description"><?= $task['description'] ?></textarea><br>
    <select name="status">
        <option <?= $task['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
        <option <?= $task['status'] == 'Completed' ? 'selected' : '' ?>>Completed</option>
    </select><br>
    <button type="submit">Update Task</button>
</form>


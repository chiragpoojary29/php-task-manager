<?php
include 'config/db.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: auth/login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

$result = $conn->query("SELECT * FROM tasks WHERE user_id = $user_id");
?>
<h2>Welcome to your Dashboard</h2>
<a href="auth/logout.php">Logout</a>
<a href="tasks/add.php">Add New Task</a>
<h3>Your Tasks</h3>
<ul>
<?php while ($row = $result->fetch_assoc()): ?>
    <li>
        <strong><?= htmlspecialchars($row['title']) ?></strong> - <?= htmlspecialchars($row['status']) ?><br>
        <a href="tasks/edit.php?id=<?= $row['id'] ?>">Edit</a>
        <a href="tasks/delete.php?id=<?= $row['id'] ?>">Delete</a>
    </li>
<?php endwhile; ?>
</ul>

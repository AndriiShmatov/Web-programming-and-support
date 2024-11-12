<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.html");
    exit();
}

echo "Welcome, " . htmlspecialchars($_SESSION['user']) . "!";
echo "<br><a href='logout.php'>Logout</a>";
?>

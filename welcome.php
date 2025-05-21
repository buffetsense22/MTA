<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: dashboard.php');
    exit();
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: homepage.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to Masterthaiparts, <?= htmlspecialchars($_SESSION['username']) ?>!</h1>
        <p>You have successfully logged in.</p>
        <a href="welcome.php?logout=true">Log Out</a>
    </div>
</body>
</html>

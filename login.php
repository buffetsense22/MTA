<?php
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['user'];
    $password = $_POST['pass'];

    $sql = "SELECT * FROM login WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($password === $row['password']) {
            // Password is correct
            header("Location: dashboard.php");
            exit();
        } else {
            // Incorrect password
            header("Location: homepage.php?login-failed=password&user=" . urlencode($username));
            exit();
        }
    } else {
        // Username not found
        header("Location: homepage.php?login-failed=username&pass=" . urlencode($password));
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>

<?php
require 'utils/connection.php';
$mysqli = connectDb("user_db", "root");

$username = $_POST['username'];
$pass = password_hash($_POST['password'], PASSWORD_BCRYPT);

$statement = $mysqli->prepare("SELECT * FROM users WHERE username = ?");
if (!$statement) {
    die('Database query failed: ' . $mysqli->error);
}

$statement -> bind_param("s", $username);
$statement -> execute();
$result = $statement -> get_result();
$user = $result -> fetch_assoc();

if ($user && password_verify($password, $user['password'])) {
    header('Location: ../index.php');
    exit();
} else {
    header("Location: pages/login.php?error=1&username=" . urlencode($username));
    exit();
}

$statement -> close();
$mysqli -> close;

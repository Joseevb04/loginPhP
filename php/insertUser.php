<?php
require 'utils/connection.php';
$mysqli = connectDb("user_db", "root");

define("VALID_ADMIN_EMAIL", "xunta.gal");

$list = $_POST;

foreach ($list as $key => $value) {
    $$key = $value;
}

$password = password_hash($password, PASSWORD_BCRYPT);

$query = "insert into users(id, name, email, type_user, username, password) values (NULL,?,?,?,?,?);";

$statement = $mysqli -> prepare($query);

$statement -> bind_param("sssss", $name, $email, $type_user, $username, $password);

if (!($type_user === '1' && (substr($email, -strlen(VALID_ADMIN_EMAIL))) === VALID_ADMIN_EMAIL)) {
    header('Location: pages/register.php?error=2');
    exit();
} else {
    if ($statement -> execute()) {
        header('Location: principal.php');
        exit();
    } else {
        header('Location: pages/register.php?error=1');
        exit();
    }
}

$stmt -> close();
$mysqli -> close();

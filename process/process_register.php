<?php
require_once("../function/helper.php");
require_once("../function/dbconnect.php");


$username = $_POST['username'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];
$hashedPassword = md5($password);


if ($password != $confirmpassword) {
    header('location: ' . BASE_URL . 'register.php?process=failed');
    exit();
} else {
    $query = $dbconnect->prepare("SELECT * FROM admin WHERE username=? AND password=?");
    $query->bind_param("ss", $username, $hashedPassword);
    $query->execute();
    $result = $query->get_result();
    if ($result->num_rows > 0) {
        header("location: " . BASE_URL . 'register.php?process=error');
    } else {
        $query = $dbconnect->prepare("INSERT INTO admin (username, password) VALUES (?,?)");
        $query->bind_param("ss", $username, $hashedPassword);
        $query->execute();
        header("location: " . BASE_URL);
    }
}

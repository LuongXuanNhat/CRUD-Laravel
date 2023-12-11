<?php
require_once('../function/helper.php');
require_once('../function/dbconnect.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashedPassword = md5($password);

    $query = $dbconnect->prepare("SELECT * FROM admin WHERE username=? AND password=?");
    $query->bind_param("ss", $username, $hashedPassword);
    $query->execute();

    $result = $query->get_result();

    if ($result->num_rows > 0) {
        session_start();
        $_SESSION['id'] =  $result->fetch_assoc()['id'];
        $_SESSION['username'] =  $result->fetch_assoc()['username'];

        header("location: " . BASE_URL . 'dashboard.php');
    } else {
        echo "Login Failed";
    }


    $query->close();
} else {
    header("location: ../login.php");
}

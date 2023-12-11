<?php

require_once('../function/helper.php');
require_once('../function/dbconnect.php');

$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$phone = $_POST['phone'];


$query = $dbconnect->prepare("INSERT INTO staff (name, email, address, phone) VALUES (?, ?, ?, ?)");
$query->bind_param("ssss", $name, $email, $address, $phone);
$query->execute();

if ($query->error) {
    header("location: " . BASE_URL . "dashboard.php?page=home&process=failed");
} else {
    header("location: " . BASE_URL . "dashboard.php?page=home&process=success");
}

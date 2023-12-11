<?php
require_once('../function/helper.php');
require_once('../function/dbconnect.php');

$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$id = $_POST['id'];


$query = $dbconnect->prepare('UPDATE staff SET name=?, email=?, address=?, phone=? WHERE id=?');
$query->bind_param("ssssi", $name, $email, $address, $phone, $id);

if ($query->execute()) {
    header('location: ' . BASE_URL . 'dashboard.php?page=home&process=success');
} else {
    echo "Error updating record: " . $dbconnect->error;
}

$query->close();

$dbconnect->close();

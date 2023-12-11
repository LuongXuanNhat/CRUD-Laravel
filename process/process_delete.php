<?php

require_once("../function/helper.php");
require_once("../function/dbconnect.php");

$id = $_GET['id'];
$query = $dbconnect->prepare("DELETE FROM staff WHERE id=?");
$query->bind_param("i", $id);


if ($query->execute()) {
    header("location: " . BASE_URL . "dashboard.php?page=home&process=success");
}

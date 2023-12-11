<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "phpcrud";


$dbconnect = mysqli_connect($server, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

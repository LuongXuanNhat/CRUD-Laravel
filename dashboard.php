<?php

require_once("function/helper.php");
require_once("function/dbconnect.php");

session_start();
$page = isset($_GET['page']) ? ($_GET['page']) : false;

if ($_SESSION['id'] == null) {
    header("location: " . BASE_URL);
    exit();
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><?php echo $_SESSION['username']; ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= BASE_URL . 'dashboard.php?page=home' ?>">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL . 'dashboard.php?page=create' ?>">Add</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link disabled" href="<?= BASE_URL . 'process/process_logout.php' ?>">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="content">
        <div class="container">
            <div class="sub-content mt-5">
                <?php
                $filename = "page/$page.php";
                if (file_exists($filename)) {
                    include_once($filename);
                } else {
                    echo "404 Not Found";
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>
<?php

$process = isset($_GET['process']) ? $_GET['process'] : false;

?>


<?php

require_once('function/helper.php');
require_once('function/dbconnect.php');

$process = isset($_GET['process']) ? $_GET['process'] : false;
if ($_SESSION["id"] == null) {
    header("location: " . BASE_URL);
    exit();
}

$id = isset($_GET["id"]) ? ($_GET["id"]) : false;

$query = $dbconnect->prepare("SELECT * FROM staff WHERE id= ?");
$query->bind_param("i", $id);
$query->execute();
if ($query->error) {
    echo "Error";
    exit();
}

$result = $query->get_result();
$row = $result->fetch_assoc();


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    <form method="POST" action="<?= BASE_URL . 'process/process_edit.php' ?>">
        <input name='id' name="id" value="<?= $row['id'] ?>" type="hidden">
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name" value="<?= $row['name'] ?>" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Address</label>
            <input type="text" class="form-control" id="address" aria-describedby="emailHelp" name="address" value="<?= $row['address'] ?>" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="<?= $row['email'] ?>" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Phone</label>
            <input type="text" class="form-control" id="phone" aria-describedby="emailHelp" name="phone" value="<?= $row['phone'] ?>" required>
        </div>


        <button type="submit" class="btn btn-primary">Save</button>
    </form>

</body>

</html>
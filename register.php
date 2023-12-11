<?php
require_once("function/helper.php");
require_once("function/dbconnect.php");
$process = isset($_GET['process']) ? ($_GET['process']) : false;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card">
            <div class="card-body login-card-body">
                <?php if ($process == 'failed') : ?>
                    <div class="alert alert-danger" style="background-color: red; padding: 1em;color: white;border-radius: 20px">
                        Password and Confirm Password not match
                    </div>
                <?php endif ?>
                <?php if ($process == 'error') : ?>
                    <div class="alert alert-danger" style="background-color: red; padding: 1em;color: white;border-radius: 20px">
                        Account already exist
                    </div>
                <?php endif ?>
                <form class="form-login" method="POST" action="<?= BASE_URL . 'process/process_register.php' ?>">
                    <div class="form-group">
                        <label for="exampleInputEmail1">UserName</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="confirmpassword" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
</body>

</html>
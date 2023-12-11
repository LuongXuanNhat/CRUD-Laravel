<?php

require_once("function/dbconnect.php");
$process = isset($_POST["process"]) ? $_POST["process"] : false;
?>




<?php if ($process == 'success') : ?>
    <div class="alert alert-success" role="alert">
        Create Success!!!
    </div>
<?php endif; ?>


<?php
$query = $dbconnect->query("SELECT * FROM staff");

?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Phone</th>
        </tr>
    </thead>
    <tbody>
        <?php $id = 1; ?>
        <?php foreach ($query as $p) : ?>
            <tr>
                <th scope="row"><?= $id++ ?></th>
                <td><?= $p['name'] ?></td>
                <td><?= $p['email'] ?></td>
                <td><?= $p['address'] ?></td>
                <td><?= $p['phone'] ?></td>
                <td>
                    <a href="<?= BASE_URL . 'dashboard.php?page=edit&id=' . $p['id'] ?>" class="btn btn-primary">Edit</a>
                    <a href="<?= BASE_URL . 'process/process_delete.php?id=' . $p['id'] ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>
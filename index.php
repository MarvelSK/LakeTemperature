<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Lake Temperatures</title>
    <style>
        table  td, table th {
            vertical-align: middle;
            text-align: center;
            padding: 20px!important;
        }
    </style>
</head>
<body>
<div class="container my-4">
    <header class="d-flex justify-content-between my-4">
        <h1>Lake Temperatures</h1>
        <div>
            <a href="create.php" class="btn btn-primary">Add New Record</a>
        </div>
    </header>

    <?php
    session_start();
    if (isset($_SESSION["delete"])) {
        ?>
        <div class="alert alert-success">
            <?php echo $_SESSION["delete"]; ?>
        </div>
        <?php
        unset($_SESSION["delete"]);
    }
    ?>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Identifier</th>
            <th>Lake Name</th>
            <th>Temperature (°C)</th>
            <th>Reading Date and Time</th>
            <th>Options</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include('includes/db_connection.php');
        $sqlSelect = "SELECT * FROM lake_temperatures WHERE deleted_at IS NULL";
        $result = mysqli_query($conn, $sqlSelect);
        while ($data = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['lake_name']; ?></td>
                <td><?php echo $data['temperature']; ?></td>
                <td><?php echo $data['reading_datetime']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-warning">Edit</a>
                    <a onclick="return confirmDelete();" href="delete.php?id=<?php echo $data['id']; ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this record?");
    }
</script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Add New Record</title>
</head>
<body>
<div class="container my-5">
    <header class="d-flex justify-content-between my-4">
        <h1>Add New Record</h1>
        <div>
            <a href="index.php" class="btn btn-primary">Back</a>
        </div>
    </header>

    <form action="create.php" method="post">
        <div class="form-elemnt my-4">
            <input type="text" class="form-control" name="lake_name" placeholder="Lake Name:">
        </div>
        <div class="form-elemnt my-4">
            <input type="text" class="form-control" name="temperature" placeholder="Temperature (°C):">
        </div>
        <div class="form-element my-4">
            <input type="datetime-local" class="form-control" name="reading_datetime" placeholder="Reading Date and Time:">
        </div>
        <div class="form-element my-4">
            <input type="submit" name="create_record" value="Add Record" class="btn btn-primary">
        </div>
    </form>

    <?php
    if (isset($_POST['create_record'])) {
        include("includes/db_connection.php");

        $lake_name = $_POST['lake_name'];
        $temperature = $_POST['temperature'];
        $reading_datetime = $_POST['reading_datetime'];

        // Insert the record into the database
        $sql = "INSERT INTO lake_temperatures (lake_name, temperature, reading_datetime) VALUES ('$lake_name', '$temperature', '$reading_datetime')";
        if (mysqli_query($conn, $sql)) {
            header("Location: index.php");
            exit();
        } else {
            echo "<div class='alert alert-danger'>Error creating record: " . mysqli_error($conn) . "</div>";
        }
    }
    ?>
</div>
</body>
</html>

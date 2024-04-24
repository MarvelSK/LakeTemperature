<?php
session_start();
include("includes/db_connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM lake_temperatures WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    if (!$row) {
        $_SESSION["edit_error"] = "Record does not exist";
        header("Location: index.php");
        exit;
    }
} else {
    $_SESSION["edit_error"] = "Record ID not provided";
    header("Location: index.php");
    exit;
}

if (isset($_POST['edit_record'])) {
    $lake_name = $_POST['lake_name'];
    $temperature = $_POST['temperature'];
    $reading_datetime = $_POST['reading_datetime'];

    $update_sql = "UPDATE lake_temperatures SET lake_name='$lake_name', temperature='$temperature', reading_datetime='$reading_datetime' WHERE id=$id";

    if (mysqli_query($conn, $update_sql)) {
        $_SESSION["edit_success"] = "Record updated successfully";
        header("Location: index.php");
        exit;
    } else {
        $_SESSION["edit_error"] = "Error updating record: " . mysqli_error($conn);
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<div class="container my-5">
    <header class="d-flex justify-content-between my-4">
        <h1>Edit Record</h1>
        <div>
            <a href="index.php" class="btn btn-primary">Back</a>
        </div>
    </header>

    <?php if (isset($_SESSION["edit_error"])): ?>
        <div class="alert alert-danger"><?php echo $_SESSION["edit_error"]; ?></div>
        <?php unset($_SESSION["edit_error"]); ?>
    <?php endif; ?>

    <form action="" method="post">
        <div class="form-elemnt my-4">
            <input type="text" class="form-control" name="lake_name" placeholder="Lake Name:" value="<?php echo $row["lake_name"]; ?>" required>
        </div>
        <div class="form-elemnt my-4">
            <input type="text" class="form-control" name="temperature" placeholder="Temperature (°C):" value="<?php echo $row["temperature"]; ?>" min="-273.15" step="0.01" required>
        </div>
        <div class="form-element my-4">
            <input type="datetime-local" class="form-control" name="reading_datetime" value="<?php echo date('Y-m-d\TH:i', strtotime($row['reading_datetime'])); ?>" required>
        </div>
        <input type="hidden" value="<?php echo $id; ?>" name="id">
        <div class="form-element my-4">
            <input type="submit" name="edit_record" value="Save Changes" class="btn btn-primary">
        </div>
    </form>
</div>
</body>
</html>

<?php
session_start();

if (isset($_GET['id'])) {
    include("includes/db_connection.php");
    $id = $_GET['id'];

    $sql = "UPDATE lake_temperatures SET deleted_at = NOW() WHERE id = $id";

    if(mysqli_query($conn, $sql)){
        $_SESSION["delete"] = "Record deleted successfully!";
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Record does not exist";
}
?>

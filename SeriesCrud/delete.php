<?php
include 'connect.php';
$id=$_GET['deleteid'];

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM seriescrud WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: read.php"); 
        exit();
    } else {
        die("Delete failed: " . mysqli_error($conn));
    }
} else {
    echo "No ID provided to delete.";
}
?>

<?php
include 'connect.php';

if (isset($_POST['submit'])) {
    // Ensure 'data' is set and is an array
    if (isset($_POST['data']) && is_array($_POST['data'])) {
        $datas = $_POST['data']; // Collect the selected checkboxes
        $alldata = implode(", ", $datas); // Combine them into a string with commas
        echo "You selected: " . $alldata; // Display the result

        // Insert the collected data into the database
        $sql = "INSERT INTO `multipledata` (checkboxData) VALUES ('$alldata')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "Data inserted successfully.";
        } else {
            echo "Failed to insert data.";
        }
    } else {
        echo "Please select at least one option."; // If no checkboxes were selected
    }
}
?>


<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">

        <title>Multiple Checkbox Data</title>
    </head>
    <body>
        <div class="container my-5">
            <form method="post">

                <div class="input-group-text">
                    <input type="checkbox" name="data[]" value="javascript"> JavaScript
                </div>
                <div class="input-group-text">
                    <input type="checkbox" name="data[]" value="react"> React
                </div>
                <div class="input-group-text">
                    <input type="checkbox" name="data[]" value="html"> HTML
                </div>
                <div class="input-group-text">
                    <input type="checkbox" name="data[]" value="css"> CSS
                </div>
                <button class="btn btn-dark my-3" name="submit" type="submit">Submit</button>
            </form>
        </div>
    </body>
</html>

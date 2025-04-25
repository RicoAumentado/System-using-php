<?php

include 'connect.php';
if(isset($_POST['submit'])){
    $place = $_POST['place'];
    $sql = "INSERT INTO `selectdata` (place) VALUES ('$place')";


    $result = mysqli_query($conn,$sql);
    if($result){
        echo "select option  is inserted";
    }else{
        die(mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <title>Select Option</title>
</head>
<body>
    <div class="container my-5">
        <form method="post">
            <div>
        <select name="place" >
            <option value="">Select Option</option>
            <option value="Naic Cavite">Naic Cavite</option>
            <option value="Bacoor Cavite">Bacoor Cavite</option>
            <option value="Imus Cavite">Imus Cavite</option>
        </select>
            </div>
            <div class="my-5">
        <button type="submit" name="submit" class="btn btn-dark my-5 mx-6">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
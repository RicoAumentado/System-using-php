<?php

use LDAP\Result;

include 'connect.php';
if(isset($_POST['submit'])){
    $gender = $_POST['gender'];
    $sql = "INSERT INTO `radiodata` (gender) VALUES ('$gender')";


    $result = mysqli_query($conn,$sql);
    if($result){
       // echo "Data radio button is inserted";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Radio Button</title>
</head>
<body>
    <div class="container my-5">
        <form method = "post">
            <div>
                <input type="radio" name="gender" value="male">Male
            </div>
            <div>
                <input type="radio" name="gender" value="female">Female
            </div>

                <button type="submit" name="submit" class="btn btn-dark my-5">Submit</button>
        </form>


    </div>

</body>
</html>
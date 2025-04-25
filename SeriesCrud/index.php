<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $fname = isset($_POST['fname']) ? $_POST['fname'] : '';
    $lname = isset($_POST['lname']) ? $_POST['lname'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $mobile = isset($_POST['mobile']) ? $_POST['mobile'] : '';
    $datas = $_POST['data'];
    $gender = $_POST['gender'];
    $place = $_POST['place'];
    $alldata = implode(",", $datas);

    if (!empty($fname) && !empty($lname) && !empty($email) && !empty($mobile)) {
        $sql = "INSERT INTO seriescrud (fname, lname, email, mobile,multipledata,gender,place) VALUES ('$fname', '$lname', '$email', '$mobile','$alldata','$gender','$place')";
        
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo header('location:read.php');
        } else {
            die("Error: " . mysqli_error($conn));
        }
    } else {
        echo '<script>alert("All fields are required!");</script>';
    }
}
?>




<!doctype html>
<html>
    <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>PHP crude Series</title>
    </head>
    <body>
    <form method="post">
    <div class="container my-5">
        <div class="mb-3">
        <label class="form-label">First Name</label>
        <input type="text" class="form-control" 
        placeholder="Enter your First Name"  name="fname" autocomplete="off">
        </div>
        <div class="mb-3">
        <label class="form-label">Last Name</label>
        <input type="text" class="form-control" 
        placeholder="Enter your Last Name" name="lname" autocomplete="off">
    </div>
    <div class="mb-3">
        <label class="form-label">  Email Address</label>
        <input type="text" class="form-control" 
        placeholder="Enter your Email Address" name="email" autocomplete="off">
    </div>
    <div class="mb-3">
    <label class="form-label">Mobile</label>
        <input type="mobile" class="form-control" 
        placeholder="Enter your Mobile" name="mobile" autocomplete="off">
    </div>
    <div>
        <input type="checkbox" name="data[]" value="javascript"> JavaScript
        <input type="checkbox" name="data[]" value="react"> React
        <input type="checkbox" name="data[]" value="html"> HTML
        <input type="checkbox" name="data[]" value="css"> CSS
    </div>

    <div class="my-3">
        Gender
        <input type="radio" name="gender" value="male">Male
        <input type="radio" name="gender" value="female">Female
    </div>
    <div>
        <select name="place" >
            <option value="">Select Option</option>
            <option value="Naic Cavite">Naic Cavite</option>
            <option value="Bacoor Cavite">Bacoor Cavite</option>
            <option value="Imus Cavite">Imus Cavite</option>
        </select>
            </div>
            <div class="my-5">
    <button class="btn btn-dark btn-lg my-3" type="submit" name ="submit">Update</button>
    </div>  
    </form>
    </div>
    

    </body>
</html>
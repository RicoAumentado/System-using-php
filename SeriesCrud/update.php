
<?php
include 'connect.php';

$id = $_GET['updateid'] ?? '';

// Fetch existing data
$sql = "SELECT * FROM seriescrud WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$fname = $row['fname'];
$lname = $row['lname'];
$email = $row['email'];
$mobile = $row['mobile'];
$gender = $row['gender'];
$place = $row['place'];
// Handle form submission
if (isset($_POST['update'])) {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $datas = isset($_POST['data']) ? implode(',', $_POST['data']) : '';
  $gender = $_POST['gender'];
  $place = $_POST['place'];
  $sql = "UPDATE seriescrud 
          SET fname='$fname', lname='$lname', email='$email', mobile='$mobile', multipledata='$datas',
          gender='$gender', place = '$place'
          WHERE id=$id";
  $result = mysqli_query($conn, $sql);

  if ($result) {
      header("Location: read.php");
      exit();
  } else {
      die("Update failed: " . mysqli_error($conn));
  }
}

?>



    <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <title>Update</title>
  </head>
  <body>
    <div class="container my-5">
      <form method="post">
        <div class="form-group">
          <label>First Name</label>
          <input type="text" class="form-control" name="fname" autocomplete="FALSE">
        </div>
        <div class="form-group">
          <label>Last Name</label>
          <input type="text" class="form-control" name="lname" autocomplete="FALSE">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="text" class="form-control" name="email" autocomplete="FALSE" >
        </div>
        <div class="form-group">
          <label>Mobile</label>
          <input type="text" class="form-control" name="mobile" autocomplete="false">
        </div>


        <div>
    <input type="checkbox" name="data[]" value="JavaScript">JavaScript
        <input type="checkbox" name="data[]" value="React">React
        <input type="checkbox" name="data[]" value="HTML">HTML
        <input type="checkbox" name="data[]" value="CSS">CSS
    </div>
            <div class="my-3">
            Gender: 
            <input type="radio" name="gender" value="female">Female
            <input type="radio" name="gender" value="male"> Male
          
        </div>
        <div>

        <div>
        <select name="place" >
            <option value="">Select Option</option>
            <option value="Naic Cavite">Naic Cavite</option>
            <option value="Bacoor Cavite">Bacoor Cavite</option>
            <option value="Imus Cavite">Imus Cavite</option>
        </select>
            </div>
        <div class="my-5">
    
        <button type="submit" class="btn btn-dark btn-lg my-3"name="update" >Update</button>
      </form>
      </div>

    </div>
  </body>
</html>
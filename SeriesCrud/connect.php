<?php
$conn = mysqli_connect('localhost', 'root', '', 'crudseries',3307);

if ($conn) {
   // echo "Connection successful";
} 
else {
    die("Connection failed: " . mysqli_connect_error());
}
?>



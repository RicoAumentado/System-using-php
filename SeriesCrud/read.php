<?php
    include 'connect.php'
    
?>
<!doctype html>
<html lang="en">
    <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Display Data</title>

    <style>
        .table-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .table {
            width: 70%; /* Adjust table width as needed */
        }
    </style>
    </head>

    <body>

    <div class="table-container">
        <table class="table table-bordered text-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Sl No</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Subjects</th>
                    <th scope="col">Gender</th>
                    
                    <th scope="col">Place</th>
                    <th scope="col">Operation</th>
                
                </tr>
            </thead>
            <tbody>

                <?php
                // Select query
                $sql = "SELECT * FROM seriescrud";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $fname = $row['fname'];
                    $lname = $row['lname'];
                    $email = $row['email'];
                    $mobile = $row['mobile'];
                    $datas =  $row['multipledata'];
                    $gender =  $row['gender'];
                    $place =  $row['place'];
                    //$allData = implode(",", $datas);
                    echo '<tr>
                    <th scope="row">'.$id.'</th>
                    <td>'.$fname.'</td>
                    <td>'.$lname.'</td>
                    <td>'.$email.'</td>
                    <td>'.$mobile.'</td> 
                    <td>'.$datas.'</td>
                    <td>'.$gender.'</td>
                    <td>'.$place.'</td>
                    <td>
                        <a href="update.php?updateid='.$id.'" class="btn btn-warning btn-sm">Update</a>
                        <a href="delete.php?deleteid='.$id.'" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>';
                }
                ?>

            </tbody>
        </table>
    </div>

    </body>
</html>

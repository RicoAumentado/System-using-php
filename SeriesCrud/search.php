<?php
include 'connect.php';
$results = [];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    if (!empty($_POST['place'])) {
        $place = mysqli_real_escape_string($conn, $_POST['place']);

        $sql = "SELECT * FROM seriescrud WHERE place LIKE '%$place%'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            die("Query failed: " . mysqli_error($conn));
        }
    } else {
        echo "<p>Please enter a place to search.</p>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search by Place</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <form method="post">
            <input type="text" name="place" placeholder="Search by place" class="form-control mb-3" required>
            <button class="btn btn-dark" name="submit">Search</button>
        </form>
    </div>

    <?php if (!empty($results)) : ?>
    <div class="container my-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Subjects</th>
                    <th>Gender</th>
                    <th>Place</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $row): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['fname'] ?></td>
                    <td><?= $row['lname'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['mobile'] ?></td>
                    <td><?= $row['multipledata'] ?></td>
                    <td><?= $row['gender'] ?></td>
                    <td><?= $row['place'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php elseif ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <div class="container">
            <p class="text-danger">No results found for the place you searched.</p>
        </div>
    <?php endif; ?>
</body>
</html>

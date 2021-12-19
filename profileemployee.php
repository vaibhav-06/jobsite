<?php
//for displaying profile of employee
session_start();
include 'temp/_dbconnect.php';

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="temp/stylef.css">
    <title>Profile</title>
  </head>
  <body>
    <?php include 'temp/_navbar.php'; ?>
    <h1 class="text-center my-3">Profile</h1>
    <?php
    $ep = $_SESSION['id'];
    $em = $_SESSION['email'];
    $sql = "SELECT * FROM `jsprofile` WHERE epid='$ep'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
        $e1 = $row['username'];
        $e2 = $row['address'];
        $e3 = $row['education'];
        $e4 = $row['dob'];
        $e5 = $row['phone'];

        echo '<ul class="list-group">
        <li class="list-group-item">Username : '.$e1.'</li>
        <li class="list-group-item">Email : '.$em.'</li>
        <li class="list-group-item">Date of Birth : '.$e4.'</li>
        <li class="list-group-item">Phone Number : '.$e5.'</li>
        <li class="list-group-item">Address : '.$e2.'</li>
        <li class="list-group-item">Education : '.$e3.'</li>
      </ul>';
    ?>

<div class="footer">
<?php include 'temp/_footer.php'; ?>
</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
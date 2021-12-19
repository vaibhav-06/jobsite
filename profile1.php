<?php
session_start();
include 'temp/_dbconnect.php';
//echo 'this is id '.$_SESSION['id'].'';


if($_SERVER['REQUEST_METHOD'] == "POST"){
  $company = $_POST['company'];
  $id = $_SESSION['id'];
  $cid = $_POST['cid'];
  $location = $_POST['location'];


  $sql = "INSERT INTO `jcprofile` (`ecid`, `company`, `cid`, `location`) VALUES ('$id', '$company', '$cid', '$location')";
  $result = mysqli_query($conn,$sql);
  header("location: home1.php");
}
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
    <link rel="stylesheet" href="temp/stylejob.css">
    <title>Create Profile</title>
  </head>
  <body>
  <header>
      <h1>JOBSITE</h1>
      <p1>Find your job of intrest.</p1>
    </header>
    <h1 class="text-center my-3">Create profile</h1>

    <form action="/jsite/profile1.php" method="post">
  <div class="wrapper">
    <div class="title">
      Enter job details
    </div>
    <div class="form">
      <div class="input_field">
      <label for="company" >Company</label>
      <input type="text" class="input" id="company" name="company" placeholder="company" required>
      <div class="invalid-feedback">
      Please enter the company name.
      </div>
      </div>
      <div class="input_field">
      <label for="cid" >Company ID</label>
      <input type="number" class="input" id="cid" name="cid" placeholder="company id" required>
      <div class="invalid-feedback">
      Please enter the company id.
      </div>
      </div>
      <div class="input_field">
      <label for="location" >Location</label>
      <input type="text" class="input" id="location" name="location" placeholder="location" required>
      <div class="invalid-feedback">
      Please enter company location.
      </div>
      </div>
      <div class="input_field">
      <button type="submit" class="btn">Create Profile</button>
      </div>
    </div>
  </div>
</form>

    <!--<form action="/jsite/profile1.php" method="post">
  <div class="mb-3 col-md-5">
    <label for="company" class="form-label">Company</label>
    <input type="text" class="form-control" id="company" name="company">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>-->

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
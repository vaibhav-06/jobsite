<?php
session_start();
include 'temp/_dbconnect.php';
//echo 'this is id '.$_SESSION['id'].'';


if($_SERVER['REQUEST_METHOD'] == "POST"){
  $username = $_POST['username'];
  $address = $_POST['address'];
  $dob =  $_POST['dob'];
  $phone = $_POST['phone'];
  $education = $_POST['education'];
  $id = $_SESSION['id'];

  $sql = "INSERT INTO `jsprofile` (`epid`, `username`, `dob`, `phone`, `address`, `education`) VALUES ('$id', '$username', '$dob', 'phone', '$address', '$education')";
  $result = mysqli_query($conn,$sql);
  header("location: home.php");
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

    <form action="/jsite/profile.php" method="post">
  <div class="wrapper">
    <div class="title">
      Enter job details
    </div>
    <div class="form">
      <div class="input_field">
      <label for="jname" >username</label>
      <input type="text" class="input" id="username" name="username" placeholder="Username" required>
      <div class="invalid-feedback">
      Please enter username.
      </div>
      </div>
      <div class="input_field">
      <label for="dob" >Date of birth</label>
      <input type="date" class="input" id="dob" name="dob" placeholder="DOB" required>
      <div class="invalid-feedback">
      Please enter date of birth.
      </div>
      </div>
      <div class="input_field">
      <label for="phone" >Phone Number</label>
      <input type="tel" class="input" id="phone" name="phone" placeholder="Phone number" required>
      <div class="invalid-feedback">
      Please enter your phone number.
      </div>
      </div>
      <div class="input_field">
      <label for="address" >Address</label>
      <input type="text" class="input" id="address" name="address" placeholder="Address" required>
      <div class="invalid-feedback">
      Please enter your address.
      </div>
      </div>
      <div class="input_field">
      <label for="education" >Education</label>
      <input type="text" class="input" id="education" name="education" placeholder="education" required>
      <div class="invalid-feedback">
      Please enter the education details.
    </div>
      </div>
      <div class="input_field">
      <button type="submit" class="btn">Create Profile</button>
      </div>
    </div>
  </div>
</form>

    <!--<form action="/jsite/profile.php" method="post">
  <div class="mb-3 col-md-5">
    <label for="username" class="form-label">username</label>
    <input type="text" class="form-control" id="username" name="username">
  </div>
  <div class="mb-3 col-md-5">
    <label for="city" class="form-label">city</label>
    <input type="text" class="form-control" id="city" name="city">
  </div>
  
  <div class="mb-3 col-md-5">
    <label for="education" class="form-label">education</label>
    <input type="text" class="form-control" id="education" name="education">
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
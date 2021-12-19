<?php

$login = false;
$showerror = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
include 'temp/_dbconnect.php';
$loginemail = $_POST["loginemail"];
$loginpass = md5($_POST["loginpass"]);


 // $sql = "SELECT * from users where username='$username' AND password='$password'";
  $sql = "SELECT * from `jobcreator` where email='$loginemail'";
  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);
  if($num == 1){
    while($row=mysqli_fetch_assoc($result)){
      if($loginpass == $row['password']){
        $login = true;
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['email'] = $loginemail;
    $_SESSION['id'] = $row['id'];
    $id = $row['id'];

    $sql1 = "SELECT * from `jcprofile` where ecid='$id'";
    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($result1);
    $num1 = mysqli_num_rows($result1);
    $_SESSION['company'] = $row1['company'];

    if($num1 == 1){
      header("location: home1.php");
    }
    else{
      header("location: profile1.php");
    }

     }
      else{
        $showerror = "Invalid credentials";
    }
    }
    
  }
else{
    $showerror = "Invalid credentials";
}
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Login</title>
    <link rel="stylesheet" href="temp/style.css">

</head>

<body>

<?php
  if($showerror){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>error!</strong>'. $showerror .'
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
  </button>
  </div>';
    }
?>
<?php
        if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
          echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> You can now login.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
        }
        if(isset($_GET['jbb']) && $_GET['jbb']=="true"){
          echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> You have posted a job.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
        }
        ?>

    < <h1 class="text-center">Employer</h1>

        <div class="fcontainer">
            <form action="/jsite/login1.php" method="post">
                <div class="mb-3 col-md-12">
                    <label for="loginemail" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="loginemail" name="loginemail" aria-describedby="emailHelp" placeholder="email" required>
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    <div class="invalid-feedback">
                      Please enter email.
                    </div>
                </div>
                <div class="mb-3 col-md-12">
                    <label for="loginpass" class="form-label">Password</label>
                    <input type="password" class="form-control" id="loginpass" name="loginpass" placeholder="email" required>
                    <div class="invalid-feedback">
                      Please enter the password.
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <p>Not registered?<a class="aj" href="/jsite/register1.php"> Click here to register</a></p>
          
        

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>
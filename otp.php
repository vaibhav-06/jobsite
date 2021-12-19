<?php


include 'temp/_dbconnect.php'; 

error_reporting(0);

session_start();


if(isset($_POST["verify"])){

              
    $otp = $_SESSION['otp'];
    $email = $_SESSION['email'];
    $otp_code = $_POST['otp_code'];
    $username=$_SESSION['username'];
    $password=$_SESSION['password'];

    if($otp != $otp_code){
?>
      <script>
          alert("Invalid OTP code");
      </script>
<?php
    }else{
        // mysqli_query($connect, "INSERT users SET status = 1 WHERE email = '$email'");
?>
        <script>
          alert(" OTP matched ");
      </script>
<?php
        $sql = "SELECT * FROM jobseeker WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO jobseeker (email, password)
					VALUES ('$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
?>
        <script>
            alert("Verfiy account done, you may sign in now");
            window.location.replace('login.php');
        </script>
<?php
    }

}


?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
    #otpbox{
        /* margin-left: 200px; */
        /* margin:auto; */
        width:300px;
        margin:auto ;
        margin-top:150px;
       /* margin:200px 200px; */
        background: white;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0,0,0,1);
        padding: 40px 30px;
    }
    h1{
        color:darkslateblue;
    text-align: center;
    margin-bottom: 20px;
    display: block;
    text-transform: capitalize;
    }
    input{
        width: 100%;
    border: 2px solid blue;
    padding: 15px 20px;
    font-size: 1rem;
    border-radius: 5px;
    background: white;
    outline: none;
    transition: .3s;
    }

    button{
        display: block;
    width: 100%;
    padding: 15px 20px;
    text-align: center;
    border: none;
    background:blue;
    outline: none;
    border-radius: 5px;
    font-size: 1.2rem;
    color:white;
    cursor: pointer;
    margin-top: 20px;
    transition: .3s;
    }
    
    input::placeholder{
        color:blue;
        font-weight: 600;
    }
    </style>
</head>
<body bgcolor="lavender">
    
    <div id="otpbox">
    <h1>OTP</h1>
    <form action="" method="POST" class="login-email">
        <input type="number" name="otp_code" placeholder="Enter OTP">
        <br>
        <button name="verify">
            Submit
        </button>
    </form>
    </div>

</body>
</html>
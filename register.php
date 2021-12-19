<?php 

include 'temp/_dbconnect.php'; 
include 'sendmail.php';


error_reporting(0);

session_start();

// if (isset($_SESSION['username'])) {
//     // header("Location: index.php");
// }


if (isset($_POST['submit'])) {
	//$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	$check_query = mysqli_query($conn, "SELECT * FROM jobseeker where email ='$email'");
    $rowCount = mysqli_num_rows($check_query);
    if(!empty($email) && !empty($password)){
        if($rowCount > 0){
        ?>
        <script>
            alert("User with email already exist!");
			window.location.replace('index.php');

        </script>
        <?php
    }else{

	if ($password == $cpassword) {

		//function call
		$otp=rand(100000,999999);
		$_SESSION['otp'] = $otp;
		//$_SESSION['username']=$username;
		$_SESSION['email']=$email;
		$_SESSION['password']=$password;
		
		$check=sendotpmail($otp,$email);
		
	
		if(!$check){
			?>
				<script>
					alert("<?php echo "Register Failed, Invalid Email "?>");
				</script>
			<?php
		}else{
			?>
			<script>
				alert("<?php echo " OTP sent to " . $email ?>");
				window.location.replace('otp.php');

			</script>
			<?php
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}
}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="style.css">

	<title>Register Form</title>

	<script>
		function validateform(){  
var username=document.registrationform.username.value;  
var password=document.registrationform.password.value;  
  
if (username==null || username==" "){  
  alert("Username can't be blank");  
  return false;  
}else if(password.length<6){  
  alert("Password must be at least 6 characters long.");  
  return false;  
  }  
}  
	</script>

</head>
<body style="background-color:lavender;">
	<div class="container">
		<form action="" method="POST" class="login-email" name="registrationform" onsubmit="return validateform()" >
            <p class="login-text" style="font-size: 2rem; font-weight: 800; color:darkblue;">Register</p>
			<!--<div class="input-group">
				<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
			</div> -->
			<div class="input-group">
			    <label style="font-size: 15px;">Email:</label> 
				<input style="border-color: blue; color: blue;" type="email" placeholder="" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
			<label style="font-size: 15px;">Password:</label> 
				<input style="border-color: blue; color: blue;" type="password" placeholder="" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
			<label style="font-size: 15px;">Confirm password:</label> 
            <div class="input-group">
				<input style="border-color: blue; color: blue;" type="password" placeholder="" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
			<div class="input-group">
				<button style="background-color: blue;" name="submit" class="btn">Register</button>
			</div>
			<p style="color:blue;">Have an account? <a href="login.php">Login Here</a>.</p>
		</form>
	</div>
</body>
</html>
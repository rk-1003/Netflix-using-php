<?php

$login=false;
$showError=false;

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	include 'comp.php';
	$username=$_POST["email_phone_no"];
	$password=$_POST["password"];

	$sql="Select * from login_user1 where Email_Phone_no='$username' AND Password='$password'";
	$result = mysqli_query($conn,$sql);
	$num= mysqli_num_rows($result);
	if($num==1)
	{
		$login=true;
		session_start();
		$_SESSION['loggedin'] = true;
		$_SESSION['username'] = $username;
		header("location: ../Home/home.html");
	}
	else
	{
		$showError="Invalid";
    	
	}
}

?>



<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Netflix LogIn Page</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<nav>
			<a href="#"><img src="logg.png" alt="logo"></a>
		</nav>
		<div class="fw">
		<h2>Sign-In</h2>

		
		<form action="page.php" method="post">
			<div class="fc">
			<label>Email or phone number</label><br><br>
			<input type="text" name="email_phone_no">
			
			</div>
			
			<div class="fc">
			<label>password</label><br><br>
			<input type="password" name="password">
			
			</div>
			
			<button><input type="Submit" name="Submit" value="Submit"></button>
			
			<div class="fh">
				<div class="rm">
				<input type="checkbox" id="rem">
				<label for="rem">Remember me</label>
				
				</div>
				<a href="#">Need help?</a>
			</div>
		</form>
		<p>New to Netfix?<a href="reg.php">Sign-up Now</a></p>
		<small>This page is protected by Google reCAPTCHA to ensure you're not a bot. 
            <a href="#">Learn more.</a></small>
		</div>
	</body>
</html>
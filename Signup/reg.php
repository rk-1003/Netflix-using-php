<?php
$servername= "localhost";
$username="root";
$password="";

$database="netflix";

$conn= mysqli_connect($servername,$username,$password,$database);
if(!$conn)
{
	die("Connection Failed:".mysqli_connect_error());
}

if($_SERVER['REQUEST_METHOD']=='POST')
{
	$email=$_POST['email_phone_no'];
	$password=$_POST['password'];
	

	$sql="INSERT INTO `login_user1`(`Email_Phone_no`,`Password`) VALUES('$email','$password')";
	$result=mysqli_query($conn,$sql);

	if(!$result)
	{
		echo "Unsuccessful Insertion of Record::";
	}

	else
	{
		echo "<script>alert('Successfully Submitted:')</script>";
	}
}

?>



<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Registration form</title>
		<link rel="stylesheet" href="style1.css">
	</head>
	<body>
		<img src="back1.jpeg" height="800px" width="5000px">
		<div class="fw">
		<h2>Registration Form</h2>
		<form action="reg.php" method="post"> 
			<div class="fc">
	
			<label>Email or phone number</label><br><br>
			<input type="text" name="email_phone_no">
			
			</div>
			<br>
            <br>
			<div class="fc">
			<label>password</label><br><br>
			<input type="password" name="password">
			
			
<button><input type="Reset" name="Reset" value="Reset"></button>
			<button><input type="Submit" name="Submit" value="Submit"></button>
			<div class="fh">
	
				
				
				</div>
			</div>
</div>
		</form>
		
		</div>
	</body>
</html>
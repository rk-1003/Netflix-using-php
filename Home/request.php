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
	$email=$_POST['email'];
	$name=$_POST['name_of'];
	$director=$_POST['director'];
	$year_of_release=$_POST['year'];
	$language=$_POST['lang'];

	$sql="INSERT INTO `req1`(`Email`,`Name of show`,`Director`,`Year`,`Language`) VALUES('$email','$name',
									'$director','$year_of_release','$language')";
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
		<title>Netflix LogIn Page</title>
		<link rel="stylesheet" href="sty.css">
	</head>
	<body>
		<nav>
			<a href="#">
			<img src="logg.png" alt="logo"></a>
		</nav>
		<div class="fw">
		<h2>Request a Show/Movie</h2>
		<form action="request.php" method="post"> 
			<div class="fc">
	
			<input type="text" name="email">
			<label>Email</label>
			</div>
			
			<div class="fc">
			<input type="text" name="name_of">
			<label>Show/Movie Name</label>
			</div>
			
			<div class="fc">
			<input type="text" name="director">
			<label>Director</label>
			</div>
			
			<div class="fc">
			<input type="Number" name="year">
			<label>Year of Release</label>
			</div>
			
			<div class="fc">
			<input type="text" name="lang">
			<label>Original Language</label>
			</div>
			<button><input type="Reset" value="Reset"></button>
			<button><input type="Submit" value="Submit"></button>
			<div class="fh">
				<div class="rm">
				<input type="checkbox" id="rem">
				<label for="rem">Remember me</label>
				
				</div>
				<a href="#">Need help?</a>
			</div>
		</form>
		
		</div>
	</body>
</html>
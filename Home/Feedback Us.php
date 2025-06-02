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
	$overall=$_POST['experience'];
	$expectations=$_POST['exerience1'];
	$quality=$_POST['e'];
	$Content=$_POST['experien'];
	$safety=$_POST['exper'];

	

	$sql="INSERT INTO `feedback`(`overall`,`expectations`,`quality`,`Content`,`safety`)
	 VALUES('$overall','$expectations','$quality','$Content','$safety')";
	$result=mysqli_query($conn,$sql);

	if(!$result)
	{
		echo "Unsuccessful Insertion of Record::";
	}

	else
	{
		echo "Successfully Submitted:";
	}
}

?>





<!DOCTYPE html>

<html>
	<head>
	<style rel="stylesheet">
	
	
	
	</style>
	<meta name="viewport" content="width=device-width, initial-scale="1">
	
		<title>Feedback Us</title>
	</head>
	
			<body text="silver" bgcolor="Black">
			<CENTER>
			
			<p>
			<!--<img src="Logo/logo1.png" width="250" height="180" border="3">-->
			</p>
			<hr>
			
			</center>
			
			<h1>Share Your Feedback</h1><br>
			<font size="4">
			Thank you for sharing us your ideas, issues, or appreciations. We can't respond individually, but we'll pass it on to the teams who are working 
			to help make <b>Netflix</b> better for everyone.<br><br>
			
			If you have a specific question, or need help to resolve a problem, you can Contact Us</a> page to connect with our 
			support team.<br><br><br>
			<hr color="black" size="10">
			</font>
			
			
			<center>
			
			<form action="Feedback Us.php" method="post">
			<label>1.How would you rate the overall  experience?</label>
		
		
		
		<input type="radio" name="experience" value="Perfect">Perfect
		<input type="radio" name="experience" value="Above Average">Above Average
		<input type="radio" name="experience" value="Average">Average
		<input type="radio" name="experience" value="Below Average">Below Average
		<input type="radio" name="experience" value="Poor">Poor<br><br><br>
			
		
		<label>2.How closely did the journey meet your expectations?</label>
		
		
		<input type="radio" name="exerience1"  value="Perfect">Perfect
		<input type="radio" name="exerience1" value="Above Average">Above Average
		<input type="radio" name="exerience1" value="Average">Average
		<input type="radio" name="exerience1" value="Below Average">Below Average
		<input type="radio" name="exerience1" value="Poor">Poor<br><br><br>
		
		
		<label>3.How was the Quality?</label>
		
		
		<input type="radio" name="e" value="Perfect">Perfect
		<input type="radio" name="e" value="Above Average">Above Average
		<input type="radio" name="e" value="Average">Average
		<input type="radio" name="e" value="Below Average">Below Average
		<input type="radio" name="e" value="Poor">Poor<br><br><br>
		
		
		<label>4.How was the Content?</label>
		
		
		<input type="radio" name="experien" value="Perfect">Perfect
		<input type="radio" name="experien" value="Above Average">Above Average
		<input type="radio" name="experien" value="Average">Average
		<input type="radio" name="experien" value="Below Average">Below Average
		<input type="radio" name="experien" value="Poor">Poor<br><br><br>
		
		
		<label>5.What about the cost?</label>
		<input type="radio" name="experi" value="Perfect">Perfect
		<input type="radio" name="experi"  value="Above Average">Above Average
		<input type="radio" name="experi" value="Average">Average
		<input type="radio" name="experi" value="Below Average">Below Average
		<input type="radio" name="experi" value="Poor">Poor<br><br><br>
		
		
		
		<label>6.How was the safety for content?</label>
		<input type="radio" name="exper" value="Perfect">Perfect
		<input type="radio" name="exper"  value="Above Average">Above Average
		<input type="radio" name="exper" value="Average">Average
		<input type="radio" name="exper" value="Below Average">Below Average
		<input type="radio" name="exper" value="Poor">Poor<br><br><br>
		
	<input type="submit" Value="Submit">
		<input type="Reset" Value="Reset">
		
		
		
		</form>
		
		<br><br>
		
		<font size="5">
		
		<!--<button><a href="Index.html">Home</a></button>-->
		
		</font>
		
		</center>
		
		
		<font>
		 
		<!-- <hr color="black" size="4">
		 <center>
		<font size="12">
		&copy;MakeMyYatra Pvt. Ltd.</font><br>
			<font size="3">Country <b>India USA UAE</b><br>
			All Rights Reserved.

			-->
			</font>
			</center>
		 <hr color="black" size="4">

			
			
			
			
			
			
			
			
			</body>








</html>
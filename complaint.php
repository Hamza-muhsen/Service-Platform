<?php

if(isset($_POST['submit'])){
	
	Require 'Connection.php';
	
	/*echo 'hello';
	print_r($_POST);*/ 
	
	$f_name= filter_var($_POST['f_name'], FILTER_SANITIZE_STRING);
	$l_name= filter_var($_POST['l_name'], FILTER_SANITIZE_STRING);
	$email=  filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$address=  filter_var($_POST['address'], FILTER_SANITIZE_STRING);
	$description=  filter_var($_POST['description'], FILTER_SANITIZE_STRING);
	$phone=$_POST['phone'];
	//first name
	$errors=[];
	if(empty($f_name)){
	$errors[]="First name requiered";
	}elseif(strlen($f_name)>15){
	$errors[]="not allowed";
	}
	//last name

	if(empty($l_name)){
	$errors[]="Last name requiered";
	}elseif(strlen($l_name)>15){
	$errors[]="not allowed";
	}
	//address
	
	if(empty($address)){
	$errors[]="Address requiered";
	}elseif(strlen($address)>50){
	$errors[]="not allowed";
	}
	//phone number
	
	if(empty($phone)){
	$errors[]="Phone number requiered";
	}elseif(strlen($phone)>10){
	$errors[]="not allowed, please enter 10 digits only in phone number field";
	}
	//email

	if(empty($email)){
	$errors[]="Email requiered";
	}elseif(filter_var($email,FILTER_VALIDATE_EMAIL)==false){
	$errors[]=" invalid input, please enter the correct form of email field ";
	}
	//description
	
	if(empty($description)){
	$errors[]="Description field requiered";
	}elseif(strlen($description)>250){
	$errors[]="not allowed, maximum characters (250)";
	}
	
	
	if(empty($errors)){
		
	$sql = "INSERT INTO complaint(first_name,last_name,address,phone_number,email,description_probelm)
	VALUES(:f_name,:l_name,:address,:phone,:email,:description)";
	
	$statement = $pdo->prepare($sql);
	
	$f_name=$_POST['f_name'];
	$l_name=$_POST['l_name'];
	$address=$_POST['address'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$description=$_POST['description'];
	
	$statement->bindParam(":f_name",$f_name,PDO::PARAM_STR);
	$statement->bindParam(":l_name",$l_name,PDO::PARAM_STR);
	$statement->bindParam(":address",$address,PDO::PARAM_STR);
	$statement->bindParam(":phone",$phone,PDO::PARAM_INT);
	$statement->bindParam(":email",$email,PDO::PARAM_STR);
	$statement->bindParam(":description",$description,PDO::PARAM_STR);
	$statement->execute();
    $pdo = null;
	}else{
	var_dump($errors);
	}
	
	
	
}
?>
<!DOCTYPE html>
<html>
	<head>
	<title> Complaint </title>
	<meta name="description" content="Complaint">
	<meta name="Keywords"	 content="Send a complaint">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="Styles.css">
	</head>
	
	<body>
	<div id="container3">
	
	<div id='image'>
	<img src="pictures/Logo_home_2.png" alt="Company logo" class='imgg'>
	</div>
	
	<div id="header1">
	<h1>Electric Power Company (Jordan)</h1>
	</div>
	
	<div id="title2">
	<h2>Complaint Form</h2>
	</div>
	
	<div id="p2">
	<p>If you encounter a problem related to one of the company's services related to electricity 
	or a technical problem related to this site, you can fill in this page with the necessary data
	and press the (Submit) button located at the bottom of the page. Also, days after the file is sent
	, the complainant will be contacted to inquire more about the problem and ways to solve it. You can
	return to the home page by pressing the back button at the bottom of the page.</p>
	</div>
	
	
	<div id="additional-header2">
	<h2>Information</h2>
	</div>
	

	<div id="information2">
		<form  action='complaint.php' method='POST'>
			<label for='f-name'> First Name</label> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type='text' id='f-name' name='f_name'>
		
			
			<label for='L-name'> Last Name</label>  &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type='text' id='L-name' name='l_name'>
			
									
			
			<label for='email'> Email </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type='text' id='email' name='email'>
			
													
			
			<label for='phone'>Phone number</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type='text' id='phone'  name='phone' onkeypress="return event.charCode >= 48 && event.charCode <= 57">
													
													
			
			<label for='address'>Address</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type='text' id='address' name='address'>
													
													
													
			<label for ='des'>Description about the problem</label>
			<textarea  id='des' name='description'>Type here</textarea>
		
													
			</div>
	
			<div id="button3">
			
			<button class="buttonn" type='submit' name='submit'>Submit</button>
		</form>
			</div>		
													<br>
													<br>
			
			<div id="button4">
			<form action='index.php' method='post'>
			<button type='submit'>Back</button>
			</form>
			</div>
			
			<div id="footer2">
			<footer>
			<center>
			<p>@ All rights reserved 2022</p>
			<p>Designed and developed by: Hamza Muhsen </p>
			</center>
			</footer>
			</div>
			
	
	
	
	</div>
	
		<script>
			document.querySelector('.buttonn').addEventListener('click',()=>{
			document.querySelector('.buttonn').style.background = 'blue';		
		});
		
		document.getElementById("button3").addEventListener("click", myFunction);


		</script>	
	
	</body>
</html>
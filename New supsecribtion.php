<?php

if(isset($_POST['submit'])){
	
	Require 'Connection.php';
	
	//echo 'hello';
	//print_r($_POST); 
	$f_name= filter_var($_POST['f_name'], FILTER_SANITIZE_STRING);
	$l_name= filter_var($_POST['l_name'], FILTER_SANITIZE_STRING);
	$nationality=  filter_var($_POST['nationality'], FILTER_SANITIZE_STRING);
	$address=  filter_var($_POST['address'], FILTER_SANITIZE_STRING);
	$phone=$_POST['phone'];
	$national_number=$_POST['national_number'];
	
	if($_POST['sub_type']==1){
		$sub_type='commercial';
	}else{
		$sub_type='personal';
	}
	
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
	//nationality
	
	if(empty($nationality)){
	$errors[]="Nationality requiered";
	}elseif(strlen($nationality)>15){
	$errors[]="not allowed";
	}
	//phone number
	
	if(empty($phone)){
	$errors[]="Phone number requiered";
	}elseif(strlen($phone)>10){
	$errors[]="not allowed, please enter 10 digits only in phone number field";
	}
	$sql="SELECT phone_number FROM new_subscription WHERE phone_number='$phone'";
	$statement=$pdo->prepare($sql);
	$statement->execute();
	$data=$statement->fetch();
	if($data){
		$errors[]=" phone number exsisted, please write another phone number ";
	}
	//address

	if(empty($address)){
	$errors[]="Address requiered";
	}elseif(strlen($address)>50){
	$errors[]=" Not allowed ";
	}
	//national_number
	
	if(empty($national_number)){
	$errors[]="national_number field requiered";
	}elseif(strlen($national_number)>11){
	$errors[]="not allowed ";
	}
	$sql="SELECT national_num FROM new_subscription WHERE national_num='$national_number'";
	$statement=$pdo->prepare($sql);
	$statement->execute();
	$data=$statement->fetch();
	if($data){
		$errors[]=" national number exisisted, please write another national number";
	}
	
	if(empty($sub_type)){
	$errors[]="sub_type requiered";
	}elseif(strlen($sub_type)>50){
	$errors[]=" Not allowed ";
	}
	
	
	
	
	
	
	
	if(empty($errors)){
	
	$sql = "INSERT INTO new_subscription(first_name,last_name,subscription_type,nationality,national_num,phone_number,address)
	VALUES(:f_name,:l_name,'$sub_type',:nationality,:national_number,:phone,:address)";
	$statement = $pdo->prepare($sql);
	
	$f_name=$_POST['f_name'];
	$l_name=$_POST['l_name'];
	$nationality=$_POST['nationality'];
	$national_number=$_POST['national_number'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	
	$statement->bindParam(":f_name",$f_name,PDO::PARAM_STR);
	$statement->bindParam(":l_name",$l_name,PDO::PARAM_STR);
	$statement->bindParam(":nationality",$nationality,PDO::PARAM_STR);
	$statement->bindParam(":national_number",$national_number,PDO::PARAM_INT);
	$statement->bindParam(":phone",$phone,PDO::PARAM_INT);
	$statement->bindParam(":address",$address,PDO::PARAM_STR);
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
		<title> New subsecription </title>
		<meta name="description" content="Subsecription">
		<meta name="Keywords"	 content="Send a new subsecrption">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="Styles.css">
	</head>

	<body>
	<div id="container4">
		<div id='image'>
		<img src="pictures/Logo_home_2.png" alt="Company logo" class='imgg'>
		</div>
	
		<div id="header1">
		<h1>Electric Power Company (Jordan)</h1>
		</div>
		
		<div id="title3">
		
		<h2>New Subsecription</h2>
		
		</div>
		
		<div id="p3">
		<p>By filling this page with the data related to you and pressing the (submit)button at the bottom of the page,you will
		send a new subsecription to the company to benfits from it's services.The stuff will call you to disscus about the 
		request and after three days of the phone the answer of the request will show (accepted or rejected).</p>
		</div>
		
		<div id="title4">
		<h2>Conditions for accepting subscription:</h2>
		</div>
		<div id="p4">
		<ol>  
		<li>A new demarcation plan were released less than a year ago. </li>
		<li>Certificate of Completion of Electrical Installations (FP18-02). </li>
		<li>A recent copy of the registration contract, not more than one year old, issued by the Department of Lands and Surveys
		,or an allocation certificate from the Jordan Valley Authority, the Housing and Urban Development Corporation,
		or any legally authorized official body. To give such a document or allotment. </li>
		<li>A lease contract if the applicant is a tenant, or a written consent of the landlord before the subscription clerk to 
		register the subscription in the name of the tenant if there is no lease. </li>	
		</ol>
		</div>
		
		<div id="additional-header3">
		<h2>Information</h2>
		</div>
	
		
		<div id="information3">
			<form action='New supsecribtion.php' method='POST'>
			
			<label for='type'>Subsicrption type </label> &nbsp;&nbsp;&nbsp;&nbsp;
			<select id='type' name='sub_type'>
			<option value='1'>commercial</option>
		    <option value='2'>Personal</option>
		    </select>
			
												<br>
												<br>
												
			<label for='f-name'> First Name</label>&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type='text' id='f-name' name='f_name'>
		
													<br>
													<br>
			
			<label for='L-name'> Last Name</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type='text' id='L-name' name='l_name'>
													
													<br>
													<br>
			
			<label for='Nationality'>Nationality</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type='text' id='Nationality' name='nationality'>
													
													<br>
													<br>
													
			<label for='Nationality'>National number</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type='text' id='Nationality' name='national_number' onkeypress="return event.charCode >= 48 && event.charCode <= 57">
			
													<br>
													<br>
			
			<label for='phone'>Phone number</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type='text' id='phone'  name='phone' onkeypress="return event.charCode >= 48 && event.charCode <= 57">
													
													<br>
													<br>
			
			<label for='Address'>Address</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type='text' id='Address' name='address'>
			
													<br>
													<br>
													<br>
			</div>	
			
			
			
			<div id="button5">
			<button class='buttonn1' type='submit' name='submit'>Submit</button>
			</div>
													<br>
													
			
			</form>
			
			<div id="button6">
			<form action='index.php' method='post'>
			<button type='submit'>Back</button>
			</form>
			</div>
			
			
			<div id="footer3">
			<footer>
			<center>
			<p>@ All rights reserved 2022</p>
			<p>Designed and developed by: Hamza Muhsen </p>
			</center>
			</footer>
			</div>
	
	</div>
	
	<script>
			document.querySelector('.buttonn1').addEventListener('click',()=>{
			document.querySelector('.buttonn1').style.background = 'blue';		
		});
		
		document.getElementById("button5").addEventListener("click", myFunction);

		/*function myFunction() {
		alert (" Sent successfully !");
		}*/


	</script>	
	
	</body>
</html>
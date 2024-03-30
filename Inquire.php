<?php

if (isset($_POST['submit'])){
	
	Require "Connection.php";
	
	//print_r($_POST);
	$f_name= filter_var($_POST['f_name'], FILTER_SANITIZE_STRING);
	$l_name= filter_var($_POST['l_name'], FILTER_SANITIZE_STRING);
	$sub_number=$_POST['sub_number'];
	$year=$_POST['year'];
	$month=$_POST['month'];
	if($_POST['sub_type']==1){
		$sub_type='commercial';
	}else{
		$sub_type='personal';
	}
	
	$_POST['sub_type']=$sub_type;
	$errors=[];
	
	if(empty($f_name)){
	$errors[]="First name requiered";
	}elseif(strlen($f_name)>15){
	$errors[]="first name not allowed";
	}
	//last name
	if(empty($l_name)){
	$errors[]="Last name requiered";
	}elseif(strlen($l_name)>15){
	$errors[]="last name not allowed";
	}
	//sub number
	if(empty($sub_number)){
	$errors[]="subsecription number requiered";
	}elseif(strlen($sub_number)>7){
	$errors[]="subsecrtibtion number not allowed";
	}
	//year
	if(empty($year)){
	$errors[]="year requiered";
	}elseif(strlen($year)>4){
	$errors[]="Year not allowed";
	}
	
	//month
	if(empty($month)){
	$errors[]="month requiered";
	}elseif(strlen($month)>2){
	$errors[]="Month not allowed";
	}
	//sub type
	if(empty($sub_type)){
	$errors[]="sub_type requiered";
	}elseif(strlen($sub_type)>15){
	$errors[]=" Sub type not allowed ";
	}
	
	if(empty($errors)){
/*	
	$sql = "INSERT INTO inquire(first_name,last_name,subscription_number,subscription_type,year,month)
	VALUES(:f_name,:l_name,:sub_number,:sub_type,:year,:month)";
	
	$statement = $pdo->prepare($sql);
	
	$f_name= $_POST['f_name'];
	$l_name= $_POST['l_name'];
	$sub_number=$_POST['sub_number'];
	$sub_type=$_POST['sub_type'];
	$year=$_POST['year'];
	$month=$_POST['month'];
	
	$statement->bindParam(":f_name",$f_name,PDO::PARAM_STR);
	$statement->bindParam(":l_name",$l_name,PDO::PARAM_STR);
	$statement->bindParam(":sub_number",$sub_number,PDO::PARAM_INT);
	$statement->bindParam(":sub_type",$sub_type,PDO::PARAM_STR);
	$statement->bindParam(":year",$year,PDO::PARAM_INT);
	$statement->bindParam(":month",$month,PDO::PARAM_INT);
	$statement->execute();
    //$pdo = null;
*/		
	/*	
	$stm="SELECT * FROM user WHERE subscription_number=:sub_number AND first_name=:f_name AND last_name=:l_name";
    $q=$pdo-> prepare($stm);
	$sub_number=$_POST['sub_number'];
	$f_name=$_POST['f_name'];
	$l_name=$_POST['l_name'];
	$type=$_POST['sub_type'];
    $q->bindParam(':sub_number',$sub_number,PDO::PARAM_INT);
	$q->bindParam(':f_name',$f_name,PDO::PARAM_STR);
	$q->bindParam(':l_name',$l_name,PDO::PARAM_STR);

    $q->execute();
    $data=$q->fetch();
    if(!$data){
		$errors[]="There is invalid input, please enter a valid inputs";
		var_dump($errors);
    }else{
		$_SESSION['sub_number']=$sub_number;
		$_SESSION['month']=$month;
		$_SESSION['year']=$year;
		header('location:bill.php');
		
        }
    */
	
	}
}	

?>
<!DOCTYPE html>

<html>
<head>
		<title> Inquire </title>
		<meta name="description" content="Inquire about user bills">
		<meta name="Keywords"	 content="Inquire about a bill">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="Styles.css">

</head>
<body>
<div id="container2">

	<div id='image'>
	<img src="pictures/Logo_home_2.png" alt="Company logo" class='imgg'>
	</div>
	
	<div id="header1">
	<h1>Electric Power Company (Jordan)</h1>
	</div>
	
	<div id="title">
		
		<h2>Inquire Form</h2>
		
	</div>	
	
	<div id="p1">
		<p>By filling this page with the data related to you and pressing the button at the bottom of the page
		 ,a screen will appear showing you your bill and the amount to be paid. If you do not want to query, 
		 please you can press the back button at the bottom of the page.   </p>
	</div>

													<br>
													<br>
													

	<div id="additional-header">
	<h2>Information</h2>
	</div>												
												   
		<div id="information">
		<form action='bill.php' method='post'>
		
		
		<label for='f-name' > First Name</label>
		<input type='text' id='f-name' name='f_name' >
			
													<br>
													<br>
													
													
		
		<label for='L-name'> Last Name</label>
		<input type='text' id='L-name' name='l_name'>
			
			
			
													<br>
													<br>
													
			<label for='sub'> Subsicrption number</label>
			<input type='text' id='sub' name='sub_number'>
			
													<br>
													<br>
			
			<label for='type'>Subsicrption type </label>
			<select id='type' name='sub_type'>
			<option  value='1'>commercial</option>
		    <option  value='2'>Personal</option>
		    </select>
			
													<br>
													<br>
													
			<label for='year'> Year</label>
			<input type='text' id='year' name='year'>		
			
													<br>
													<br>
													
			<label for='month'>Month</label>
			<input type='text' id='month' name='month'>	
			
													<br>
													<br>
												
			</div>
					
			
			<div id="button1">
			<button type='submit' name='submit'>Inquire</button>
			</div>
			
			
			
			
		</form>
		
													<br>
													<br>
													
		<div id="button2">
		<form action='index.php' method='post'>
		<button type='submit'>Back</button>
		</form>
		</div>
		
		<div id="footer1">
		<footer>
		<center>
		<p>@ All rights reserved 2022</p>
		<p>Designed and developed by: Hamza Muhsen </p>
		</center>
		</footer>
		</div>
			

	
</div>

</body>
</html>

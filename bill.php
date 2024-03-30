<?php

Require "Connection.php";

if($_POST['sub_type']==1){
		$sub_type='commercial';
	}else{
		$sub_type='personal';
	}
	
$stm="SELECT * FROM user WHERE subscription_number=:sub_number AND first_name=:f_name AND last_name=:l_name AND subscription_type='$sub_type' AND month=:month AND year=:year";
    $q=$pdo-> prepare($stm);
	$sub_number=$_POST['sub_number'];
	$f_name=$_POST['f_name'];
	$l_name=$_POST['l_name'];
	$month=$_POST['month'];
	$year=$_POST['year'];
    $q->bindParam(':sub_number',$sub_number,PDO::PARAM_INT);
	$q->bindParam(':f_name',$f_name,PDO::PARAM_STR);
	$q->bindParam(':l_name',$l_name,PDO::PARAM_STR);
	$q->bindParam(':month',$month,PDO::PARAM_INT);
	$q->bindParam(':year',$year,PDO::PARAM_INT);

    $q->execute();
    $data=$q->fetch();
	
    if(!$data){
		$errors[]="There is invalid input, please enter a valid inputs";
		var_dump($errors);
    }else{	
		$sql = "SELECT  subscription_number,month,year,amount_to_paid FROM user where subscription_number=:sub_number";
		$statement = $pdo->prepare($sql);
		$sub_number=$_POST['sub_number'];
		$statement->bindParam(':sub_number',$sub_number,PDO::PARAM_INT);
		$statement->execute();
		$data = $statement->fetchAll();
	}


?>
<!DOCTYPE html>

<html>
<head>
	<title> Summary of the bill </title>
	<meta name="description" content="Show information about user's bill">
	<meta name="Keywords"	 content="bill,required money">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="Styles.css">
</head>

<body>
	<div id="container5">
	
	
		<div id='image'>
		<img src="pictures/Logo_home_2.png" alt="Company logo" class='imgg'>
		</div>
	
		<div id="header1">
		<h1>Electric Power Company (Jordan)</h1>
		</div>
		
		<div id="title5">
		<h1>Your bill</h1>
		</div>
											
									
										
		<?php  if(!$data){
				$errors[]="Please try again";
				;}else{
		
		foreach($data as $row){	?>	
		
		
		<div id="subsecription-number">
		<p>
		subsecription number:<?php echo $row['subscription_number']; ?>
		</p>
		</div>
		<div id="First-date-for-payment">
		<p>
		Month:<?php echo $row['month']; ?>
		</p>
		</div>
		<div id="Last-date-for-payment">
		<p>
		Year:<?php echo $row['year']; ?>
		</p>
		</div>
		
		<div id="Amount-to-be-paid">
		<p>
		Amount to be paid:<?php echo $row['amount_to_paid']?>
		</p>
		</div>
				<?php } }?>		
		
		
		
		
		<div id="button7">
		<form action='index.php' method='post'>
		<button type='submit'>Back</button>
		</form>
		</div>
		
		
		<div id="footer4">
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
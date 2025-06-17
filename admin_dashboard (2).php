<?php

session_start();
if(!isset($_SESSION['username']))
{
	header("location:login.php");
}
elseif($_SESSION['usertype']=='student')
{
	header("location:login.php");
}

?>






<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<title>SMIS :: Admin Dashboard</title>

	<link rel="icon" href="Logo.png" type="image/x-icon">

	  <?php
       include 'admin_css.php';

	  ?>


</head>
<body style="background-color: silver;">
	
 <?php

  include 'admin_sidebar.php';

  $host="localhost";
  $user="root";
  $password="";
  $db="schoolmanagement";
  $data=mysqli_connect($host,$user,$password,$db);
  $sql="SELECT * from admission";

  $result=mysqli_query($data,$sql);



 ?>







	<div class="content">
		<h1 style="font-size: 40px; color: blue; font-weight: bold; font-family: Century; text-align: center;">Applied for Admission</h1>

		<table border="1px" style="padding-top: 3px; background-color: white; outline: 3px solid green">
			<tr>
				<th style="padding: 20px; font-size: 25px; color: red; font-weight: bold; font-family: Century; text-align: center;">S/N</th>
				<th style="padding: 20px; font-size: 25px; color: red; font-weight: bold; font-family: Century; text-align: center;">Name</th>
				<th style="padding: 20px; font-size: 25px; color: red; font-weight: bold; font-family: Century; text-align: center;" >Email</th>
				<th style="padding: 20px; font-size: 25px; color: red; font-weight: bold; font-family: Century; text-align: center;">Phone</th>
				<th style="padding: 20px; font-size: 25px; color: red; font-weight: bold; font-family: Century; text-align: center;">Message</th>
			</tr>

            <?php 

         while($info=$result->fetch_assoc())

         {




            ?>




			<tr>
				<td style="padding: 20px; font-size: 20px; font-family: Century;"> <?php    echo "{$info['id']}"; ?> 
			</td>
				<td style="padding: 20px; font-size: 20px; font-family: Century;"> <?php    echo "{$info['name']}"; ?> 
			</td>
				<td style="padding: 20px; font-size: 20px; font-family: Century;"><?php    echo "{$info['email']}"; ?>
			</td>
				<td style="padding: 20px; font-size: 20px; font-family: Century;"><?php    echo "{$info['phone']}"; ?>
			</td>
				<td style="padding: 20px; font-size: 20px; font-family: Century;"><?php    echo "{$info['message']}"; ?>
			</td>
			</tr>
          <?php 
           }

          ?>

		</table>
	</div>

</body>










</html>
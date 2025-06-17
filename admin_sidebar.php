<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>VLMS:: Admin Dashboard</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<style>
	.fa {
		color: white;
		font-size: 15px;
	}
	ul li{
	display: inline-block;
	line-height: 50px;
    }
	ul li a{
	text-decoration: none;
	color: white;
	font-weight: bold;
	font-size: 15px;
	font-family: Aptos Narrow;
}
</style>
</head>
<body>

	<div>
		<aside class="sidebar" style="position: fixed; top: 70px; bottom: 0; left: 0; width: 12%; background-color: darkblue; height: 100%; padding-bottom: 10px;">
			<ul class="side" >
			 <li class="sidemenu"><i class="fa fa-th-large" aria-hidden="true"></i>&nbsp&nbsp<a style="text-decoration: none; color: white;" href="return.php">Dashboard</a></li> 
			<li class="sidemenu"><i class="fa fa-cubes" aria-hidden="true"></i>&nbsp&nbsp<a style="text-decoration: none;" href="view_classes.php">View Classes</a></li>	
            <li class="sidemenu"><i class="fa fa-address-card" aria-hidden="true"></i>&nbsp&nbsp<a href="view_teacher.php">View Teachers</a></li>
            <li class="sidemenu"><i class="fa fa-users" aria-hidden="true"></i>&nbsp&nbsp<a href="view_students.php">View Students</a></li>
            <li class="sidemenu"><i class="fa fa-book" aria-hidden="true"></i>&nbsp&nbsp<a href="view_subjects.php">View Sujects</a></li>
            <li class="sidemenu"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp&nbsp<a href="view_smarks.php">View Marks</a></li>
            <li class="sidemenu"><i class="fa fa-download" aria-hidden="true"></i>&nbsp&nbsp<a href="view_reportcard.php">Report Card</a></li>

			</ul>


		</aside>


	</div>

</body>
</html>
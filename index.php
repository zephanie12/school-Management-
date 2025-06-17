<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="Logo.png" type="image/x-icon">
    <title>VLMS:: School Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <style type="text/css">
        .bi{
            color: white;
            font-size: 20px;
        }
    </style>
</head>
<body style="background-image: linear-gradient(to bottom, purple, aqua, white, blue); background-attachment: fixed; background-repeat: no-repeat;">
     <header style="top: 0; height: 80px; background-color: indigo; position: fixed; left: 0; right: 0; text-align: center; font-size: 40px; color: Lime; font-weight: bold; font-family: Aptos Narrow;"><label>NZ Virtual Learning Management System</label> 
     </header>
    <br>
    
    <br>
    <div class="container mt-5" style="background-color: silver; height: 400px; border: 4px solid red; border-radius: 15px;">
       <br>
        <h1 class="text-center" style="color: blue; font-family: Aptos Narrow; font-weight: bold;">Login page</h1>
        <div class="row mt-5">
            <div class="col-md-4 mb-3">
                <div class="card" style="background-color: indigo;">
                    <div class="card-body text-center">
                        <i class="bi bi-person-circle"></i><h5 class="card-title" style="color: lime; font-weight: bold; font-family: Aptos Narrow; font-size: 15px;">  &nbsp Admin Login</h5>
                        <a href="admin_login.php" class="btn btn-success">Login</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card" style="background-color: indigo;">
                    <div class="card-body text-center">
                        <i class="bi bi-person-check-fill"></i><h5 class="card-title" style="color: lime; font-weight: bold; font-family: Aptos Narrow; font-size: 15px;">&nbsp Teacher Login</h5>
                        <a href="teacher_login.php" class="btn btn-success">Login</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card" style="background-color: indigo;">
                    <div class="card-body text-center" >
                        <i class="bi bi-file-person-fill"></i>&nbsp<h5 class="card-title" style="color: lime; font-weight: bold; font-family: Aptos Narrow; font-size: 15px;">Parent Login</h5>
                        <a href="student_login.php" class="btn btn-success">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer style="bottom: 0; height: 48px; background-color: darkblue; position: fixed; left: 0; right: 0; text-align: center; font-size: 15px; color: white; margin-bottom: 1px;"> <br><h6 style="margin-bottom: 0;">All Copyright Reserved by NZ</h6></footer>
</body>

</html>

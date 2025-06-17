<?php

error_reporting(0);
session_start();
$host="localhost";

$user="root";

$password="";
$db="4641278_schoolmanagement";

$data=mysqli_connect($host,$user,$password,$db);

if($data===false)
{
    die("connection error");
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $email = $_POST['email'];

    $password = $_POST['password'];
   $sql="SELECT * FROM teachers where email='".$email."'  AND password='".$password."' ";
   
   $result=mysqli_query($data,$sql);

   $row=mysqli_fetch_array($result);


   if($row["type"]=="teacher")
   {
    $_SESSION['email']=$email;
    $_SESSION['type']="teacher";
    header("location:teacher_dashboard.php");
    
   }
  else
  {
  
    $message= "Username or Password is incorrect";
    $_SESSION['loginMessage']=$message;
    header("location:teacher_login.php");
  }



}
?>
<?php
  include 'login_pages.php'
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="Logo.png" type="image/x-icon">
    <title>Teacher Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <style>
        .bi{
            color: red;
            font-size: 25px;
        }
    </style>
</head>
<body>
    <div class="container mt-5" >
        <div class="row justify-content-center " >
            <div class="col-md-6">
                <div class="card" >
                    <div class="card-header" style="background-color: orange;">
                        <h3 class="text-center" style="color: green; font-weight: bold;" ><i class="bi bi-person-fill-lock"></i> Teacher Login</h3>
                    </div>
                    <div class="card-body">
                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>
                        <form method="POST" action="#">
                            <div class="mb-3">
                                <i class="bi bi-file-person-fill"></i><label for="email" class="form-label" style="font-weight: bold; color: blue;">Email</label>
                                <input style="font-weight: bold; border: 3px solid green" type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <i class="bi bi-key"></i><label for="password" class="form-label" style="font-weight: bold; color: blue;">Password</label>
                                <input style="font-weight: bold; border: 3px solid green" type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-success w-100">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

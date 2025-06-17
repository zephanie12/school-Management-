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
    $name = $_POST['username'];

    $pass = $_POST['password'];
   
   $sql="select * from user where username='".$name."'  AND password='".$pass."' ";
   
   $result=mysqli_query($data,$sql);

   $row=mysqli_fetch_array($result);

   

   if($row["usertype"]=="admin")
   {
    $_SESSION['username']=$name;
    $_SESSION['usertype']="admin";
    header("location:admin_dashboard.php");
    
   }
  else
  {
  
    $message= "Username or Password is incorrect";
    $_SESSION['loginMessage']=$message;
    header("location:admin_login.php");
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
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <style type="text/css">
        .bi{
            color: red;
            font-size: 25px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"  style="background-color: orange;">
                        <h3 class="text-center"  style="color: green; font-weight: bold;"> <i class="bi bi-person-fill-lock"></i> Admin Login</h3>
                    </div>
                    <div class="card-body">
                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>
                        <form method="POST" action="#">
                            <div class="mb-3">
                                <i class="bi bi-file-person-fill"></i> &nbsp <label for="username" class="form-label" style="font-weight: bold; color: blue;">Username</label>
                                <input style="font-weight: bold; border: 3px solid green" type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <i class="bi bi-key"></i>&nbsp <label for="password" class="form-label" style="font-weight: bold; color: blue;">Password</label>
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

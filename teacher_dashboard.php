<?php
session_start();
include 't_style.php';
include 'db_connection.php';
if (!isset($_SESSION['email'])) 
{
    header("Location:teacher_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Teacher Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <li style="color: white; font-size: 25px; margin-right: 400px; font-weight: bold; font-family: Aptos Narrow;">Welcome, <?php  echo $_SESSION['email']?>!!</li>
                    </li>
                   
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-3" style="border: 4px solid red; background-color: silver; border-radius: 15px; height: 350px; margin-left: 10%; ">
        <h1 class="mb-4" style="color:  darkblue; font-weight: bold; text-align: center; font-size: 30px;">Teacher Dashboard</h1>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card" style="background-color: indigo;">
                    <div class="card-body">
                        <h5 class="card-title" style="color: cyan; font-weight: bold;">Students</h5>
                        <a href="view_students.php" class="btn btn-success">View Students</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card" style="background-color: indigo;">
                    <div class="card-body">
                        <h5 class="card-title" style="color: cyan; font-weight: bold;">Marks</h5>
                        <a href="add_marks.php" class="btn btn-success">Add Marks</a>
                        <a href="view_marks.php" class="btn btn-primary mt-2">View Marks</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card" style="background-color: indigo;">
                    <div class="card-body">
                        <h5 class="card-title" style="color: cyan; font-weight: bold;">Report Cards</h5>
                        <a href="report_card.php" class="btn btn-danger">Generate Reports</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

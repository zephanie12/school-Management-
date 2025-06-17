<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: admin_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>

    <link rel="icon" href="Logo.png" type="image/x-icon">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        .bi{
            color: white;
            font-size: 40px;
        }
    </style>
</head>
<body style="background-image: linear-gradient(to bottom, purple, aqua, white, blue); background-attachment: fixed; background-repeat: no-repeat;">
    <nav style="background-color: indigo; height: 70px; color: lime;" class="">
       <ul style="float:right; margin-right: 80px; margin-top: 12px;">
            <li class="btn btn-success"><a style="text-decoration: none; color: white;" href="logout.php">Logout</a></li>
        </ul>
        <div class="container">
            <a class="navbar-brand" href="#" style="color: cyan; font-weight: bold; font-size: 40px; float: left; height: 70px;" >Admin Panel</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="btn btn-success" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4" style="border: 4px solid red; background-color: silver; border-radius: 15px; height: 410px; margin-left: 10%; ">
        
        <h1 class="mb-3" style="color:  darkblue; font-weight: bold; text-align: center; font-size: 30px;">Admin Dashboard</h1>
        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="card" style="background-color: indigo;">
                    <div class="card-body">
                        <h5 class="card-title" style="color: cyan; font-weight: bold;">Classes</h5>
                        <a href="add_teacher.php" class="btn btn-success">Add Class</a><br>
                        <a href="view_teachers.php" class="btn btn-primary mt-2">View Classes</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card" style="background-color: indigo;">
                    <div class="card-body">
                        <h5 class="card-title" style="color: cyan; font-weight: bold;">Teachers</h5>
                        <a href="add_teacher.php" class="btn btn-success">Add Teacher</a>
                        <a href="view_teacher.php" class="btn btn-primary mt-2">View Teachers</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card" style="background-color: indigo;">
                    <div class="card-body">
                        <h5 class="card-title" style="color: cyan; font-weight: bold;">Students</h5>
                        <a href="add_student.php" class="btn btn-success">Add Student</a>
                        <a href="view_students.php" class="btn btn-primary mt-2">View Students</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card" style="background-color: indigo;">
                    <div class="card-body">
                        <h5 class="card-title" style="color: cyan; font-weight: bold;">Subjects</h5>
                        <a href="add_subject.php" class="btn btn-success">Add Subject</a>
                        <a href="view_subjects.php" class="btn btn-primary mt-2">View Subjects</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card" style="background-color: indigo;">
                    <div class="card-body">
                        <h5 class="card-title" style="color: cyan; font-weight: bold;">Infrastructures</h5>
                        <a href="add_subject.php" class="btn btn-success">Add New</a><br>
                        <a href="view_subjects.php" class="btn btn-primary mt-2">Report</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card" style="background-color: indigo;">
                    <div class="card-body">
                        <h5 class="card-title" style="color: cyan; font-weight: bold;">Summary</h5>
                        <a href="add_subject.php" class="btn btn-success">View Reports</a><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer style="bottom: 0; height: 48px; background-color: darkblue; position: fixed; left: 0; right: 0; text-align: center; font-size: 15px; color: white; margin-bottom: 1px;"> <br><h6 style="margin-bottom: 0;">All Copyright Reserved by NZ</h6></footer>
</body>
</html>

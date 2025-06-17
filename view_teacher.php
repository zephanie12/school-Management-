<?php
session_start();
include 'admin_panel.php';
include 'admin_sidebar.php';
if(!isset($_SESSION['username']))
{
    header("location:admin_dashboard.php");
}

  $host="localhost";
  $user="root";
  $password="";
  $db="4641278_schoolmanagement";
  $data=mysqli_connect($host,$user,$password,$db);
  $sql="SELECT * from teachers";

  $result=mysqli_query($data,$sql);
  $info = $result->fetch_assoc();
  ?>
<!DOCTYPE html>
<html>
<head>
    <title>View Teachers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4" style="text-align: center; font-weight: bold; font-size: 30; color: red;">Teachers List</h1>
        <table class="table table-striped" style="margin-left: 8%; right: 5%;">
            <thead>
                <tr style="font-size: 20px; font-family: Aptos Narrow;">
                    <th style="text-align: left; font-weight: bold; font-size: 20; color: darkblue;">Teacher ID</th>
                    <th style="text-align: left; font-weight: bold; font-size: 20; color: darkblue;">Name</th>
                    <th style="text-align: left; font-weight: bold; font-size: 20; color: darkblue;">Email</th>
                    <th style="text-align: left; font-weight: bold; font-size: 20; color: darkblue;">Subject</th>
                    <th style="text-align: left; font-weight: bold; font-size: 20; color: darkblue;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while($info=$result->fetch_assoc())
                {
                ?>

                <tr style="font-size: 20px; font-family: Aptos Narrow;">
                    <td><?php echo "{$info['teacher_id']}"; ?></td>
                    <td><?php echo "{$info['name']}"; ?></td>
                    <td><?php echo "{$info['email']}"; ?></td>
                    <td><?php echo "{$info['subject']}"; ?></td>
                    <td>
                        <a href="edit_teacher.php?id=<?php echo $infor['teacher_id']; ?>" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
                <?php
                }
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>

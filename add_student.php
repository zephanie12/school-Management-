<?php
error_reporting(0);
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: admin_login.php");
    exit();
}

?>
<?php
include 'admin_panel.php';
include 'admin_sidebar.php';
    
$host="localhost";
$user="root";
$password="";
$db="4641278_schoolmanagement";
$conn= mysqli_connect($host,$user,$password,$db);
?>
<?php 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT reg_number FROM students ORDER BY reg_number DESC";
$result = mysqli_query($conn, $query);

// Check if the query was successful and fetched at least one row
if ($result && $result->num_rows > 0) {
    $row = mysqli_fetch_array($result);
    $lastid = $row['reg_number'];
} else {
    $lastid = null;
}

if (empty($lastid)) {
    $number = "GSR10001";
} else {
    $idd = (int) str_replace("GSR1", "", $lastid);
    $id = str_pad($idd + 1, 4, '0', STR_PAD_LEFT);
    $number = 'GSR1' . $id;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $reg_number = $_POST["reg_number"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $class = $_POST["class"];
    $password = $_POST["password"];

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        $sql = "INSERT INTO students (reg_number, name, email, class, password) VALUES ('$reg_number', '$name', '$email','$class', '$password')";
        if (mysqli_query($conn, $sql)) {
            $query = "SELECT reg_number FROM students ORDER BY reg_number DESC";
            $result = mysqli_query($conn, $query);

            // Check if the query was successful and fetched at least one row
            if ($result && $result->num_rows > 0) {
                $row = mysqli_fetch_array($result);
                $lastid = $row['reg_number'];
            } else {
                $lastid = null;
            }

            if (empty($lastid)) {
                $number = "GSR10001";
            } else {
                $idd = (int) str_replace("GSR1", "", $lastid);
                $id = str_pad($idd + 1, 4, '0', STR_PAD_LEFT);
                $number = 'GSR1' . $id;
            }
        } else {
            echo "Record insertion failed.";
        }
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-image: linear-gradient(to bottom, purple, aqua, white, blue); background-attachment: fixed; background-repeat: no-repeat;">
    <?php if (isset($success)): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
    <div class="container mt-3">
        <h1 class="mb-4" style="text-align: center; color: orange; font-family: Aptos Narrow; font-weight: bold; font-size: 25px;">Add New Student</h1>
        <form method="POST" action="#" style="padding: 0; display: grid;
      grid-template-columns: repeat(2, 1fr); border: 4px solid red; height: 350px; border-radius: 15px; background-color: gray; margin-left: 13%;">
            <div class="mb-1" style="margin-left: 8px; font-size: 15px;">
                <label style="color: cyan; font-weight: bold; font-family: Aptos Narrow;" for="reg_number" class="form-label">Registration Number</label>
                <input style="width: 95%;" type="text" class="form-control" id="reg_number" name="reg_number" value="<?php echo $number;?>" readonly>
            </div>
            <div class="mb-1" style="margin-left: 8px; font-size: 15px;">
                <label style="color: cyan; font-weight: bold; font-family: Aptos Narrow;" for="name" class="form-label">Full Name</label>
                <input style="width: 95%;" type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-1" style="margin-left: 8px; font-size: 15px;">
                <label style="color: cyan; font-weight: bold; font-family: Aptos Narrow;" for="email" class="form-label">Email</label>
                <input style="width: 95%;" type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-1" style="margin-left: 8px; font-size: 15px;">
                <label style="color: cyan; font-weight: bold; font-family: Aptos Narrow;" for="class" class="form-label">Class</label>
                <input style="width: 95%;" type="text" class="form-control" id="class" name="class" required>
            </div>
            
            <div class="mb-1" style="margin-left: 8px; font-size: 15px;">
                <label style="color: cyan; font-weight: bold; font-family: Aptos Narrow;" for="password" class="form-label">Password</label>
                <input style="width: 95%;" type="password" class="form-control" id="password" name="password" value="<?php echo $number;?>" readonly>
            </div><br>
            <button style="width: 20%; margin: 8px; font-weight: bold; height: 40px; font-size: 15px;" type="submit" class="btn btn-success">Add</button>
        </form>
    </div>
</body>
</html>

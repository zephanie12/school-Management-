<?php
session_start();
error_reporting(0);
include 'admin_panel.php';
include 'admin_sidebar.php';

if (!isset($_SESSION['username'])) {
    header("Location: admin_login.php");
    exit();
}
?>
<?php
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

$query = "SELECT teacher_id FROM teachers ORDER BY teacher_id DESC";
$result = mysqli_query($conn, $query);

// Check if the query was successful and fetched at least one row
if ($result && $result->num_rows > 0) {
    $row = mysqli_fetch_array($result);
    $lastid = $row['teacher_id'];
} else {
    $lastid = null;
}

if (empty($lastid)) {
    $number = "GSR1001";
} else {
    $idd = (int) str_replace("GSR1", "", $lastid);
    $id = str_pad($idd + 1, 3, '0', STR_PAD_LEFT);
    $number = 'GSR1' . $id;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $teacher_id = $_POST["teacher_id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $subject = $_POST["subject"];
    $type = $_POST["type"];

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        $sql = "INSERT INTO teachers (teacher_id, name, email, password, subject, type) VALUES ('$teacher_id', '$name', '$email','$password', '$subject','$type')";
        if (mysqli_query($conn, $sql)) {
            $query = "SELECT teacher_id FROM teachers ORDER BY teacher_id DESC";
            $result = mysqli_query($conn, $query);

            // Check if the query was successful and fetched at least one row
            if ($result && $result->num_rows > 0) {
                $row = mysqli_fetch_array($result);
                $lastid = $row['teacher_id'];
            } else {
                $lastid = null;
            }

            if (empty($lastid)) {
                $number = "GSR1001";
            } else {
                $idd = (int) str_replace("GSR1", "", $lastid);
                $id = str_pad($idd + 1, 3, '0', STR_PAD_LEFT);
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
    <title>Add Teacher</title>
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
        <h1 class="mb-4" style="text-align: center; color: orange; font-family: Aptos Narrow; font-weight: bold; font-size: 25px;">Add New Teacher</h1>
        
        <form method="POST" action="#" style="padding: 0; display: grid;
      grid-template-columns: repeat(2, 1fr); border: 4px solid red; height: 350px; border-radius: 15px; background-color: gray; margin-left: 13%;">
            <div class="mb-1" style="margin-left: 8px; font-size: 15px;">
                <label style="color: cyan; font-weight: bold; font-family: Aptos Narrow;" for="teacher_id" class="form-label">Registration Number</label>
                <input style="width: 90%;" type="text" class="form-control" id="teacher_id" name="teacher_id" value="<?php echo $number; ?>" readonly>
            </div>
            <div class="mb-1" style="margin-left: 8px; font-size: 15px;">
                <label style="color: cyan; font-weight: bold; font-family: Aptos Narrow;" for="name" class="form-label">Name</label>
                <input style="width: 90%;" type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-1" style="margin-left: 8px; font-size: 15px;">
                <label style="color: cyan; font-weight: bold; font-family: Aptos Narrow;" for="eamil" class="form-label">Email</label>
                <input style="width: 90%;" type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-1" style="margin-left: 8px; font-size: 15px;">
                <label style="color: cyan; font-weight: bold; font-family: Aptos Narrow;"  for="password" class="form-label">Password</label>
                <input style="width: 90%;" type="password" class="form-control" id="password" name="password" value="<?php echo $number;?>" readonly>
            </div>
            <div class="mb-1" style="margin-left: 8px; font-size: 15px;">
                <label style="color: cyan; font-weight: bold; font-family: Aptos Narrow;" for="subject" class="form-label">Subject</label>
                <input style="width: 90%;" type="text" class="form-control" id="subject"  name="subject" required>
            </div>
            <div class="mb-1" style="margin-left: 8px; font-size: 15px;">
                <label style="color: cyan; font-weight: bold; font-family: Aptos Narrow;" for="type" class="form-label">Type</label>
                <input style="width: 90%;" type="text" class="form-control" id="type" value="teacher" name="type" readonly>
            </div>
            <button  style="height: 40px; width: 20%; margin-left: 8px; font-weight: bold; font-size: 15px;" type="submit" class="btn btn-success">Add</button>

        </form>
    </div>
    <footer style="bottom: 0; height: 48px; background-color: darkblue; position: fixed; left: 0; right: 0; text-align: center; font-size: 15px; color: white; margin-bottom: 1px;"> <br><h6 style="margin-bottom: 0;">All Copyright Reserved by NZ</h6></footer>
</body>
</html>

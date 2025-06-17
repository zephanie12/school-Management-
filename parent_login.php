<?php
session_start();
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $stmt = $pdo->prepare("SELECT * FROM parents WHERE email = ?");
    $stmt->execute([$email]);
    $parent = $stmt->fetch();
    
    if ($parent && password_verify($password, $parent['password'])) {
        $_SESSION['parent_id'] = $parent['id'];
        $_SESSION['parent_name'] = $parent['name'];
        $_SESSION['student_id'] = $parent['student_id'];
        header("Location: parent_dashboard.php");
        exit();
    } else {
        $error = "Invalid credentials!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="Logo.png" type="image/x-icon">
    <title>Parent Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body style="background-image: linear-gradient(to bottom, purple, aqua, white, blue); background-attachment: fixed; background-repeat: no-repeat;">
    <header style="top: 0; height: 80px; background-color: indigo; position: fixed; left: 0; right: 0; text-align: center; font-size: 30px; color: Lime; font-weight: bold;"><h2 style="margin-top: 0px; font-family: Century;">NZ Virtual Learning Management System</h2></header>
        <br><br>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Parent Login</h3>
                    </div>
                    <div class="card-body">
                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>
                        <form method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-success w-100">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer style="bottom: 0; height: 60px; background-color: black; position: fixed; left: 0; right: 0; text-align: center; font-size: 15px; color: white; margin-bottom: 1px;"> <br><h6 style="margin-bottom: 0;">All Copyright Reserved by NZ</h6></footer>
</body>
</html>

<?php
session_start();
include 'db_connection.php';

if (isset($_SESSION['reg_number'])) {
    $reg_number = $_SESSION['reg_number'];
} elseif (isset($_GET['reg_number'])) {
    $reg_number = $_GET['reg_number'];
} else {
    die("Student ID not provided.");
}

$student = $pdo->prepare("SELECT * FROM students WHERE reg_number = ?");
$student->execute([$reg_number]);
$student = $student->fetch();

$marks = $pdo->prepare("SELECT sub.name AS subject_name, m.marks, m.exam_type, m.date 
                        FROM marks m
                        JOIN subjects sub ON m.subject_id = sub.id
                        WHERE m.reg_number = ?");
$marks->execute([$reg_number]);
$marks = $marks->fetchAll();

$total = 0;
foreach ($marks as $mark) {
    $total += $mark['marks'];
}
$percentage = count($marks) > 0 ? $total / count($marks) : 0;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Report Card</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .report-header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #333;
            padding-bottom: 20px;
        }
        .student-info {
            margin-bottom: 20px;
        }
        .report-footer {
            margin-top: 30px;
            text-align: right;
            border-top: 1px solid #333;
            padding-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="report-header">
            <h1>School Management System</h1>
            <h2>Report Card</h2>
        </div>
        
        <div class="student-info">
            <p><strong>Student Name:</strong> <?php echo $student['name']; ?></p>
            <p><strong>Class:</strong> <?php echo $student['class']; ?></p>
            <p><strong>Roll Number:</strong> <?php echo $student['roll_number']; ?></p>
        </div>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Marks</th>
                    <th>Exam Type</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($marks as $mark): ?>
                <tr>
                    <td><?php echo $mark['subject_name']; ?></td>
                    <td><?php echo $mark['marks']; ?></td>
                    <td><?php echo $mark['exam_type']; ?></td>
                    <td><?php echo $mark['date']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <div class="report-footer">
            <p><strong>Total Marks:</strong> <?php echo $total; ?></p>
            <p><strong>Percentage:</strong> <?php echo number_format($percentage, 2); ?>%</p>
        </div>
    </div>
</body>
</html>

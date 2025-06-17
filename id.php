<?php
$host="localhost";

$user="root";

$password="";
$db="4641278_schoolmanagement";

$data=mysqli_connect($host,$user,$password,$db);
function generateAutomaticIdBasedOnDb(PDO $pdo, string $students, string $reg_number, int $totalLength = 8): string {
    $yearPrefix = date('Y'); // e.g. 2024
    $prefixLength = strlen($yearPrefix);

    $suffixLength = $totalLength - $prefixLength;
    if ($suffixLength <= 0) {
        throw new Exception('Total length must be greater than year length');
    }

    // Fetch last ID from database that starts with current year prefix
    $stmt = $pdo->prepare("SELECT $reg_number FROM $students WHERE $reg_number LIKE :yearPrefix ORDER BY $ DESC LIMIT 1");
    $stmt->execute([':yearPrefix' => $yearPrefix . '%']);
    $lastId = $stmt->fetchColumn();

    $nextNumber = 1; // Default suffix number

    if ($lastId !== false && strpos($lastId, $yearPrefix) === 0) {
        $lastNumberStr = substr($lastId, $prefixLength);
        if (ctype_digit($lastNumberStr)) {
            $lastNumber = intval($lastNumberStr);
            $nextNumber = $lastNumber + 1;
        }
    }

    $nextNumberStr = str_pad($nextNumber, $suffixLength, '0', STR_PAD_LEFT);

    return $yearPrefix . $nextNumberStr;
}
 $newStudentId = generateAutomaticIdBasedOnDb($pdo, 'students', 'reg_number', 8);
    //echo "Next student ID: " . $newStudentId;
?>
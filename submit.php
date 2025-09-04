<?php
$servername = "mysql-server";  // or the container name of MySQL
$username = "testuser";
$password = "UserPass123";
$dbname = "attendance_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];

    $stmt = $conn->prepare("INSERT INTO attendance (student_id) VALUES (?)");

    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);  // show exact MySQL error
    }

    $stmt->bind_param("s", $student_id);

    if (!$stmt->execute()) {
        die("Execute failed: " . $stmt->error);
    }

    echo "Attendance recorded successfully at " . date("Y-m-d H:i:s");
    $stmt->close();
}

$conn->close();
?>


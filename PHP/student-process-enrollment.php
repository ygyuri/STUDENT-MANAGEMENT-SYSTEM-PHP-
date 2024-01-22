<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

// Attempt to connect to the database
$data = mysqli_connect($host, $user, $password, $db);

// Check for connection errors
if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = 1; // Replace with the actual student_id
    $course_id = mysqli_real_escape_string($data, $_POST["course_id"]);
    $result = mysqli_real_escape_string($data, $_POST["result"]);

    // Insert enrollment record with result and enrollment_date
    $enrollment_query = "INSERT INTO enrollments (student_id, course_id, result) VALUES ($student_id, $course_id, '$result')";
    
    if (mysqli_query($data, $enrollment_query)) {
        $_SESSION['enrollment_message'] = "Enrollment successful!";
    } else {
        $_SESSION['enrollment_message'] = "Error: " . $enrollment_query . "<br>" . mysqli_error($data);
    }
}

// Redirect back to studentenrolment.php
header("Location: studentenrollment.php");
exit();
?>

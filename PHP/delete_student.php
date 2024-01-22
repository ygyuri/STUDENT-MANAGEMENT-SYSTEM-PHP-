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

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['student_id'])) {
    // Get the ID from the URL
$student_id = mysqli_real_escape_string($data, $_GET['student_id']);


    // Check if cancel parameter is set
    if (isset($_GET['cancel'])) {
        $_SESSION['message'] = "Deletion cancellation successful.";
        header("Location: view_student.php");
        exit();
    }

    // Perform deletion from the database
    $sql = "DELETE FROM studenttable WHERE student_id = '$student_id'";
    $result = mysqli_query($data, $sql);

    if ($result) {
        $_SESSION['message'] = "Student deleted successfully.";
    } else {
        $_SESSION['message'] = "Failed to delete student: " . mysqli_error($data);
    }

    header("Location: view_student.php");
    exit();
} else {
    // Redirect back to the view_students.php page if not a GET request or student_id is not set
    $_SESSION['message'] = "Invalid request. Request method: " . $_SERVER["REQUEST_METHOD"] . ", student_id: " . ($_GET['student_id'] ?? "Not set");
    header("Location: view_student.php");
    exit();
}
?>

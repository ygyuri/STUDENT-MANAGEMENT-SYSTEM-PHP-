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

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['teacher_id'])) {
    // Get the ID from the URL
    $teacher_id = mysqli_real_escape_string($data, $_GET['teacher_id']);

    // Check if cancel parameter is set
    if (isset($_GET['cancel'])) {
        $_SESSION['message'] = "Deletion cancellation successful.";
        header("Location: admin-view-teacher.php");
        exit();
    }

    // Perform deletion from the database
    $sql = "DELETE FROM teachers WHERE teacher_id = '$teacher_id'";
    $result = mysqli_query($data, $sql);

    if ($result) {
        $_SESSION['message'] = "Teacher deleted successfully.";
    } else {
        $_SESSION['message'] = "Failed to delete teacher: " . mysqli_error($data);
    }

    header("Location: admin-view-teacher.php");
    exit();
} else {
    // Redirect back to the admin-view-teacher.php page if not a GET request or teacher_id is not set
    $_SESSION['message'] = "Invalid request. Request method: " . $_SERVER["REQUEST_METHOD"] . ", teacher_id: " . ($_GET['teacher_id'] ?? "Not set");
    header("Location: admin-view-teacher.php");
    exit();
}
?>

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

// Check if the student_id is provided in the URL
if (isset($_GET['id'])) {
    $student_id = $_GET['id'];

    // Fetch name and email from the admission table
    $sql = "SELECT name, email FROM admission WHERE id = ?";
    $stmt = mysqli_prepare($data, $sql);
    mysqli_stmt_bind_param($stmt, "i", $student_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $info = mysqli_fetch_assoc($result);

    // Close the prepared statement
    mysqli_stmt_close($stmt);

    // Check if the student is already added to the studenttable
    $checkSql = "SELECT * FROM studenttable WHERE email = ?";
    $checkStmt = mysqli_prepare($data, $checkSql);
    mysqli_stmt_bind_param($checkStmt, "s", $info['email']);
    mysqli_stmt_execute($checkStmt);
    $checkResult = mysqli_stmt_get_result($checkStmt);

    if (mysqli_num_rows($checkResult) > 0) {
        // Student is already added, display a message
        echo "Student with email {$info['email']} is already added.";
    } else {
        // Redirect to a page where the admin can complete missing details
        header("Location: admin-complete-admission-student-details.php?id=$student_id&name={$info['name']}&email={$info['email']}");
        exit();
    }

    // Close the prepared statements
    mysqli_stmt_close($checkStmt);
} else {
    echo "Invalid student ID.";
}

// Close connections
mysqli_close($data);
?>

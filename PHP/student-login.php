<?php
session_start();

// Database connection details
$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

// Establishing a connection to the database
$data = mysqli_connect($host, $user, $password, $db);

// Check if the connection was successful, otherwise terminate with an error message
if ($data === false) {
    die("Connection error");
}

// Check if the form has been submitted using the POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from the submitted form data
    $name = mysqli_real_escape_string($data, $_POST['username']);
    $pass = mysqli_real_escape_string($data, $_POST['password']);

    // Query to retrieve student information based on the entered username
    $sql = "SELECT student_id, name, email, course_id, password FROM studenttable WHERE name = ?";

    // Using prepared statement to prevent SQL injection
    $stmt = mysqli_prepare($data, $sql);
    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_stmt_execute($stmt);

    // Get the result of the query
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    // Check if a student with the provided credentials was found
    if ($row && $pass == $row['password']) {
        // Store student information in session variables if needed
        $_SESSION['student_id'] = $row['student_id'];
        $_SESSION['student_name'] = $row['name'];
        $_SESSION['student_email'] = $row['email'];
        $_SESSION['student_course'] = $row['course'];
        // Add other fields as needed

        // Redirect to the student home page
        header("location: student-home.php");
        exit("Login successful"); // Provide a message for debugging
    } else {
        // If the password is incorrect or no student is found, set an error message and redirect to the login page
        $message = "Invalid username or password";
        $_SESSION['loginMessage'] = $message;
        header("location: student-login-form.php"); // Adjust the login form filename accordingly
        exit("Login failed"); // Provide a message for debugging
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
}

// Close the database connection
mysqli_close($data);
?>

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
    die("Connection error: " . mysqli_connect_error());
}

// Check if the form has been submitted using the POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from the submitted form data
    $name = mysqli_real_escape_string($data, $_POST['username']);
    $pass = mysqli_real_escape_string($data, $_POST['password']);

    // Query to retrieve teacher information based on the entered username (name)
    $sql = "SELECT teacher_id, name, email, phone, course_id, password FROM teachers WHERE name = ?";

    // Using prepared statement to prevent SQL injection
    $stmt = mysqli_prepare($data, $sql);
    
    // Check if the prepared statement was created successfully
    if (!$stmt) {
        die("Prepared statement error: " . mysqli_error($data));
    }

    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_stmt_execute($stmt);

    // Get the result of the query
    $result = mysqli_stmt_get_result($stmt);

    $row = mysqli_fetch_assoc($result);

    // Check if a teacher with the provided credentials was found
    if ($row && $pass == $row['password']) {
        // Store teacher information in session variables if needed
        $_SESSION['teacher_id'] = $row['teacher_id'];
        $_SESSION['teacher_name'] = $row['name'];
        $_SESSION['teacher_email'] = $row['email'];
        $_SESSION['teacher_phone'] = $row['phone'];
        $_SESSION['teacher_course'] = $row['course_id'];
        // Add other fields as needed

        // Redirect to the teacher home page
        header("Location: teacher-home.php");
        exit(); // Remove the exit message
    } else {
        // If the password is incorrect or no teacher is found, set an error message and redirect to the login page
        $message = "Invalid username or password";
        $_SESSION['loginMessage'] = $message;
        header("Location: teacher-login-form.php"); // Adjust the login form filename accordingly
        exit(); // Remove the exit message
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
}

// Close the database connection
mysqli_close($data);
?>

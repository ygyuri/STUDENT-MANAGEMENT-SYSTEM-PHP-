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

    // Query to retrieve admin information based on the entered username
    $sql = "SELECT * FROM admintable WHERE name = ?";
    
    // Using prepared statement to prevent SQL injection
    $stmt = mysqli_prepare($data, $sql);
    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_stmt_execute($stmt);

    // Get the result of the query
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    // Check if an admin with the provided credentials was found
    if ($row) {
        // Compare the password directly (without hashing for now)
        if ($pass == $row['password']) {
            // Store admin information in session variables if needed
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['admin_name'] = $row['name'];
            $_SESSION['admin_email'] = $row['email'];
            $_SESSION['admin_department'] = $row['department'];
            // Add other fields as needed

            // Redirect to the admin home page
            header("location: admin-home.php");
        } else {
            // If the password is incorrect, set an error message and redirect to the login page
            $message = "Invalid password";
            $_SESSION['loginMessage'] = $message;
            header("location: admin-login-form.php"); // Adjust the login form filename accordingly
        }
    } else {
        // If no admin is found with the provided username, set an error message and redirect to the login page
        $message = "Invalid admin credentials";
        $_SESSION['loginMessage'] = $message;
        header("location: admin-login-form.php"); // Adjust the login form filename accordingly
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
}

// Close the database connection
mysqli_close($data);
?>

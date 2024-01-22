<?php
session_start();

// Check if the student_id is set in the session
if (!isset($_SESSION['student_id'])) {
    // Redirect to the login page if the student is not logged in
    header("location: student-login-form.php");
    exit();
}

// Database connection details
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

// Fetch enrolled courses and results for the current student
$student_id = $_SESSION['student_id'];

// Use prepared statement to prevent SQL injection
$enrolled_courses_query = "SELECT c.course_name, e.result
                           FROM studentcourses c
                           JOIN enrollments e ON c.course_id = e.course_id
                           WHERE e.student_id = ?";
$stmt = mysqli_prepare($data, $enrolled_courses_query);

// Bind parameters
mysqli_stmt_bind_param($stmt, "i", $student_id);

// Execute the statement
mysqli_stmt_execute($stmt);

// Get result
$enrolled_courses_result = mysqli_stmt_get_result($stmt);

// Check for query execution errors
if (!$enrolled_courses_result) {
    die("Query failed: " . mysqli_error($data));
}

// Fetch result rows as an associative array
$enrolled_courses = mysqli_fetch_all($enrolled_courses_result, MYSQLI_ASSOC);

// Close the prepared statement
mysqli_stmt_close($stmt);

// Close the database connection
mysqli_close($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Student Dashboard - My Courses</title>

    <!-- Linking the external CSS file -->
    <link rel="stylesheet" type="text/css" href="../CSS/student-courses.css">

    <!-- Linking to Bootstrap for styling -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Adding JavaScript for Navbar Logout -->
    <script>
        $(document).ready(function(){
            $(".logout-btn").click(function(){
                // Add any additional logout logic here if needed
                window.location.href = "logout.php";
            });
        });
    </script>
</head>
<body>

    <!-- Header Section -->
    <header class="header p-3">
        <div class="float-left">
            <a href="#" class="text-white">Student Courses Dashboard</a>
        </div>
    </header>

    <!-- Navbar Section -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="#" class="btn btn-outline-light logout-btn">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Sidebar Section -->
    <aside class="sidebar p-4">
        <ul class="list-unstyled">
            <!-- Navigation Links -->
           <!-- <li><a href="studentcourses.php" class="text-white">My Courses</a></li>
            <li><a href="studentresults.php" class="text-white">My Results</a></li>
            <li><a href="studentfees.php" class="text-white">Fee Balance</a></li>
            <li><a href="studentlibrary.php" class="text-white">Library</a></li>
            <li><a href="studentenrolment.php" class="text-white">Enroll in Courses</a></li>-->
        </ul>
    </aside>

    <!-- Main Content Section -->
    <div class="content p-4">
        <!-- Student Information -->
        <div class="student-info p-3 text-right">
            <p class="text-white">Welcome, <?php echo $_SESSION['student_name']; ?></p>
            <p class="text-white">Student ID: <?php echo $_SESSION['student_id']; ?></p>
            <p class="text-white">Email: <?php echo $_SESSION['student_email']; ?></p>
        </div>

        <!-- Heading and Course List -->
        <h1 class="text-center mb-4">My Courses and Results</h1>
        
        <div class="table-container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Course Name</th>
                        <th>Result</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Display student information as the first row
                        echo '<tr><td colspan="2"><strong>Student Information</strong></td></tr>';
                        echo '<tr><td colspan="2">Welcome, ' . $_SESSION['student_name'] . '<br>Student ID: ' . $_SESSION['student_id'] . '<br>Email: ' . $_SESSION['student_email'] . '</td></tr>';

                        // Display enrolled courses and results
                        foreach ($enrolled_courses as $course) {
                            echo '<tr><td>' . $course['course_name'] . '</td><td>' . $course['result'] . '</td></tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

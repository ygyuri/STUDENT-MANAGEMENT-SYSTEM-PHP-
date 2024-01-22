<?php
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

// Fetch enrolled courses for all students
$enrolled_courses_query = "SELECT c.course_name, e.result
                           FROM studentcourses c
                           JOIN enrollments e ON c.course_id = e.course_id";

$enrolled_courses_result = mysqli_query($data, $enrolled_courses_query);

// Check for query execution errors
if (!$enrolled_courses_result) {
    die("Query failed: " . mysqli_error($data));
}

// Fetch result rows as an associative array
$enrolled_courses = mysqli_fetch_all($enrolled_courses_result, MYSQLI_ASSOC);

// Close the database connection
mysqli_close($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>All Students' Enrolled Courses</title>

    <!-- Linking the external CSS file -->
    <link rel="stylesheet" type="text/css" href="../CSS/student-courses.css">

    <!-- Linking to Bootstrap for styling -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

    <!-- Header Section -->
    <header class="header p-3">
        <div class="float-left">
            <a href="#" class="text-white">All Students' Enrolled Courses</a>
        </div>
    </header>

    <!-- Main Content Section -->
    <div class="content p-4">
        <!-- Heading and Course List -->
        <h1 class="text-center mb-4">All Students' Enrolled Courses</h1>
        
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
                        // Display enrolled courses and results for all students
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

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

// Handle enrollment messages
if (isset($_SESSION['enrollment_message'])) {
    $enrollment_message = $_SESSION['enrollment_message'];
    unset($_SESSION['enrollment_message']); // Clear the session message
}

// Fetch available courses for dropdown
$courses_query = "SELECT * FROM studentcourses";
$courses_result = mysqli_query($data, $courses_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Student Dashboard - Enroll in Courses</title>

    <!-- Linking the external CSS file -->
    <link rel="stylesheet" type="text/css" href="../CSS/studenthome.css">

    <!-- Linking to Bootstrap for styling -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

    <!-- Header Section -->
    <header class="header bg-dark text-white p-3">
        <a href="#" class="text-white">Student Dashboard</a>
        <div class="logout float-right">
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </header>

    <!-- Sidebar Section -->
    <aside class="bg-light p-4">
        <ul class="list-unstyled">
            <!-- Navigation Links -->
            <li><a href="studentcourses.php" class="text-dark">My Courses</a></li>
            <li><a href="studentresults.php" class="text-dark">My Results</a></li>
            <li><a href="studentfees.php" class="text-dark">Fee Balance</a></li>
            <li><a href="studentlibrary.php" class="text-dark">Library</a></li>
            <li><a href="studentenrolment.php" class="text-dark">Enroll in Courses</a></li>
        </ul>
    </aside>

    <!-- Main Content Section -->
    <div class="content p-4">
        <!-- Heading and Enrollment Form -->
        <h1 class="text-center mb-4">Enroll in Courses</h1>

        <?php
        // Display enrollment message if set
        if (isset($enrollment_message)) {
            echo '<div class="alert alert-success">' . $enrollment_message . '</div>';
        }
        ?>

        <form action="student-process-enrollment.php" method="post">
            <div class="form-group">
                <label for="course">Select Course:</label>
                <select class="form-control" id="course" name="course_id" required>
                    <?php
                    while ($course_row = mysqli_fetch_assoc($courses_result)) {
                        echo '<option value="' . $course_row['course_id'] . '">' . $course_row['course_name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="result">Enter Result:</label>
                <input type="text" class="form-control" id="result" name="result" required>
            </div>
            <button type="submit" class="btn btn-primary">Enroll</button>
        </form>
    </div>

</body>
</html>

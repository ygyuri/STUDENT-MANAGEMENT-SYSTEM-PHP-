<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

// Attempt to connect to the database
$data = mysqli_connect($host, $user, $password, $db);

// Check for connection errors
if (isset($_POST['add_teacher'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course_id = $_POST['course_id'];

    $sql = "INSERT INTO teachers (name, email, phone, course_id) VALUES ('$name', '$email', '$phone', '$course_id')";
    $result = mysqli_query($data, $sql);

    if ($result) {
        echo '<script>alert("Data of teacher uploaded successfully!");</script>';
    } else {
        echo '<script>alert("Upload Failed!");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>

    <!-- Linking my custom admin.css stylesheet -->
    <link rel="stylesheet" type="text/css" href="../CSS/admin.css">

    <!-- Linking to Bootstrap for styling -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Linking to Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

    <!-- Header Section -->
    <header class="header">
        <h1>Admin Dashboard</h1>
        <div class="logout">
            <a href="logout.php" class="btn btn-primary">Logout</a>
        </div>
    </header>

    <!-- Sidebar Section -->
    <aside>
        <ul>
            <!-- Navigation Links -->
            <li><a href="admission-request.php?action=view">Admission</a></li>
            <li><a href="add_student.php">Add Student</a></li>
            <li><a href="view_student.php">View Student</a></li>
            <li><a href="admin-add-teacher.php">Add Teacher</a></li>
            <li><a href="admin-view-teacher.php">View Teacher</a></li>
            <li><a href="#">Add Courses</a></li>
            <li><a href="#">View Courses</a></li>
        </ul>
    </aside>

    <!-- Main Content Section -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <!-- Heading and Paragraph -->
                <h1>Add Teacher</h1>
                <p>The admin has the following privileges of adding a teacher.</p>

                <!-- Form Container -->
                <div class="form-container">
                    <!-- Form -->
                    <form action="#" method="post">
                        <!-- Name Input -->
                        <label for="name">Name:</label>
                        <input type="text" name="name" required>
                        <br>

                        <!-- Email Input -->
                        <label for="email">Email:</label>
                        <input type="email" name="email" required>
                        <br>

                        <!-- Phone Input -->
                        <label for="phone">Phone:</label>
                        <input type="text" name="phone" required>
                        <br>

                        <!-- Course ID Input -->
                        <label for="course_id">Course ID:</label>
                        <input type="text" name="course_id" required>
                        <br>

                        <!-- Submit Button -->
                        <input type="submit" name="add_teacher" class="btn btn-primary" value="Add Teacher">

                        <!-- Exit Button -->
                        <a href="admin-home.php" class="btn btn-danger">Exit</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

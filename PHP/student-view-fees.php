<?php
session_start();

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

// Handle deletion or cancellation messages
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']); // Clear the session message
}

// Fetch student data
$sql = "SELECT * FROM studenttable";
$result = mysqli_query($data, $sql);
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

    <!-- Custom JavaScript for pop-up handling -->
    <script>
        function handleDeleteConfirmation(student_id) {
            var confirmDelete = confirm("Are you sure you want to delete this student?");
            if (confirmDelete) {
                window.location.href = "delete_student.php?student_id=" + student_id;
            } else {
                window.location.href = "admin-view-students.php?cancel=true";
            }
        }
    </script>
</head>
<body>

<!-- Header Section -->
<header class="header">
    <a href="">Student Fees Dashboard</a>
    <div class="logout">
        <a href="logout.php" class="btn btn-primary">Logout</a>
    </div>
</header>

<!-- Sidebar Section -->
<aside>
    <ul>
        <!-- Navigation Links -->
        <li><a href="admission-request.php?action=view"></a></li>
        <li><a href="add_student.php"></a></li>
        <li><a href="view_student.php"></a></li>
        <li><a href="admin-add-course.php"></a></li>
        <li><a href="admin-view-courses.php"></a></li>
        <!-- Add more links as needed -->
    </ul>
</aside>

<!-- Main Content Section -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <!-- Heading and Paragraph -->
            <h1>View Students</h1>

            <?php
            // Display deletion or cancellation message if set
            if (isset($message)) {
                echo '<div class="alert alert-success">' . $message . '</div>';
            }
            ?>

            <p>The admin has the following privileges as seen on the sidebar.</p>

            <!-- Table to display student data -->
            <div class="myTableDiv">
                <h2>Student Table</h2>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>StudentID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Course_ID</th>
                        <th>Fee Balance</th>
                        <th>Enrollment_ID</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        $feeBalance = $row['fees']; // Assuming 'fees' column represents balance

                        ?>
                        <tr>
                            <td><?php echo $row['student_id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['course_id']; ?></td>
                            <td><?php echo $feeBalance; ?></td>
                            <td><?php echo $row['enrollment_id']; ?></td>
                            <td>
                                <button onclick="handleDeleteConfirmation(<?php echo $row['student_id']; ?>)" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>

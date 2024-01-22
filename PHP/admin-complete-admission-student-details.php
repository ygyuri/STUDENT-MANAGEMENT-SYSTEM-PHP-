<!-- admin-complete-admission-student-details.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Complete Admission Student Details</title>
    <link rel="stylesheet" type="text/css" href="../CSS/admin.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>

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

        // Fetch student details from the admission table
        $sql = "SELECT name, email FROM admission WHERE id = ?";
        $stmt = mysqli_prepare($data, $sql);
        mysqli_stmt_bind_param($stmt, "i", $student_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $info = mysqli_fetch_assoc($result);

        // Close the prepared statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Invalid student ID.";
        exit();
    }
    ?>

    <header class="header">
        <h1>Complete Admission Student Details</h1>
        <div class="logout">
            <a href="logout.php" class="btn btn-primary">Logout</a>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="form-container">
                    <form action="admin-home.php" method="post">
                        <label for="name">Name:</label>
                        <input type="text" name="name" value="<?php echo $info['name']; ?>" readonly>
                        <br>

                        <label for="email">Email:</label>
                        <input type="email" name="email" value="<?php echo $info['email']; ?>" readonly>
                        <br>

                        <!-- Admin can enter remaining details here -->
                        <label for="password">Password:</label>
                        <input type="password" name="password" required>
                        <br>

                        <label for="course_id">Course ID:</label>
                        <input type="text" name="course_id" required>
                        <br>

                        <label for="fees">Fees:</label>
                        <input type="text" name="fees" required>
                        <br>

                        <label for="enrollment_id">Enrollment ID:</label>
                        <input type="text" name="enrollment_id" required>
                        <br>

                        <input type="submit" name="add_student" class="btn btn-primary" value="Add Student">
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

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

// Fetch enrolled courses and corresponding student information
$enrolled_courses_query = "SELECT c.course_name, e.result, s.student_id, s.name AS student_name, s.email AS student_email
                           FROM studentcourses c
                           JOIN enrollments e ON c.course_id = e.course_id
                           JOIN studenttable s ON e.student_id = s.student_id";

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
<html>
<head>
	<meta charset="utf-8">
	<title>All Students' Enrolled Courses</title>

	<!-- Linking the external CSS file -->
	<link rel="stylesheet" type="text/css" href="../CSS/admin.css">

	<!-- Linking to Bootstrap for styling -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>

	<!-- Header Section -->
	<header class="header">
		<a href="#" class="text-white">All Students' Enrolled Courses</a>
	    <div class="logout">
			<a href="logout.php" class="btn btn-primary">Logout</a>
		</div>
    </header>
	<!-- Main Content Section -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<!-- Heading -->
				<h1 class="text-center mb-4">All Students' Enrolled Courses</h1>
				
				<div class="table-container">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Course Name</th>
								<th>Result</th>
								<th>Student ID</th>
								<th>Student Name</th>
								<th>Student Email</th>
							</tr>
						</thead>
						<tbody>
							<?php
								// Display enrolled courses and student information
								foreach ($enrolled_courses as $course) {
									echo '<tr>
											<td>' . $course['course_name'] . '</td>
											<td>' . $course['result'] . '</td>
											<td>' . $course['student_id'] . '</td>
											<td>' . $course['student_name'] . '</td>
											<td>' . $course['student_email'] . '</td>
										  </tr>';
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<!-- Linking to Bootstrap JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>

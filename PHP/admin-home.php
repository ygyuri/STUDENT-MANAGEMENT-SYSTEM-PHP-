<!DOCTYPE html>
<html>
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
		<a href="">Admin Dashboard</a>
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
			<li><a href="admin-add-course.php">Add Courses</a></li>
			<li><a href="admin-view-courses.php">View Courses</a></li>
		</ul>
	</aside>

	 <!-- Main Content Section -->
     <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <!-- Heading and Paragraph -->
                <h1>This is the Admin Homepage</h1>
                <p>The admin Has the following Privileges as seen on the sidebar.</p>
            </div>
        </div>
    </div>

</body>
</html>

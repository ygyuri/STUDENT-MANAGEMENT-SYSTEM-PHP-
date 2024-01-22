<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Dashboard</title>

    <!-- Linking my custom admin.css stylesheet -->
    <link rel="stylesheet" type="text/css" href="../CSS/admin.css">

    <!-- Linking the external CSS file -->
    <link rel="stylesheet" type="text/css" href="../CSS/studenthome.css">

    <!-- Linking to Bootstrap for styling -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Linking to Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

    <!-- Header Section -->
    <header class="header">
        <a href="">Student Dashboard</a>
        <div class="logout">
            <a href="logout.php" class="btn btn-primary">Logout</a>
        </div>
    </header>

    <!-- Sidebar Section -->
    <aside>
        <ul>
            <!-- Navigation Links -->
            <li><a href="student-courses.php">My Courses and Results</a></li>
            <li><a href="student-enrollment.php">Enrollment</a></li>
            <li><a href="student-view-fees.php">Fee Balance</a></li>
            <li><a href="many-to-many-relationship.php">relationship</a></li>
        </ul>
    </aside>

    <!-- Main Content Section -->
    <div class="content">
        <!-- Heading and Paragraph -->
        <h1>Student's Platform.</h1>
        <p>This is the Student Dashboard where the student is able to access the privileges as seen on the sidebar.</p>
    </div>

</body>
</html>

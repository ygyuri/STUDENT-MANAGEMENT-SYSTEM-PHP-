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

// Check if the action parameter is set to "view"
if (isset($_GET['action']) && $_GET['action'] == 'view') {
    // Assuming the 'admission' table structure
    $sql = "SELECT * FROM admission";
    $stmt = mysqli_prepare($data, $sql);

    // Check for SQL execution errors
    if ($stmt === false) {
        die("Error in SQL query: " . mysqli_error($data));
    }

    // Execute the prepared statement
    mysqli_stmt_execute($stmt);

    // Get the result set
    $result = mysqli_stmt_get_result($stmt);
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Admin Dashboard</title>
        <link rel="stylesheet" type="text/css" href="../CSS/admin.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    </head>
    <body>

    <header class="header">
        <a href="">Admin Dashboard</a>
        <div class="logout">
            <a href="logout.php" class="btn btn-primary">Logout</a>
        </div>
    </header>

    <div class="content">
        <h1>Applied For Admission</h1>

        <table class="table table-striped table-hover center">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Action</th> <!-- New column for Admit button -->
            </tr>

            <?php
            while ($info = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo "{$info['name']}"; ?></td>
                    <td><?php echo "{$info['email']}"; ?></td>
                    <td><?php echo "{$info['phone']}"; ?></td>
                    <td><?php echo "{$info['message']}"; ?></td>
                    <td>
                        <a href="add_admissionrequest_student.php?id=<?php echo $info['id']; ?>" class="btn btn-success">Admit</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>

    </body>
    </html>

    <?php
    // Close the prepared statement and the database connection
    mysqli_stmt_close($stmt);
} else {
    echo "Invalid action requested.";
}
?>

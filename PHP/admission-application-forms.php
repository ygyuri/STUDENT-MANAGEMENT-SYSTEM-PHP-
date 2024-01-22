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

if(isset($_POST['apply']))
{
    $data_name = $_POST['name'];
    $data_email = $_POST['email'];
    $data_phone = $_POST['phone'];
    $data_message = $_POST['message'];

    $sql = "INSERT INTO admission (name, email, phone, message)
            VALUES('$data_name', '$data_email', '$data_phone', '$data_message')";

    $result = mysqli_query($data, $sql);

    if($result)
    {
        $_SESSION['message'] = "Application Sent Successfully";
    }
    else {
        $_SESSION['message'] = "Application Not Sent Successfully";
    }

    header("Location: index.php"); // Redirect back to index.php
    exit();
}
?>

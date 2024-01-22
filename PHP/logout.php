<?php
session_start();
session_destroy();
header("refresh:3;url=index.php"); // Redirect after 3 seconds
echo "You have been successfully logged out. Redirecting to login page...";
?>

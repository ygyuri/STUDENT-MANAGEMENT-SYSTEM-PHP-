<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>

    <!-- Linking Bootstrap for styling -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
        crossorigin="anonymous">

    <!-- Your custom CSS file -->
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <link rel="stylesheet" type="text/css" href="../CSS/teacher-login-form.css">
</head>

<body background="../STATIC/pexels-engin-akyurt-2952871.jpg" class="body_deg">

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form action="student-login.php" method="POST" class="form_main form_deg">
                    <p class="heading title_deg">Student Login</p>

                    <!-- Display login error message, if any -->
                    <h4>
                        <?php
                        session_start();
                        echo isset($_SESSION['loginMessage']) ? $_SESSION['loginMessage'] : '';
                        session_destroy();
                        ?>
                    </h4>

                    <!-- Student login form -->
                    <div class="inputContainer form-group">
                        <svg class="inputIcon" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="#2e2e2e" viewBox="0 0 16 16">
                            <path
                                d="M13.106 7.222c0-2.967-2.249-5.032-5.482-5.032-3.35 0-5.646 2.318-5.646 5.702 0 3.493 2.235 5.708 5.762 5.708.862 0 1.689-.123 2.304-.335v-.862c-.43.199-1.354.328-2.29.328-2.926 0-4.813-1.88-4.813-4.798 0-2.844 1.921-4.881 4.594-4.881 2.735 0 4.608 1.688 4.608 4.156 0 1.682-.554 2.769-1.416 2.769-.492 0-.772-.28-.772-.76V5.206H8.923v.834h-.11c-.266-.595-.881-.964-1.6-.964-1.4 0-2.378 1.162-2.378 2.823 0 1.737.957 2.906 2.379 2.906.8 0 1.415-.39 1.709-1.087h.11c.081.67.703 1.148 1.503 1.148 1.572 0 2.57-1.415 2.57-3.643zm-7.177.704c0-1.197.54-1.907 1.456-1.907.93 0 1.524.738 1.524 1.907S8.308 9.84 7.371 9.84c-.895 0-1.442-.725-1.442-1.914z">
                            </path>
                        </svg>
                        <input type="text" class="inputField form-control" name="username" id="username"
                            placeholder="Username" autocomplete="off">
                    </div>

                    <div class="inputContainer form-group">
                        <svg class="inputIcon" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="#2e2e2e" viewBox="0 0 16 16">
                            <path
                                d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z">
                            </path>
                        </svg>
                        <input type="password" class="inputField form-control" name="password" id="password"
                            placeholder="Password" autocomplete="off">
                    </div>

                    <button id="button" type="submit" class="btn btn-primary">Login</button>
                    

                    <!-- Button to redirect to home page -->
                    <div>
                        <a class="btn btn-default" href="index.php">Visit Home</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Linking Bootstrap JavaScript -->
    <script
        src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Login</title>

    <!-- Linking Bootstrap for styling -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Your custom CSS file -->
    <link rel="stylesheet" type="text/css" href="../CSS/teacher-login-form.css">
    <link rel="stylesheet" type="text/css" href="../CSS/style.css"> <!-- Include the common style.css file -->
</head>

<body background="../STATIC/pexels-engin-akyurt-2952871.jpg" class="body_deg">

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <form action="teacher-login.php" method="post" class="form_main form_deg">
                    <p class="heading title_deg">Teacher's Login</p>

                    <!-- Display login error message, if any -->
                    <h4>
                        <?php
                        session_start();
                        echo isset($_SESSION['loginMessage']) ? $_SESSION['loginMessage'] : '';
                        session_destroy();
                        ?>
                    </h4>

                    <!-- Teacher login form -->
                    <div class="inputContainer form-group">
                        <svg class="inputIcon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#2e2e2e" viewBox="0 0 16 16">
                            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"></path>
                        </svg>
                        <input type="text" class="inputField form-control" name="username" id="username" placeholder="Username" autocomplete="off">
                    </div>

                    <div class="inputContainer form-group">
                        <svg class="inputIcon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#2e2e2e" viewBox="0 0 16 16">
                            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"></path>
                        </svg>
                        <input type="password" class="inputField form-control" name="password" id="password" placeholder="Password" autocomplete="off">
                    </div>

                    <button id="button" type="submit" class="btn btn-primary">Login</button>
                    <a class="forgotLink btn btn-default" href="#">Forgot your password?</a>

                    <!-- Button to redirect to home page -->
                    <div>
                        <a class="btn btn-default" href="index.php">Visit Home</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Linking Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>

</html>

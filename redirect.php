<?php
include __DIR__ . './functions.php';
session_start();
$password = $_SESSION['password'];

// Put controls to destroy the session if I exit the redirected page and I try to retun back to it using the browser arrows back and forth.
// Initialize last_page to the current page URL if it doesn't exist
if (!isset($_SESSION['last_page'])) {
    $_SESSION['last_page'] = $_SERVER['REQUEST_URI'];
}

if (isset($_SESSION['last_page'])) {
    // If the referrer is not the last page, destroy and unset all session variables
    if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== $_SESSION['last_page']) {
        session_unset();
        session_destroy();
    }
}

// Set the current page as the last visited page
$_SESSION['last_page'] = $_SERVER['REQUEST_URI'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirect from PHP Strong Password Generator</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="mb-3">
            <h4>Password generated succesfully</h4>

        </div>
        <div class="mb-4">
            <span>Your password is: </span>
            <span style='color:chartreuse;  text-decoration: underline;  '><?= $password ?></span>
        </div>

        <?php
        if (isset($_GET['go_back'])) { // Check if the form was submitted

            session_unset(); // Unset all session variables
            session_destroy(); // Destroy the session
            header('Location: index.php'); // Redirect to the main page
            exit(); // Stop script execution
        }
        ?>

        <!-- HTML form with a submit button -->
        <form method="get">
            <button class='btn btn-primary' type="submit" name="go_back" value="Go back to main page">Go back to the main page</button>
        </form>

    </div>


    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>
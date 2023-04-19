<?php

include __DIR__ . './functions.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Strong Password Generator</title>
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="mb-4">
      <h1>PHP Strong Password Generator 19/04/23</h1>
    </div>

    <div>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
        <div class="mb-3 d-flex gap-3 align-items-center">
          <label class='' for="InputNumber" class="form-label">Insert the length you desire for your future password</label>
          <input class='w-25' type="number" class="form-control" id="InputNumber" name="pswLength" min="0" max="1000" step="1">
          <button type="submit" name="submit" class="btn btn-primary">Genera</button>

        </div>
        <?php

        if (!empty($_GET['pswLength']) && isset($_GET['submit'])) {
          if ($_GET['pswLength'] > 5) {
            session_start();


            // Store a value in the session
            $_SESSION['password'] = generateRandomString($_GET['pswLength']);

            $link = 'redirect.php'; // Set the URL of the link
            // Redirect to the link
            header('Location: ' . $link);
            exit();
          } else {
            echo '<span>The password must be longer than 5 charachters</span>';
          }
        } else {
          echo '<span>You must provide a value greater than 5 in the input field</span>';
        }

        ?>


      </form>
    </div>
  </div>





  <!-- bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>
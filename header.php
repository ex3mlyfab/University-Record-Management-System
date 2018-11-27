<?php 
  session_start();
  require_once 'functions.php';

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Home| student registration system</title>
    <?php 
      $userstr = ' (Guest)';

      if (isset($_SESSION['user']))
        {
        $user     = $_SESSION['user'];
        $loggedin = TRUE;
        $userstr  = " ($user)";
        }
      else $loggedin = FALSE;
      echo "<title>$appname | $userstr</title>";

    ?>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


    <!-- Custom styles for this template -->
    <link href="assets/css/form-elements.css" rel="stylesheet">
    <link href="assets/css/jumbotron.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#">Igbo-Owu Polytechnics</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <?php 
          if ($loggedin){
?>
          <li class="nav-item active">
            <a class="nav-link" href="dashboard.php">Dashboard<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="coursereg.php">Register Course</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="update.php">complete/update your registration</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">log out</a>
          </li>
          <?php } else { ?>
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="confirm.php">Confirm Registration</a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="login1.php">Log in</a>
          </li>
          <?php } ?>
        </ul>
        
      </div>
    </nav>
    
    
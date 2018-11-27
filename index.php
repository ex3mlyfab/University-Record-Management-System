<?php // Example 26-4: index.php
  require_once 'header.php';
  

?>

  <main role="main">

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container backy">
        <h1 class="display-3">Welcome University Record Management App! </h1>
        <p>Center for academic excellence and innovations that is unparallel to any other institution in Nigeria.</p>
        <p class="text-muted">Important- New and aspiring students should click the Register Link to put in for registration. old students should click on login to acces their portal</p>
        <p><a class="btn btn-primary btn-lg" href="register.php" role="button">Learn more &raquo;</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row text-center">
        <div class="col-md-5">
          <h2>Log in</h2>
          <p>Access your portal to update and modify your details. </p>
          <p><a class="btn btn-secondary" href="login1.php" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-5 offset-md-1">
          <h2>Register</h2>
          <p>Aspiring candidate should register here and view registration details later. </p>
          <p><a class="btn btn-secondary" href="register.php" role="button">View details &raquo;</a></p>
        </div>
        
      </div>

      <hr>

    </div> <!-- /container -->

  </main>
 <?require_once 'footer.php';
 ?>
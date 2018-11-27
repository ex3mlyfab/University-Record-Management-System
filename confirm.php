<?php
require_once 'header.php';

?>
<main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-3">Confirm registration status </h1>
          <h5>confirm registration</h5>
          <div class="row">
          <form action="ver.php" method="post" class="form-inline">
            <div class="col-md-8 mb-5">
            <div class="form-group">
              <label class="sr-only" for="form-first-name">email</label>
              <input type="email" name="customer" placeholder="enter your email address to verify registration...." class="form-control form-control-lg" id="phone" style="width: 800px;" required>
            </div>
            <button type="submit" class="btn btn-primary">Verify</button>
            </div>
          </form>
          </div>
        </div>
      </div>
<?php
require_once 'footer.php';
 ?>

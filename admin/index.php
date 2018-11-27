
<?php 
  require_once 'header.php';
  if (isset($_POST['user']))
  {
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);
    
    if ($user == "" || $pass == "")
        $error = "Not all fields were entered<br>";
    else
    {
      $result = queryMySQL("SELECT email,password FROM admin
        WHERE email='$user' AND password='$pass'");

      if ($result->num_rows == 0)
      {
        $error = "<span class='error'>Username/Password
                  invalid</span><br><br>";
      }
      else
      {
        $_SESSION['user'] = $user;
        $_SESSION['pass'] = $pass;
        header('location:dashboard.php');
      }
    }
  }

?>
 
   
    <main class="login-form">
      

    <div class="container">

      <form class="form-signin" action="index.php" method="POST">
        <h2 class="form-signin-heading text-center">Please sign in with your Email address and  password.</h2>
        <label for="inputEmail" class="sr-only">email</label>
        <input type="email" id="inputEmail" class="form-control" name="user" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Email</label>
        <input type="password" id="inputPassword" class="form-control" name="pass" placeholder="email" required>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div>
  </main>
  <? require_once 'footer.php';
  ?>

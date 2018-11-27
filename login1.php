
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
      $result = queryMySQL("SELECT matric_no,email FROM students_info
        WHERE matric_no='$user' AND email='$pass'");

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

      <form class="form-signin" action="login1.php" method="POST">
        <h2 class="form-signin-heading text-center">Please sign in with yourmatric no  and Email address  as your password.</h2>
        <label for="inputMatricno" class="sr-only">Matric Number</label>
        <input type="text" id="inputMatricno" class="form-control" name="user" placeholder="matric number" required autofocus>
        <label for="inputPassword" class="sr-only">Email</label>
        <input type="password" id="inputPassword" class="form-control" name="pass" placeholder="email" required>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div>
  </main>
  <? require_once 'footer.php';
  ?>

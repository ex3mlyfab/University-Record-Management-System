<?php
//session_destroy();
require_once 'header.php';
if (!($priviledge) ) {
   header('Location: ../index.php');}




if(isset($_POST['email']))
{
    
    $email = sanitizeString($_POST['email']);
    $name= sanitizeString($_POST['name']);
    $password = $_POST['password'];
    $telephone = sanitizeString($_POST['telephone']);
    $joined =sanitizeString($_POST['department']);

     

    
    
    if(queryMysql("INSERT INTO admin VALUES('','$name','$email','$telephone','$password','$joined')"))
    {
        Session::flash('success','user has been added succesfully');
        header('Location: dashboard.php');
        ?>
        <script>alert('successfully registered ');</script>
        <?php
    }
    else
    {
        ?>
        <script>alert('error while registering new user..');</script>
        <?php
    }
}
    ?>






    <div class="container-fluid">

        <hr>
        <div class="row"> 
         <center><div class="col-sm-6 offset-sm-3">  
         
                <form  action="" method="post" class="form">
                <fieldset>
                    <div id="look"></div>
               <legend>Create user account</legend>


                    <div class="form-group">
                    <label for="email">Email</label><br>
                    <input type="email" placeholder="user email...." name="email" class="form-control"><br>
                    </div>
                    <div class="form-group">
                    <label for="password">Password</label><br>
                    <input type="password" placeholder="password" name="password" class="form-control">
                    </div>
                  <br>
                    <div class="form-group">
                    <label for="name">Name</label><br>
                  <input type="text" placeholder="name" name="name" class="form-control"><br>
                    <div class="form-group">
                    <label for="telephone">Telephone</label><br>
                <input type="text" placeholder="Telephone" name="telephone" class="form-control"><br>
                  </div>
                  <div class="form-group">
                    <label for="role">Department</label>
                    <?php getdepartment(); ?>
                  </div>
                  
                  <div class="clearfix"></div>
               <button class="btn btn-primary btn-lg"  >Create User &raquo;</button>
</fieldset>

                </form>
        
        
        
        </div></center>
        </div>
        
        </div>
    </div>
   <?php require_once 'footer.php'; 
   ?>
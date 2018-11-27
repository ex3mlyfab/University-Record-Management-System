<?php
//session_destroy();
require_once 'header.php';
if (!($priviledge) ) {
   header('Location: ../index.php');}




if(isset($_POST['department']))
{
    
    
    $joined =sanitizeString($_POST['department']);

     

    
    
    if(queryMysql("INSERT INTO department VALUES('','$joined','')"))
    {
        
        header('Location: dashboard.php');
        ?>
        <script>alert('successfully registered ');</script>
        <?php
    }
    else
    {
        ?>
        <script>alert('error while registering new Department..');</script>
        <?php
    }
}
    ?>






    <div class="container">

        
         
                <form  action="" method="post" class="form">
                <fieldset>
                    <div id="look"></div>
               <legend>Create Department</legend>


                    
                    
                  <br>
                    <div class="form-group">
                    <label for="name">Name</label><br>
                  <input type="text" placeholder="Department Name...." name="name" class="form-control"><br>
                    
                                      
                  <div class="clearfix"></div>
               <button class="btn btn-primary btn-lg"  >Create Department &raquo;</button>
</fieldset>

                </form>
        
        
        
        </div></center>
        </div>
        
        </div>
    </div>
   <?php require_once 'footer.php'; 
   ?>
<?php
//session_destroy();
require_once 'header.php';
if (!($priviledge) ) {
   header('Location: ../index.php');
 }




if(isset($_POST['code']))
{
    
    $code = sanitizeString($_POST['code']);
    $title= sanitizeString($_POST['title']);
    $credit= $_POST['credit'];
    $level = sanitizeString($_POST['level']);
    $department =sanitizeString($_POST['department']);

     

    
    
  if(queryMysql("INSERT INTO courses VALUES ('','$code','$title','$credit','$department','$level', NULL)"))
    {
        
        header('Location: createcourse.php');
        }
    else
    {


    }
}



?>

    <div class="container-fluid">

        <hr>
        <div class="row"> 
         
          <div class="col-md-6 offset-md-3 bg-dark">  
         
                <form  action="" method="post" class="form bg-light">
                <fieldset>
                    <div id="look"></div>
               <legend class="text-center">Create Course</legend>


                    <div class="form-group">
                    <label for="email"><h4>Course code</h4>
                    <input type="text" placeholder="Course Code...." name="code" class="form-control"></label>
                    </div>
                    <div class="form-group">
                    <label for="password">Course Title</label>
                    <input type="text" placeholder="title ....." name="title" class="form-control">
                    </div>
                  <br>
                    <div class="form-group">
                    <label for="name">Credit</label>
                  <input type="number" placeholder="credit" name="credit" class="form-control"><br>
                    <div class="form-group">
                    <label for="telephone">department</label>
                <?php getdepartment(); ?>
                  </div>
                  <div class="form-group">
                    <label for="password">level</label>
                    <input type="text" placeholder="level ....." name="level" class="form-control">
                    </div>
                  
                  
                  <div class="clearfix"></div>
               <button class="btn btn-primary btn-lg"  >Create Course &raquo;</button>
</fieldset>

                </form>
        
        
        
        </div></center>
        </div>
        
        </div>
    </div>
   <?php require_once 'footer.php'; 
   ?>
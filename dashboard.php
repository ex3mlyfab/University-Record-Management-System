<?php // Example 26-4: index.php
  require_once 'header.php';
 if (!$loggedin)  header('location:index.php');
 	$user = $_SESSION['pass'];
 	$matricno=$_SESSION['user'];
 	$result = queryMySQL("SELECT m.id as id,m.name as fullname, m.email as mail,m.department as deptid, m.mobile as telephone,m.parents_mobile as NOKP, m.parents_name as NOK,m.blocked as block, d.name as depart ,p.approved as approved FROM students_info m JOIN payments p ON m.email = p.madeby JOIN department d ON m.department= d.dept_id WHERE m.email ='$user'");
if ($result->num_rows == 0)
  {
    die("<div class=\"container mt-4\">
      <h2> record not found, click here to <br> <a href=\"register.php\">Register</a></h2>
    </div>");
  }
  else
  {	
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $approved =strtoupper($row['approved']);
    $mat=$row['depart'];
    if($row['block'])die("you have been blocked");
    $fname=strtoupper($row['fullname']);
    $reg=($row['telephone'])? true: false;
    //check if registration is complete
    $parents=strtoupper($row['NOK']);
    $pphone= strtoupper($row['NOKP']);


?>
<div class="container-fluid">
      <div class="row">
        <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="dashboard.php" >Overview <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Complete/update registration</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="coursereg.php">Register Courses</a>
            </li>
            
          </ul>

          
        </nav>

        <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
          <h1>Dashboard</h1>

          <section class="row text-center placeholders">
            <div class="col-6 col-sm-3 placeholder">
            	<?php 
            	$image ="images/$user.jpg";
            	if (file_exists($image)){

            	?>
              <img src="<?php echo $image; ?>" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
              <h4><?php echo $matricno; ?></h4>
              <?php }else
              {
              	echo "<div class=\"dash\"><i class=\"fa fa-user\" width=\"200\"></i></div>";
              
             echo "<h4>".  $matricno; ?></h4>
              <div class="text-muted">Upload your image</div>
              <form action="upload.php" method="POST" enctype='multipart/form-data'>
                <div class="form-group">
			        <label class="sr-only" for="Amount">Upload picture</label>
			            <input type="file" name="image"  class="form-last-name form-control" id="form-last-name" required>
			    </div>
			    
			    <button type="submit" class="btn btn-sm btn-success">submit</button>
			   </form>

             <?php } ?>
            </div>
            
          </section>

          <h2>Details</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              
              <tbody>
                <tr>
                  <td>Full Names:</td>
                  <td><h4><?php echo $fname; ?></h4></td>
                  
                </tr>
                
                <tr>
                  <td>Department</td>
                  <td><h4><?php echo $mat; ?></h4></td>
                  
                </tr>
                <tr>
                  <td>Level: </td>
                  <td>ND 1</td>
                  
                </tr>
                <tr>
                  <td>Next of Kin</td>
                  <td><h4><?php echo $parents; ?></h4></td>
                  
                </tr>
                <tr>
                  <td>Next of Kin phone- number</td>
                  <td><h4><?php echo $pphone; ?></h4></td>
                </tr>
                
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>
<?php
}
require_once 'footer.php';
?>
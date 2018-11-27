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
    $fname=strtoupper($row['fullname']);
    $approved =strtoupper($row['approved']);
    $mat=$row['depart'];
    if(!$row['block'])die("you have been blocked");
    $fname=strtoupper($row['fullname']);
    $reg=($row['telephone'])? true: false;
    //check if registration is complete
    $parents=strtoupper($row['NOK']);
    $pphone= strtoupper($row['NOKP']);
    $mobile = strtoupper($row['telephone']);

 
?>


<div class="container-fluid">
      <div class="row">
      	<?php require_once 'sidebar.php'; ?>
        
        <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
          <h1>Update Registration</h1>
          <h2>Details</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <form action="updatereg.php" method="POST" id="form1" class="registration-form">
              <tbody>
                <tr>

                  <td>Full Names:</td>
                  <td><h4><?php echo $fname; ?></h4></td>
                  
                </tr>
                <tr>
                  <td>Phone number</td>
                  <td class="bg-dark"><input type="text" name="telephone" placeholder="enter your mobile line" class="form-group" required ></td>
                  
                </tr>
                <tr>
                  <td>Gender:</td>
                  <td>
                  	<select name="gender" class="form-group">
                  		<option value="male">Male</option>
                  		<option value="female">Female</option>
                  	
                  	</select></td>
                  
                </tr>
                
                <tr>
                  <td>Department</td>
                  <td><h4><?php echo $mat; ?></h4></td>
                  
                </tr>
                <tr>
                  <td>Program Type:</td>
                  <td>
                  	<select name="program">
                  		<option value="HND">HND</option>
                  		<option value="ND">ND</option>
                  	
                  	</select></td>
                  
                </tr>
                <tr>
                  <td>Date of Birth:</td>
                  <td class="bg-dark"><input type="date" name="dob" class="form-group" ></td>
                  
                </tr>
                <tr>
                  <td>Next of Kin</td>
                  <td><input type="text" name="parents" value=" <?php echo ($parents)? $parents : ""; ?> " class="form-group" ></td>
                  
                </tr>
                <tr>
                  <td>Next of Kin phone- number</td>
                  <td class="bg-dark"><input type="text" name="pphone" value="<?php echo ($pphone)? $pphone : ""; ?>" class="form-group"></td>
                </tr>
                <tr>
                	<td><button type="submit" class="btn btn-success">Submit</button></td>
                </tr>
                
              </tbody>
            </table>
            </form>
          </div>

		</main>
		<?php
	}
		require_once 'footer.php';
		?>
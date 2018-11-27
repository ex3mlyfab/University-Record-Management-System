<?php // Example 26-4: index.php
require_once 'header.php';
 if (!$loggedin)  header('location:index.php');
 	$user = $_SESSION['pass'];
 	$matricno=$_SESSION['user'];
 	$first=queryMysql("SELECT m.name as name,m.approved as approved, m.session as session, m.department as department, d.name as depart FROM students_info m JOIN department d ON m.department =d.dept_id WHERE m.matric_no = '$matricno'");
 	if($first->num_rows){
		$row = $first->fetch_array(MYSQLI_ASSOC);
		$dept =$row['department'];
		$mat=$row['depart'];
    $approved=$row['approved'];
		$level =100;
		$fname=strtoupper($row['name']);
	}
	

?>
<div class="container-fluid">
	        <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
	          <h1>Course Registration</h1>

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
	            <div class="col-6 col-sm-3 placeholder float-right">
	            	<p><b>Name:</b><?php echo $fname; ?></p>
	            	<p><b>Department:</b><?php echo $mat; ?></p>
								<p><b>Department:</b> ND 1</p>

	            	
	            </div>
	        </section>
	        <div class="table">
            <table class="table table-striped">
            	<thead>
            		<th>s/n</th>
            		<th>Course code</th>
            		<th>Course Title</th>
            		<th>Credit</th>

            	</thead>           
              	<tbody>
              <?php 
              $result="SELECT * FROM courses WHERE department_id ='$dept' AND level ='$level'";
              $courses= queryMysql($result);
              if($courses->num_rows){
              	$total =$courses->num_rows;
              	$rwo =$courses->fetch_array(MYSQLI_ASSOC);

              	$i=0;
              	do{
              		if ($i == $total) { break; }
              		$reg[$i] = $rwo['course'];
                  $sn =$i + 1;
              		echo "<tr>";
              		echo "<td>$sn</td>";
              		echo '<td>'.$rwo['course'].'</td>';
              		echo '<td>'.$rwo['course_name'].'</td>';
              		echo '<td>'.$rwo['credit'].'</td>';
              		


              		echo "</tr>";
              		$i++;

              	}while(($rwo = $courses->fetch_array()) && ($i < $total));


              }



              ?>
              		
              	</tbody>
          	</table>
      <?php if(!$approved) {?>
          	<section>
          		<div class="row justify-content-md-center">
          			<div class="col-md-4 offset-md-4">
          				<form action="" method="POST">
          					<div class="form-group">
          						<label for="consent">Register my course
          							<input type="checkbox" name="accept" value= 1 class="form-control">
          						</label>
                      <button type="submit" class="btn btn-success">Submit</button>
          						
          					</div>
          					
          				</form>
          				
          			</div>
          			
          		</div>
          	</section>
        <?php } else {
          ?><section>
              <div class="row justify-content-md-center">
                <div class="col-md-4 offset-md-4">
                  <h4>
                    You have succesfully registered your courses
                  </h4>
                </div>
              </div>
            </section>

       
<?php  }
if(isset($_POST['accept'])){
	$accept=$_POST['accept'];
	$query="UPDATE students_info SET approved='$accept'";
	if(queryMysql($query)){

		foreach ($reg as $course){

			queryMysql("INSERT INTO course_reg VALUES ('$course','$session','$semester','$matricno','','')");
		}
	
	}
}

?>

</div>



</div>
</main>
</div>
<?php require_once 'footer.php'; ?>

<?php
require_once 'header.php';
if (!($priviledge)) {
   header('Location: ../index.php');
}
if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0){
 // query db
 $id =sanitizeString($_GET['id']);
$sql="SELECT * FROM students_info WHERE id='$id'";
$result=queryMysql($sql);

if ($result->num_rows==0){

	die('<br><br><center><h1><span class="well">  Record not found in the database</span></h1></center>');
}else{
	$row = $result->fetch_array(MYSQLI_ASSOC);
	$name = $row['name'];
	$code =$row['matric_no'];
  $status = $row['blocked'];

	$result->free();

}
echo <<<_END

<div class="container">
<div class="page-header">
                    <h1 style=" 0   auto    0   auto;">BLOCK/UNBLOCK students</h1><hr>

                </div>
               <form  action="" method="post" class="form">
               <div class="form-group">
                    <label for="name">Name:</label><br>
               <input type="select" value="$name" name="title" class="form-control" readonly><br>
               </div>
               <div class="form-group">
                    <label for="course-code">Matric No</label><br>
               <input type="select" value="$code" name="code" class="form-control" readonly><br>
               </div>
               <div class="form-group">
                    <label for="level">Block student(checked if blocked)</label><br>
               <input type="checkbox"  name="blocked" value=0 class="form-control" ><br>
               </div>

               
               <button class="btn btn-primary btn-lg"  >Update &raquo;</button>
  </div>

_END;


if (isset($_POST['code'])){
	$title= sanitizeString($_POST['blocked']);
	
	
	$sql="Update students_info set blocked ='$title' WHERE id='$id'";
	if(queryMysql($sql)){

		die('<br><br><center><h1><span class="well">  Updated succesfully<a href="dashboard.php"> click here to go back</a> </span></h1></center>');}
	


}
}

require_once 'footer.php';
?>

<?php
require_once 'header2.php';
if (!($priviledge)) {
   header('Location: ../index.php');
}
if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0){
 // query db
 $id =sanitizeString($_GET['id']);
$sql="SELECT * FROM courses WHERE id='$id'";
$result=queryMysql($sql);

if ($result->num_rows==0){

	die('<br><br><center><h1><span class="well">  Record not found in the database</span></h1></center>');
}else{
	$row = $result->fetch_array(MYSQLI_ASSOC);
	$name = $row['course_name'];
	$code =$row['course'];
	$result->free();

}
echo <<<_END

<div class="container">
<div class="page-header">
                    <h1 style=" 0   auto    0   auto;">Change details for $name</h1><hr>

                </div>
               <form  action="" method="post" class="form">
               <div class="form-group">
                    <label for="name">Course Title</label><br>
               <input type="text" placeholder="change course title..." name="title" class="form-control" required><br>
               </div>
               <div class="form-group">
                    <label for="course-code">Course code</label><br>
               <input type="text" placeholder="Update course code..." name="code" class="form-control" required><br>
               </div>
               <div class="form-group">
                    <label for="level">level</label><br>
               <input type="text" placeholder="Update level" name="level" class="form-control" required><br>
               </div>

               <div class="form-group">
                    <label for="name">Credit</label><br>
               <input type="text" placeholder="Update credit" name="credit" class="form-control" required><br>
               </div>
               <button class="btn btn-primary btn-lg"  >Update Course &raquo;</button>
  </div>

_END;


if (isset($_POST['code'])){
	$title= sanitizeString($_POST['title']);
	$code= sanitizeString($_POST['code']);
	$level= sanitizeString($_POST['level']);
	$credit= sanitizeString($_POST['credit']);
	
	$sql="Update courses set course ='$code', course_name ='$title', level='$level', credit ='$credit' WHERE id='$id'";
	if(queryMysql($sql)){

		die('<br><br><center><h1><span class="well"> course Updated succesfully<a href="dashboard.php"> click here to go back</a> </span></h1></center>');}
	


}
}

require_once 'footer.php';
?>

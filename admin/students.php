<?php 
require_once 'header.php';
if (!($priviledge) ) {
   header('Location: ../index.php');}
$per_page=10;

		$sql="SELECT m.id as id, m.matric_no as matric,m.name as name, m.mobile as mobile, m.blocked as status, d.name as dept FROM students_info m JOIN department d ON m.department = d.dept_id";

		$result = queryMysql($sql);
	if($result->num_rows){
		$total =$result->num_rows;
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$total_pages=ceil($total/$per_page);

		if (isset($_GET['page']) && is_numeric($_GET['page']))
		{
		$show_page = $_GET['page'];
		
		// make sure the $show_page value is valid
		if ($show_page > 0 && $show_page <= $total_pages)
		{
			$start = ($show_page -1) * $per_page;
			$end = $start + $per_page; 
		}
		else
		{
			// error - show first set of results
			$start = 0;
			$end = $per_page; 
		}		
	}
	else
	{
		// if page isn't set, show first set of results
		$start = 0;
		$end = $per_page; 
	}
echo <<<_END
<div class="container-fluid"><center>
<div class="col-sm-8">
_END;

	// display pagination
	echo "<p align='center'>  <b>All Students List :</b> ";
	for ($i = 1; $i <= $total_pages; $i++)
	{
		echo "<a href='viewstudent.php?page=$i'>$i</a> ";
	}
	echo "</p><div class=\"table-responsive\">";
	echo '<table   align="center" class="table table-stripped">';
	echo '<th><td>&nbsp;</td><td>MATRIC NO</td><td>NAME</td><td>DEPARTMENT</td><td>TELEPHONE</td><td>Status</td></th>';
	$i= $start;
	//for ($i = $start; $i < $end; $i++)
	$nature =(!$row['status'])?"Normal":"Blocked";
	do {
		// make sure that PHP doesn't try to show results that don't exist
		if ($i == $total) { break; }
		
		echo "<tr>";
		echo '<td><a href="editstudent.php?id='.$row['id'].'">Edit</a><td>';
		echo '<td>'.$row['matric'].'</td>';
		echo '<td>'.$row['name'].'</td>';
		echo '<td>'.$row['dept'].'</td>';
		echo '<td>'.$row['mobile'].'</td>';
		echo '<td>'.$nature.'</td>';
		


		echo "</tr>";
		$i++;

		}while(($row = $result->fetch_array()) && ($i < $end) ); 
	echo "</table></div>";





}
require_once 'footer.php';
?>
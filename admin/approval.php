<?php 
require_once 'header.php';
if (!($priviledge) ) {
   header('Location: ../index.php');}
$per_page=10;

		$sql="SELECT m.name as name,p.id as id ,p.name as charges, p.teller_no as teller, p.date as dat, p.amount as charge, p.bank as bank FROM students_info m JOIN payments p ON m.email= p.madeby where p.approved < 1";

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
<div class="col-sm-6 offset-md-3">
_END;

	// display pagination
	echo "<p align='center'>  <b>All Users List :</b> ";
	for ($i = 1; $i <= $total_pages; $i++)
	{
		echo "<a href='approval.php?page=$i'>$i</a> ";
	}
	echo "</p><div class=\"table-responsive\">";
	echo '<table   align="center" class="table table-stripped">';
	echo '<th><td>&nbsp;</td><td>Name</td><td>Payment Type</td><td>Teller NO</td><td>Date</td><td>Amount</td><td>Bank Name</td></th>';
	$i= $start;
	//for ($i = $start; $i < $end; $i++)
	do {
		// make sure that PHP doesn't try to show results that don't exist
		if ($i == $total) { break; }
		
		echo "<tr>";
		echo '<td><a href="editpayment.php?id='.$row['id'].'">Edit</a><td>';
		echo '<td>'.$row['name'].'</td>';
		echo '<td>'.$row['charges'].'</td>';
		echo '<td>'.$row['teller'].'</td>';
		echo '<td>'.$row['dat'].'</td>';
		echo '<td>'.$row['charge'].'</td>';
		echo '<td>'.$row['bank'].'</td>';
		


		echo "</tr>";
		$i++;

		}while(($row = $result->fetch_array()) && ($i < $end) ); 
	echo "</table></div>";





}
require_once 'footer.php';
?>
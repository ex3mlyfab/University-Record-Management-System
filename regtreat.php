<?php
require_once 'header.php';

if (isset($_POST['first-name'])){
	$name= $_POST['first-name'];
	$lname= $_POST['form-last-name'];
	$email= $_POST['form-email'];
	$department= $_POST['department'];
	$date= $_POST['transaction-date'];
	$bank=$_POST['bank-name'];
	$teller=$_POST['teller-number'];
	$type="registration charge";
	$amount=$_POST['amount'];
	$name.=" ".$lname;
	$query1="INSERT INTO students_info VALUES ('','$email','NULL','$name','NULL','$department','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','')";
	if(queryMysql($query1)){

		$query2="INSERT INTO payments Values('','$type','$teller','$date','$email','$amount','0','$bank')";
		queryMysql($query2);
		die("<h4 class=\"mt-2\">succesfully registered check <a href=\"confirm.php\">Here</a> for Registration Status</h4>");
	}{
		die("error");
	}
}
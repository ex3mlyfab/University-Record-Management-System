<?php // Example 26-4: index.php
  require_once 'header.php';
  if (!$priviledge)  header('location:index.php');
  	$result1  = queryMysql("SELECT COUNT(*) as total FROM students_info");
  	$row = $result1->fetch_array(MYSQLI_ASSOC);
  	$totalStudent =$row['total'];
  	//echo "$total";

  	$result2 =queryMysql("SELECT COUNT(*) as total FROM payments WHERE approved=0");
  	$row2 = $result2->fetch_array(MYSQLI_ASSOC);
  	$totalunapproved = $row2['total'];
  	echo "$totalunapproved";
?>
<nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link" href="dashboard.php">Overview <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="deptlist.php">List of departments</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="courselist.php">List of Courses</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="createdepartment.php">Insert Department</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="students.php">All Students List</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="approval.php">Approve Payments</a>
            </li>
          </ul>

          
</nav>
<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
  <h1>Dashboard</h1>

  <section class="row text-center placeholders">
    <div class="col-6 col-sm-6 placeholder">
    	<h3>There are <?php echo "$totalStudent"; ?> number of students</h3>
    	<h3>you have <?php echo "$totalunapproved";?> payments approval to attend to <a href="approval.php">here</a></h3>
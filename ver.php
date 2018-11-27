<?php
require_once 'header.php';

if(isset($_POST['customer']))
{
  $tel = sanitizeString($_POST['customer']);
  $result = queryMySQL("SELECT m.id as id, m.email as mail,m.department as deptid, d.name as depart ,p.approved as approved FROM students_info m JOIN payments p ON m.email = p.madeby JOIN department d ON m.department= d.dept_id WHERE m.email ='$tel'");

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
    $id=$row['id'];
    ($id > 10)?$id ="00".$id:$id="000".$id;

    if ($approved){
      $matricno=date('Y')."/".strtoupper(substr($mat, 0,3))."/".$id;
      $query="UPDATE students_info SET matric_no='$matricno' WHERE id='$id'";
      queryMySQL($query);

    /*die("<body onload=\"document.forms['account'].submit()\">
    <form action=\"printed.php\" id=\"regform\" name=\"account\" method=\"POST\">
        <input type=\"hidden\" name=\"customer\" value=\"$tel\">
      </form></body>");*/
      die("<div class=\"container mt-4\"> you have been assigned <strong>$matricno</strong>&nbsp;as your matric number<br>
      <h2> Proceed to <br> <a href=\"login1.php\">Here  </a> to complete your registation.</h2>
    </div>");
    } else
    {
        die("<div class=\"container mt-4\"><h4>payment is under processing<br> check back in a little while</h4></div>");
      }

}
}
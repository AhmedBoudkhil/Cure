<!DOCTYPE html>
 <?php #include("func.php");?>
 <meta name="viewport"  content="width=device-width , initial-scale=1">
<html>
<head>
	<title>تفاصيل المريض</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
<?php
include("newfunc.php");
if(isset($_POST['patient_search_submit']))
{
	$contact=$_POST['patient_contact'];
	$query = "select * from patreg where contact= '$contact'";
  $result = mysqli_query($con,$query);
  $row=mysqli_fetch_array($result);
  if($row['lname']=="" & $row['email']=="" & $row['contact']=="" & $row['password']==""){
    echo "<script> alert('لا توجد مقالات! الرجاء إدخال تفاصيل صالحة'); 
          window.location.href = 'admin-panel1.php#list-doc';</script>";
  }
  else {
    echo "<div class='container-fluid' style='margin-top:50px;'>
	<div class='card'>
	<div class='card-body' style='background-color:#006A51;color:#ffffff;'>
<table class='table table-hover'>
  <thead>
    <tr>
      <th scope='col'>الاسم الأول</th>
      <th scope='col'>اسم العائلة</th>
      <th scope='col'>بريد إلكتروني</th>
      <th scope='col'>اتصال</th>
      <th scope='col'>كلمة المرور</th>
    </tr>
  </thead>
  <tbody>";

	
		    $fname = $row['fname'];
        $lname = $row['lname'];
        $email = $row['email'];
        $contact = $row['contact'];
        $password = $row['password'];
        echo "<tr>
          <td>$fname</td>
          <td>$lname</td>
          <td>$email</td>
          <td>$contact</td>
          <td>$password</td>
        </tr>";
    
	echo "</tbody></table><center><a href='admin-panel1.php' class='btn btn-light'>العودة إلى لوحة القيادة</a></div></center></div></div></div>";
}
  }
	
?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script> 
</body>
</html>
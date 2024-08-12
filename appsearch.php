<!DOCTYPE html>
 <?php #include("func.php");?>
 <meta name="viewport"  content="width=device-width , initial-scale=1">

<html>
<head>
	<title>تفاصيل المريض</title>
  <link rel="shortcut icon" type="image/x-icon" href="images/2.png" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

</head>
<body>
<?php
include("newfunc.php");
if(isset($_POST['app_search_submit']))
{
	$contact=$_POST['app_contact'];
	$query = "select * from appointmenttb where contact= '$contact';";
  $result = mysqli_query($con,$query);
  $row=mysqli_fetch_array($result);
  if($row['fname']=="" & $row['lname']=="" & $row['email']=="" & $row['contact']=="" & $row['doctor']=="" & $row['docFees']=="" & $row['appdate']=="" & $row['apptime']==""){
    echo "<script> alert('لم يتم العثور على إدخالات! الرجاء إدخال تفاصيل صالحة'); 
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
        <th scope='col'>اسم الطبيب</th>
        <th scope='col'>رسوم الاستشارات</th>
        <th scope='col'>تاريخ الموعد</th>
        <th scope='col'>وقت الموعد</th>
        <th scope='col'>حالة الموعد</th>
      </tr>
    </thead>
    <tbody>";
  
    
          $fname = $row['fname'];
          $lname = $row['lname'];
          $email = $row['email'];
          $contact = $row['contact'];
          $doctor = $row['doctor'];
          $docFees= $row['docFees'];
          $appdate= $row['appdate'];
          $apptime = $row['apptime'];
          if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
                    {
                      $appstatus = "نشيط";
                    }
                    if(($row['userStatus']==0) && ($row['doctorStatus']==1))  
                    {
                      $appstatus = "تم الإلغاء بواسطتك";
                    }

                    if(($row['userStatus']==1) && ($row['doctorStatus']==0))  
                    {
                      $appstatus = "ألغيت من قبل الطبيب";
                    }
          echo "<tr>
            <td>$fname</td>
            <td>$lname</td>
            <td>$email</td>
            <td>$contact</td>
            <td>$doctor</td>
            <td>$docFees</td>
            <td>$appdate</td>
            <td>$apptime</td>
            <td>$appstatus</td>
          </tr>";
    echo "</tbody></table><center><a href='admin-panel1.php' class='btn btn-light'>العودة إلى لوحة القيادة الخاصة بك</a></div></center></div></div></div>";
  }
  }
	
?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script> 
</body>
</html>
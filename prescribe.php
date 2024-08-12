<!DOCTYPE html>
<?php
include('func1.php');
$pid='';
$ID='';
$appdate='';
$apptime='';
$fname = '';
$lname= '';
$doctor = $_SESSION['dname'];
if(isset($_GET['pid']) && isset($_GET['ID']) && ($_GET['appdate']) && isset($_GET['apptime']) && isset($_GET['fname']) && isset($_GET['lname'])) {
  $pid = $_GET['pid'];
  $ID = $_GET['ID'];
  $fname = $_GET['fname'];
  $lname = $_GET['lname'];
  $appdate = $_GET['appdate'];
  $apptime = $_GET['apptime'];
}

if(isset($_POST['prescribe']) && isset($_POST['pid']) && isset($_POST['ID']) && isset($_POST['appdate']) && isset($_POST['apptime']) && isset($_POST['lname']) && isset($_POST['fname'])){
  $appdate = $_POST['appdate'];
  $apptime = $_POST['apptime'];
  $disease = $_POST['disease'];
  $allergy = $_POST['allergy'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $pid = $_POST['pid'];
  $ID = $_POST['ID'];
  $prescription = $_POST['prescription'];
  
  $query=mysqli_query($con,"insert into prestb(doctor,pid,ID,fname,lname,appdate,apptime,disease,allergy,prescription) values ('$doctor','$pid','$ID','$fname','$lname','$appdate','$apptime','$disease','$allergy','$prescription')");
    if($query)
    {
      echo "<script>alert('تم وصفه بنجاح!');</script>";
    }
    else{
      echo "<script>alert('غير قادر على معالجة طلبك. حاول ثانية!');</script>";
    }
}
?>

<html lang="en">
  <head>
    <title>وصفة طبية</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="images/2.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <style>
      .bg-primary {
        background: -webkit-linear-gradient(left, #006A51, #00B854);
      }
      .list-group-item.active {
        z-index: 2;
        color: #fff;
        background-color: #006A51;
        border-color: #00B854;
      }
      .text-primary {
        color: #006A51 !important;
      }
      .btn-primary {
        background-color: #00B854;
        border-color: #00B854;
      }
      body {
        padding-top: 50px;
        font-size: 1.1em;
      }
      table {
        width: 100%;
        font-size: 1em;
      }
      th, td {
        padding: 1em;
        text-align: center;
      }
      textarea {
        width: 100%;
        resize: vertical;
      }
      .navbar-logo {
        width: 50px;
        height: auto;
      }
      @media (max-width: 768px) {
        body {
          font-size: 1.2em;
        }
        table {
          font-size: 0.9em;
        }
        th, td {
          padding: 0.8em;
        }
        .btn {
          font-size: 0.9em;
          padding: 0.5em 1em;
        }
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
      <img src="images/1.png" alt="Cure Logo" class="navbar-logo">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="logout1.php"><i class="fa fa-sign-out" aria-hidden="true"></i> تسجيل خروج</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="doctor-panel.php"><i class="fa fa-sign-out" aria-hidden="true"></i> عودة</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container-fluid" style="margin-top: 50px;">
      <h3 class="text-center" style="padding-bottom: 20px; font-family: 'IBM Plex Sans', sans-serif;"> أهلا بك &nbsp<?php echo $doctor ?> </h3>

      <div class="tab-pane" id="list-pres" role="tabpanel" aria-labelledby="list-pres-list">
        <form class="form-group" name="prescribeform" method="post" action="prescribe.php">
          <div class="row">
            <div class="col-md-4"><label>مرض:</label></div>
            <div class="col-md-8">
              <textarea id="disease" name="disease" rows="5" required></textarea>
            </div>
            <br><br><br>
            <div class="col-md-4"><label>الحساسية:</label></div>
            <div class="col-md-8">
              <textarea id="allergy" name="allergy" rows="5" required></textarea>
            </div>
            <br><br><br>
            <div class="col-md-4"><label>وصفة طبية:</label></div>
            <div class="col-md-8">
              <textarea id="prescription" name="prescription" rows="10" required></textarea>
            </div>
            <br><br><br>
            <input type="hidden" name="fname" value="<?php echo $fname ?>" />
            <input type="hidden" name="lname" value="<?php echo $lname ?>" />
            <input type="hidden" name="appdate" value="<?php echo $appdate ?>" />
            <input type="hidden" name="apptime" value="<?php echo $apptime ?>" />
            <input type="hidden" name="pid" value="<?php echo $pid ?>" />
            <input type="hidden" name="ID" value="<?php echo $ID ?>" />
            <br><br><br><br>
            <input type="submit" name="prescribe" value="تشخيص" class="btn btn-primary" style="margin-left: 150px;">
          </div>
        </form>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.11.0/dist/umd/popper.min.js" integrity="sha384-k4oZrmy67BoV11Psc6gxCxS2u6A9/aTXtmDWmIFyANuHj10dc6g1txa5+qxKWpT" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

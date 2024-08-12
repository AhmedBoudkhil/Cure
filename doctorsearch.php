<!DOCTYPE html>
 <?php #include("func.php");?>
 <meta name="viewport"  content="width=device-width , initial-scale=1">

<html>
<head>
	<title>Détails du médecin</title>
  <link rel="shortcut icon" type="image/x-icon" href="images/2.png" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
<?php
include("newfunc.php");
if(isset($_POST['doctor_search_submit']))
{
	$contact=$_POST['doctor_contact'];
  $query = "select * from doctb where email= '$contact'";
  $result = mysqli_query($con,$query);
  $row=mysqli_fetch_array($result);
  if($row['username']=="" & $row['password']=="" & $row['email']=="" & $row['docFees']==""){
    echo "<script> alert('Aucune entrée trouvée !'); 
          window.location.href = 'admin-panel1.php#list-doc';</script>";
  }
  else {
    echo "<div class='container-fluid' style='margin-top:50px;'>
	<div class ='card'>
	<div class='card-body' style='background-color:#006A51;color:#ffffff;'>
<table class='table table-hover'>
  <thead>
    <tr>
      <th scope='col'>Nom d'utilisateur</th>
      <th scope='col'>Mot de passe</th>
      <th scope='col'>E-mail</th>
      <th scope='col'>Frais de consultation</th>
    </tr>
  </thead>
  <tbody>";

	// while ($row=mysqli_fetch_array($result)){
		    $username = $row['username'];
        $password = $row['password'];
        $email = $row['email'];
        $docFees = $row['docFees'];
        echo "<tr>
          <td>$username</td>
          <td>$password</td>
          <td>$email</td>
          <td>$docFees</td>
        </tr>";
	// }
	echo "</tbody></table><center><a href='admin-panel1.php' class='btn btn-light'>Revenir au tableau de bord</a></div></center></div></div></div>";
}
  }
	

?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script> 
</body>
</html>
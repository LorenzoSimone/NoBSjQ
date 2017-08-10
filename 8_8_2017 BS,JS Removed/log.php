<?php 
session_start();
include "init.php";
$username= $_POST["username"];
$Password = $_POST["pass"];
$qiot = "select * from Dati_iot where Username='$username' and Password='$Password';";
$qclient = "select * from Dati_clienti where Username='$username' and Password='$Password';";

if(mysqli_num_rows( mysqli_query($con,$qiot) ) > 0)
{
 $fetch = mysqli_fetch_array( mysqli_query($con,$qiot) );
 $_SESSION['name'] = $fetch['Username'];
 echo '<script type="text/javascript">'; 
 echo 'window.location.href = "/adiot/panel.php";';
 echo '</script>';
 
}
elseif (mysqli_num_rows(mysqli_query($con,$qclient))> 0) {

 $fetch = mysqli_fetch_array( mysqli_query($con,$qclient) );
 $_SESSION['name'] = $fetch['Username'];
 $_SESSION['azienda']= $fetch['Azienda'];
 $_SESSION['mail']= $fetch['Mail'];
 $_SESSION['prop']= $fetch['Proprietario'];

 echo '<script type="text/javascript">'; 
 echo 'window.location.href = "/cli/clients.php";';
 echo '</script>';
 
}

else{

echo '<script type="text/javascript">'; 
echo 'alert("Username o Password errata.");'; 
echo 'window.location.href = "index.php";';
echo '</script>';
}


?>
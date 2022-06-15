<?php
if(session_status()!=PHP_SESSION_ACTIVE) {

  session_start();
}
/*
@Author Sean Peart 
@Date created 8/3/2017
@Update.php
*/

?>
<?php


if($_SESSION["UserLogIn"] != true ) {

echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~willia55/DatabaseProject/')}, 1);</script>");
  


  }
  
 include("connect.php"); 

$First;
$Last; 
$year;
$address;
$city;
$zipCode; 
$state; 


 if(isset($_POST['Firstname'])){

         
         $First = $conn->escape_string($_POST['Firstname']); 

 }


  if(isset($_POST['Lastname'])){

    $Last = $conn->escape_string($_POST['Lastname']); 
 	
 }

  if(isset($_POST['Address'])){

     $address = $conn->escape_string($_POST['Address']);

 }





  if(isset($_POST['City'])){

     $city = $conn->escape_string($_POST['City']);

 }

 if(isset($_POST['State'])){

 	 $state = $conn->escape_string($_POST['State']);
   
}


  if(isset($_POST['Zipcode'])){

      $zipCode = $conn->escape_string($_POST['Zipcode']);
 	
 }


  if(isset($_POST['Year'])){

      $year = $conn->escape_string($_POST['Year']);
 	
 }

$username = $_SESSION["Username"];

$query2 = "UPDATE user SET Firstname='$First', Lastname='$Last',Address='$address',
City = '$city', zipcode='$zipCode', state='$state', year='$year' WHERE username='$username'";

if($conn->query($query2)){

	$_SESSION['Firstname'] = $First;

   echo("<strong><p style='color:green'>Updated sucessfully...<p></strong>"); 

  echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~willia55/DatabaseProject/Edit.php')}, 5000);</script>");
 

} else {

	   echo("<strong><p style='color:red'>Updated unsucessfully...<p></strong>"); 
       
         echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~willia55/DatabaseProject/Edit.php')}, 5000);</script>");
 
}
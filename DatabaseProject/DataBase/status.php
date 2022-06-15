<?php 

  $accept; 
  $decline; 
  
/*
@Author Sean Peart 
@Date created 8/3/2017
@Status.php
*/

if($_SESSION["UserLogIn"] != true ) {

echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~willia55/DatabaseProject/')}, 1);</script>");
  


  }

 include("connect.php"); 

 if(isset($_POST['accept'])){
 	
 $accept = $conn->escape_string($_POST['accept']); 
 
 $query = "SELECT * FROM request WHERE id = '$accept' "; 
 $result = $conn->query($query);


 $query2 ="UPDATE request SET status='Accepted' WHERE id='$accept'"; 
 
 $result2 = $conn->query($query2);
 
 if($result2){

   echo ("<p style='color:green'>Satus updated successfully</p>");
   echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~willia55/DatabaseProject/AdminDashboard.php')}, 5000);</script>");

 } else {

   echo ("<p style='color:red'>Satus updated unsuccessfully</p>");
   echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~pearts1/DatabaseProject/AdminDashboard.php')}, 5000);</script>");


 }
 
 }


 if(isset($_POST['decline'])){
 	
 $decline = $conn->escape_string($_POST['decline']); 
 
 $query = "SELECT * FROM request WHERE id = '$decline' "; 
 $result = $conn->query($query);


 $query2 ="UPDATE request SET status='Decline' WHERE id='$decline'"; 
 
 $result2 = $conn->query($query2);
 
 if($result2){

   echo ("<p style='color:green'>Status updated successfully</p>");
   echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~pearts1/DatabaseProject/AdminDashboard.php')}, 5000);</script>");

 } else {

   echo ("<p style='color:red'>Status updated unsuccessfully</p>");
   echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~pearts1/DatabaseProject/AdminDashboard.php')}, 5000);</script>");


 }
 
 }
 
 

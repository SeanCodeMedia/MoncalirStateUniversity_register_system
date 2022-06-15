<?php
if(session_status()!=PHP_SESSION_ACTIVE) {

  session_start();
}
/*
@Author Sean Peart 
@Date created 8/3/2017
@sendRequest.php
*/

?>
<?php

include 'connect.php';

if($_SESSION["UserLogIn"] != true ) {

echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~willia55/DatabaseProject/')}, 1);</script>");
  


  }

$class; 
$reason; 
$semester;
$comment;
$username = $_SESSION["Username"];
$status = "pending"; 

if (isset($_POST['Classes'])) {
	$class = $conn->escape_string($_POST['Classes']); 
}

if(isset($_POST['semester'])){
    
    $semester =  $conn->escape_string($_POST['semester']);       
 }

 if(isset($_POST['reason'])){
    
    $reason =  $conn->escape_string($_POST['reason']);        
 }

if(isset($_POST['comment'])){
    
    $comment =  $conn->escape_string($_POST['comment']);        
 }


$sql = 'SELECT * FROM request'; 

$result = $conn->query($sql);



$query= "INSERT INTO request(dateT,username,class,semester,reason,status,other) 
VALUES(NOW(),'".$username."','".$class."',' ".$semester."','".$reason."','".$status."','".$comment."')";


if($conn->query($query)){

      echo("<strong style='color:green'>Thank you for submiting your request...</strong>");
      echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~willia55/DatabaseProject/Dashboard.php')}, 5000);</script>");
  

}else{

	      echo("<strong style='color:red'>cannot send your request...</strong>");
      echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~willia55/DatabaseProject/Dashboard.php')}, 5000);</script>"); 
}

//echo(mysqli_error($dataBase));
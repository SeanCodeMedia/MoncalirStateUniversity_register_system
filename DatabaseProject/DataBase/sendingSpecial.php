<?php
if(session_status()!=PHP_SESSION_ACTIVE) {

  session_start();
}

/*
@Author Sean Peart 
@Date created 8/3/2017
@sendSpecial.php
*/


?>
<?php
include 'connect.php';

if($_SESSION["UserLogIn"] != true ) {

echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~willia55/DatabaseProject/')}, 1);</script>");
  


  }

$courseOffer; 
$day;
$topic; 
$comment; 
$username = $_SESSION["Username"];
$status = "not viewed";

if(isset($_POST['courseOffer'])){

$courseOffer = $conn->escape_string($_POST['courseOffer']);

}


if(isset($_POST['day'])){

$day = $conn->escape_string($_POST['day']);
	
}


if(isset($_POST['topic'])){

$topic = $conn->escape_string($_POST['topic']);
	
}

if(isset($_POST['info'])){

$comment = $conn->escape_string($_POST['info']);
	
}



$sql = "SELECT * FROM specialrequests"; 

$conn->query($sql);

$query = "INSERT INTO  specialrequests (DateT,username,Class,Topic,DayTime,status,more) 
VALUES(NOW(),'$username','$courseOffer','$topic','$day','$status','$comment')"; 

$result=$conn->query($query);

if($result){

    echo "<strong><p style='color:red;'>Sending Request...</strong></p>";

   echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~willia55/DatabaseProject/Dashboard.php')}, 5000);</script>");
  
} else{

	 echo "<strong><p style='color:red;'>Connot Send Request...</strong></p>";

	  echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~willia55/DatabaseProject/Dashboard.php')}, 5000);</script>");
  
}


?>


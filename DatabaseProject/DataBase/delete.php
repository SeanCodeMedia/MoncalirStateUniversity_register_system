<?php
if(session_status()!=PHP_SESSION_ACTIVE) {

  session_start();
}
?>
<?php 

/*
@Author Sean Peart 
@Date created 8/3/2017
@Delete.php
*/


include 'connect.php';

$delete; 

if($_SESSION["UserLogIn"] != true ) {

echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~pearts1/DatabaseProject/')}, 1);</script>");
  


  }


if (isset($_POST['deleteClass'])) {
	
	  $delete = $conn->escape_string($_POST['deleteClass']);
}


$sql = "DELETE FROM  request WHERE id ='$delete'"; 

 if($conn->query($sql)){

      echo("<strong style='color:red'>Deleting class request...</strong>");
       
    echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~pearts1/DatabaseProject/Dashboard.php')}, 5000);</script>");
  

 }





?> 
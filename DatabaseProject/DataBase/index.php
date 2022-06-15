<?php
if(session_status()!=PHP_SESSION_ACTIVE) {

  session_start();
}

/*
@Author Sean Peart 
@Date created 8/3/2017
@index.php
*/

?>
<!DOCTYPE html>
<html>
<head>

<?php 

error_reporting(0);

 if($_SESSION["UserLogIn"] == true){
      
     if( trim($_SESSION["roll"]) == "Student"){

        echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~willia55/DatabaseProject/Dashboard.php')}, 10);</script>"); 

          
       } else if (trim($_SESSION["roll"]) == "Faculty"){
          
           echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~willia55/DatabaseProject/FaculatyDashboard.php')}, 10);</script>"); 

          
       } else if (trim($_SESSION["roll"]) == "Admin"){
          
           
   echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~willia55/DatabaseProject/AdminDashboard.php')}, 10);</script>"); 

       }

 }else {
   
   echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~willia55/DatabaseProject/login.php')}, 10);</script>");  

 }

  ?> 


</head>
<body>


</body>
</html>
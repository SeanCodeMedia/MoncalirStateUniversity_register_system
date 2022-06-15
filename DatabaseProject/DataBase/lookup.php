<?php
if(session_status()!=PHP_SESSION_ACTIVE) {

  session_start();

}
/*
@Author Sean Peart 
@Date created 8/3/2017
@lookup.php
*/

 $class; 

 include 'connect.php';

 if($_SESSION["UserLogIn"] != true ) {

echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~pearts1/DatabaseProject/')}, 1);</script>");
  


  }

 if(isset($_POST['Classes'])){
          
    $class = $conn->escape_string($_POST['Classes']);      

 }

?>
<!DOCTYPE html>
<html>
<head>
	<title>DashBoard</title>
	<?php include 'nav.php'; ?>
</head>
<body>

<?php 
error_reporting(0);

 if($_SESSION["UserLogIn"] == true){
      
      if( trim($_SESSION["roll"]) == "Student"){

         echo '<a href="logout.php"><button>Log Out</button></a>
            <a href="Dashboard.php"><button>DashBoard</button></a>'; 

       } else if (trim($_SESSION["roll"]) == "Faculty"){
          
           echo '<a href="logout.php"><button>Log Out</button></a>
            <a href="FaculatyDashboard.php"><button>DashBoard</button></a>'; 

       } else if (trim($_SESSION["roll"]) == "Admin"){
          
           echo '<a href="logout.php"><button>Log Out</button></a>
            <a href="AdminDashboard.php"><button>DashBoard</button></a>'; 

       }

 }else {

 	echo '<a href="login.php"><button>Log In</button></a>
 	      <a href="signup.php"><button>Sign Up</button></a>'; 
 }


?>


<center>

<br> 
<br>
<br>

<table border="5" cellpadding="5">
  <th>Firstname</th>
  <th>Lastname</th>
	<th>Class</th>
	<th>Reason</th>
	<th>Other</th>
	<th>Semester</th>
	<th>Status</th>
	<th>Date Requested</th>
  <th>Accept</th>
  <th>Decline</th>


<?php

 include("connect.php"); 
 
$query = "SELECT * FROM request WHERE class = '$class' "; 

$result = $conn->query($query);
 


 while($row = $result->fetch_assoc()){
        echo("<tr>");

     $username = $row['username'];
     
     $query2 = "SELECT * FROM user WHERE username='$username'"; 

       $result2 = $conn->query($query2);

    
         while($row2 = $result2->fetch_assoc()){

         	   
                
                echo("<td>".$row2['Firstname']."</td>");
                echo("<td>".$row2['Lastname']."</td>");

         }

 

        echo("<td>".$row['class']."</td>");
        echo("<td>".$row['reason']."</td>");
        echo("<td>".$row['other']."</td>");  
        echo("<td>".$row['semester']."</td>");
        echo("<td>".$row['status']."</td>");
        echo("<td>".$row['dateT']."</td>");
        echo ("<td><form method='POST' action='status.php'>");
        echo ("<input type='hidden' name='accept' value='".$row['id']."'>");
        echo ("<input type='submit' value='Accept'>");
        echo ("</form>");
        echo ("<td><form method='POST' action='status.php'>");
        echo ("<input type='hidden' name='decline' value='".$row['id']."'>");
        echo ("<input type='submit' value='Decline'>");
        echo ("</form>");
        echo("</tr>");
 }
 

 
?> 


</table>

</center>
</body>
</html>
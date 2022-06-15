<?php
if(session_status()!=PHP_SESSION_ACTIVE) {

  session_start();

 /*
@Author Sean Peart 
@Date created 8/3/2017
@Search.php
*/


}

if($_SESSION["UserLogIn"] != true ) {

echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~willia55/DatabaseProject/')}, 1);</script>");
  


  }


$dataFound = false; 

 $search; 

 include 'connect.php';

 if(isset($_POST['search'])){
          
    $conn->escape_string($search = $_POST['search']);      

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
$count = 0; 
//$query = "SELECT * FROM request WHERE class = '$class' "; 

//$result = $conn->query($query);

$query3 = "SELECT * FROM user WHERE (Firstname LIKE '%$search%') OR (Lastname LIKE '%$search%')  "; 

$result3 = $conn->query($query3);


 while($row3 = $result3->fetch_assoc()){
    
   $username = $row3['username'];

   $query = "SELECT * FROM `request` WHERE `username` = '$username'";

   $result = $conn->query($query);
    

   if(result){


 while($row = $result->fetch_assoc()){
    $dataFound = true; 
    echo("<tr>");
    echo("<td>".$row3['Firstname']."</td>");
    echo("<td>".$row3['Lastname']."</td>"); 
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


    }

}

?> 

</table>


<?php
 
 if($dataFound == false){

   echo "<h1>Sorry Data was not found</h1>";
 }

?>

</center>
</body>
</html>
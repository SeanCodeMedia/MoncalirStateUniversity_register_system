<?php
if(session_status()!=PHP_SESSION_ACTIVE) {

  session_start();

}

/*
@Author Sean Peart 
@Date created 8/3/2017
@Semester.php
*/


if($_SESSION["UserLogIn"] != true ) {

echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~pearts1/DatabaseProject/')}, 1);</script>");
  


  }

  include 'connect.php';

 $semester; 

 if(isset($_POST['Classes'])){
          
    $semester = $conn->escape_string($_POST['Classes']);      

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
<?php 

 if($semester !="All Classes"){

   echo "<h2>Classes offered for the $semester semester </h2>";
 } else {

  echo "<h2> All the Class offered</h2>";
 }

?>

<br>

<table border="5" cellpadding="5">

	<th>Class</th>

	<th>Section</th>

  <th>Class Number</th>

  <th>Semester</th>

<?php

 include("connect.php"); 

if($semester == "All Classes"){

$query = "SELECT * FROM Courses"; 

$result = $conn->query($query);
 


 while($row = $result->fetch_assoc()){
        echo("<tr>");
        echo("<td>".$row['Classes']."</td>");
        echo("<td>".$row['section']."</td>");
        echo("<td>".$row['classNumber']."</td>");  
        echo("<td>".$row['semester']."</td>");
        echo("</tr>");
 }
 

} else{

$query = "SELECT * FROM Courses WHERE  semester = '$semester' "; 

$result = $conn->query($query);
 


 while($row = $result->fetch_assoc()){
        echo("<tr>");
        echo("<td>".$row['Classes']."</td>");
        echo("<td>".$row['section']."</td>");
        echo("<td>".$row['classNumber']."</td>");  
        echo("<td>".$row['semester']."</td>");
        echo("</tr>");
 }
}


 

 
?> 


</table>

</center>
</body>
</html>
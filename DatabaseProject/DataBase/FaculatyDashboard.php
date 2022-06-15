<?php
if(session_status()!=PHP_SESSION_ACTIVE) {

  session_start();
}

/*
@Author Sean Peart 
@Date created 8/3/2017
@FaculatyDashboard.php
*/

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
            <a href="Edit.php"><button>Edit</button></a>'; 

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

<?php 
  
  if($_SESSION["UserLogIn"] != true ) {

echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~willia55/DatabaseProject/')}, 1);</script>");
  


  } else {
         
          
          echo("<center><h2>Hello ".$_SESSION['Firstname']."!</h2></center>");

      }

?>

<center>
<form method="POST" action="lookup.php">

<label>Please select a class</label>
<br>
<select name="Classes" required>

<?php
   
   include("connect.php"); 
   
   $query = "SELECT Classes FROM Courses"; 
 

   $result=$conn->query($query); 
   
   

   
   while($row = $result->fetch_assoc()){
      
     echo("<option"); 
     echo("value=");
     echo($row['Classes']);
     echo (">");
     echo($row['Classes']);
     echo("<option>");

    }
?>

</select>
<input type="submit">
</form>

</center>

</body>
</html>
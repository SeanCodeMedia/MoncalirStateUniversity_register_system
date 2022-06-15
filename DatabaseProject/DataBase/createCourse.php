<?php
if(session_status()!=PHP_SESSION_ACTIVE) {

  session_start();
}
/*
@Author Sean Peart 
@Date created 8/3/2017
@createCourse.php
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

<?php 
  
  if($_SESSION["UserLogIn"] != true ) {

echo("<strong>you dont have access to route forbiden </strong>");

echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~pearts1/DatabaseProject/')}, 5000);</script>");
  


  } else {
         
          
          echo("<center><h2>Hello ".$_SESSION['Firstname']."!</h2></center>");

      }

?>
<center>

<form method="POST" action="registerClass.php">
  
  <label>Course Name:</label>
  <br>
  <input type="text" name="Coursename" placeholder="Course name" required>
  <br>
  <label>Course Number:</label>
  <br>
  <input type="text" name="CourseNumber" placeholder="Course Number" required>
  <br>
  <label>Course Section:</label>
  <br>
  <input type="text" name="CourseSection" placeholder="Section Number" required>
  <br>
  <label>Semester to be offerd:</label>
<br>
<select name="Semester" required>

 <option value="Fall 2017">Fall 2017</option>
<option value="Winter 2017">Winter 2018</option>
 <option value="Spring 2018">Spring 2018</option>
<option value="Summer 2018">Summer 2018</option>


</select>
  <br> 
  <br>
  <input value="create Course" type="submit">

</form>

</center>

</body>
</html>
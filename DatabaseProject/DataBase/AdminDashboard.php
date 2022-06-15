<?php
if(session_status()!=PHP_SESSION_ACTIVE) {

  session_start();
}

/*
@Author Sean Peart 
@Date created 8/3/2017
@AdminDashboard.php
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
      
      echo '<a href="logout.php"><button>Log Out</button></a>
            <a href="Edit.php"><button>Edit Profile</button></a>'; 


 }else {

 	echo '<a href="login.php"><button>Log In</button></a>
 	      <a href="signup.php"><button>Sign Up</button></a>'; 
 }


?>

<?php 
  
  if($_SESSION["UserLogIn"] != true ) {

echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~pearts1/DatabaseProject/')}, 1);</script>");
  


  } else {
         
          
          echo("<center><h2>Hello ".$_SESSION['Firstname']."!</h2></center>");

      }

?>
<center>

<a href="createCourse.php"><button>Create Course</button></a>
<br>
<br>
<a href="FaculatyDashboard.php"><button>Look up course</button></a>
<br>
<br>
<a href="semsterlookup.php"><button>Class offered</button></a>
<br>
<br>
<form method="POST" action="search.php">
	Search:<input type="text" name="search"  placeholder="search for student">
    <input type="submit" value="Search">
 </form>

</center>

</body>
</html>
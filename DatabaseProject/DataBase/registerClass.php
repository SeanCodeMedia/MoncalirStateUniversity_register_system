<?php


error_reporting(0);

if($_SESSION["UserLogIn"] != true ) {

echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~willia55/DatabaseProject/')}, 1);</script>");
  


  }

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

 }

?>


<?php 

include("connect.php"); 

$name; 
$number; 
$section;
$semester;

if (isset($_POST['Coursename'])) {

$name = $conn->escape_string($_POST['Coursename']); 


}


if (isset($_POST['CourseNumber'])) {

$number = $conn->escape_string($_POST['CourseNumber']); 

}


if (isset($_POST['CourseSection'])) {

$section = $conn->escape_string($_POST['CourseSection']); 

}
if (isset($_POST['Semester'])) {

$semester = $conn->escape_string($_POST['Semester']); 

}


$query = "SELECT * FROM Courses"; 

$result = $conn->query($query); 


$query2 = "INSERT INTO Courses(Classes,section,classNumber,semester) VALUES('$name' , '$section','$number','$semester')";

$result2 = $conn->query($query2); 

if ($result2) {
	
	echo ("<p style='color:green'>Course created successfully</p>");
   echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~willia55/DatabaseProject/AdminDashboard.php')}, 5000);</script>");

}else{

  echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~willia55/DatabaseProject/AdminDashboard.php')}, 5000);</script>");

   echo ("<p style='color:red'>Course created unsuccessfully</p>");

}




?> 
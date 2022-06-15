<?php
if(session_status()!=PHP_SESSION_ACTIVE) {

  session_start();
}

/*
@Author Sean Peart 
@Date created 8/3/2017
@Dashboard.php
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


echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~pearts1/DatabaseProject/')}, 1);</script>");
  


  } else {
         
          
          echo("<center><h2>Hello ".$_SESSION['Firstname']."!</h2></center>");

      }

?>


<center>
	

<STRONG><h4 style="color:red">
*Please note all these classes are full please fill in the information below to be added to the wait list</h4></STRONG>

<form method="POST" action="sendRequest.php">

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
<br><br>

Semster:<select name="semester" required>
	<option value="Fall 2017">Fall 2017</option>
	<option value="Spring 2018">Spring 2018</option>
    <option value="Winter 2017">Winter 2017</option>
  <option value="Summer 2018">Summer 2018</option>
</select>
<br><br>

<p>Reason to be added to the wait list</p>

  <input type="radio" name="reason" value="I need this class for  for graduation" required>I Need this class to graduate this semester<br>
  <input type="radio" name="reason" value="I forgot my registration date" required>I forgot my registration date<br>
  <input type="radio" name="reason" value="other" required> Other
<br><br>
<STRONG><h4 style="color:red"> If other was selected please give us a reason why you should be added to the wait list!</h4></STRONG>
<textarea rows="4" cols="50" name="comment" value="N/A">

</textarea>
<br>
<br>
<input type="submit" value="Send Request">

</form> 

<hr>

<h3 style="color:red">Wait List Request</h3>

<div>

 <?php 
     
include 'connect.php';

  $username = $_SESSION["Username"];
  
  $query = 'SELECT * FROM request WHERE username="'.$username.'" ORDER BY dateT'; 

  $result=$conn->query($query); 

  // $data = mysqli_fetch_all($result); 

   echo('
        <table border="1" cellpadding="10" style="width:70%;">  

         <tr>
              <th> Class </th>
              <th> Request date </th>
              <th> Status </th>
              <th> Semester </th>
              <th> Action </th>

         <tr>'); 

      while($row = $result->fetch_assoc()){
            echo('<tr>
             <td>'.$row['class'].'</td>
             <td>'.$row['dateT'].'</td>
             <td>'.$row['status'].'</td>
             <td>'.$row['semester'].'</td>
             '); 
              if ($row['status'] == "pending" ){

                echo ('<td><form method="POST" action="delete.php">
                 <input type="hidden" name="deleteClass" value ='.$row['id'].'>
                 <input type="submit" value="Delete" >
                </form>
                </td>
                 </tr>');
              } else{
                   echo ('<td>N/A</td></tr>');
              }
           

         
        }

      
   echo('</table>');



  ?>
</div>

<hr>
<strong><h2 style="color:red"> Special Request</h2></strong>
<form method="POST" action="sendingSpecial.php">
	 <p>Please enter a course you would like to see offed:</p>
	 <input type="text" name="courseOffer" required> 
	 <p>Please select a time of day you would like to see this course offered:</p>

	 <input type="radio" name="day" value ="Morning" required>Morning<br><br>
	 <input type="radio" name="day" value="Afternoon" required>Afternoon<br><br>
	 <input type="radio" name="day" value ="Night" required>Night<br><br>


	 <p>Please enter a topic you would like to see offed in this course:</p>

      <input type="text" name="topic" required> 

      <p>Please enter additional information about this class you are requesting:</p>

      <textarea rows=10 cols="100" name="info"> 
      	
      </textarea>
       <br>
       <br>
      <input type="submit" value=" Send Special Request">

</form>

<br> 
<br>

<?php 
     
include 'connect.php';

  $username = $_SESSION["Username"];

 $query = 'SELECT * FROM specialrequests WHERE username="'.$username.'" ORDER BY dateT'; 

  $result=$conn->query($query); 


  // $data = mysqli_fetch_all($result); 

   echo('
        <table border="1" cellpadding="10" style="width:70%;">  

         <tr>
              <th> Class </th>
              <th> Topic </th>
              <th> Status </th>
              <th> DayTime </th>
              <th> Date sent </th>
              <th> Action </th>

         <tr>'); 

      while($row = $result->fetch_assoc()){
            echo('<tr>
             <td>'.$row['Class'].'</td>
             <td>'.$row['Topic'].'</td>
             <td>'.$row['status'].'</td>
             <td>'.$row['DayTime'].'</td>
             <td>'.$row['DateT'].'</td>
             <td><form method="POST" action="delete2.php">
                 <input type="hidden" name="deleteClass" value ='.$row['id'].'>
                 <input type="submit" value="Delete" >
                </form>
              </td>
         </tr>
');
         
        }

      
   echo('</table>');



  ?>
</div>


</center>


</body>
</html>

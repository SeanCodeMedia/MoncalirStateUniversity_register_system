<?php
if(session_status()!=PHP_SESSION_ACTIVE) {

  session_start();
}
/*
@Author Sean Peart 
@Date created 8/3/2017
@SignIn.php
*/

?>
<?php 


 
$runned = false; 
$runned2 = false;
//session_start();

// if($_SESSION["UserLogIn"] != true ) {

// echo("<strong>you dont have access to route forbiden </strong>");

// header('Refresh: 5; URL=http://localhost:8080/DataBase/');

//   }

include 'connect.php';
 $username; 
 $password; 

 if(isset($_POST['username'])){

$username = $conn->escape_string($_POST['username']); 

 }  

if(isset($_POST['password'])){

$password = $conn->escape_string($_POST['password']); 

 }  




 $query = 'SELECT * FROM user where username = "'.$username.'"';

$result = $conn->query($query);
  

if($result &&  $result->num_rows > 0){
        
  while($row = mysqli_fetch_assoc($result)) {
      

  if($row['username'] == $username){
     
      if (password_verify($password,$row['password'])){

                 
     echo("<strong><p style='color:Green;'> Log In sucessful </p></strong>");

      $_SESSION["UserLogIn"] = true; 

      $_SESSION["Username"] = $username; 

      $_SESSION["Firstname"] = $row['Firstname']; 
      
      $_SESSION["Lastname"] = $row["Lastname"];


     if(trim($row["roll"]) == "Student"){
        
         $_SESSION["roll"] = trim($row["roll"]);
    

         echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~willia55/DatabaseProject/Dashboard.php')}, 5000);</script>");
          
     } if(trim($row["roll"]) == "Faculty"){

                $_SESSION["roll"] = trim($row["roll"]);

           echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~willia55/DatabaseProject/FaculatyDashboard.php')}, 5000);</script>");
  
     } if (trim($row["roll"]) == "Admin") {

          $_SESSION["roll"] = trim($row["roll"]); 
       
       echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~willia55/DatabaseProject/AdminDashboard.php')}, 5000);</script>");
  

     }

 

          } else {
                 
 echo("<strong><p style='color:red;'> Password Does not match our records </p></strong>");


   echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~willia55/DatabaseProject/login.php')}, 5000);</script>");
  
        
 }

     
  }

    }

} else {


     echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~willia55/DatabaseProject/signup.php')}, 5000);</script>");

    
}






?> 

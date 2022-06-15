<?php
if(session_status()!=PHP_SESSION_ACTIVE) {

  session_start();
}
?>
<?php 

include 'connect.php';
//session_start();

// if($_SESSION["UserLogIn"] != true ) {

// echo("<strong>you dont have access to route forbiden </strong>");

// header('Refresh: 5; URL=http://localhost:8080/DataBase/');

//   }


 $username; 
 $password; 

 if(isset($_POST['username'])){

$username = $_POST['username']; 

 }  

if(isset($_POST['password'])){

$password = $_POST['password']; 

 }  


     $query = 'SELECT * FROM faculty where username = "'.$username.'"';
   
     $result = $conn->query($query);
  

if($result &&  $result->num_rows > 0){
				
	while($row = mysqli_fetch_assoc($result)) {
      

  if($row['username'] == $username){
     
          if (password_verify($password,$row['password'])){

                 
     echo("<strong><p style='color:Green;'> Log In sucessful </p></strong>");

      $_SESSION["UserLogIn"] = true; 

      $_SESSION["Username"] = $username; 

      $_SESSION["Firstname"] = $row['Firstname']; 


    
    echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~willia55/DatabaseProject/FaculatyDashboard.php')}, 5000);</script>");
  

          } else {
                 
 echo("<strong><p style='color:red;'> Password Does not match our records </p></strong>");


   echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~willia55/DatabaseProject/FaculatyLogIn.php')}, 5000);</script>");
  
        
 }

     
  }

    }

} else {
  
  echo("Sorry Something not right ):");
echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~willia55/DatabaseProject/faculatyUp.php')}, 5000);</script>");
  

}

 

?> 

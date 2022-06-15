<!DOCTYPE html>
<html>
<head>
	<title>LogIn</title>
	<?php include 'nav.php';?>
</head>
<body>

<?php 
error_reporting(0);

 if($_SESSION["UserLogIn"] == true){
      
      echo '<a href="logout.php"><button>Log Out</button></a>'; 

 }else {

 	echo '<a href="signup.php"><button>Sign Up</button></a>
 	     <a href="AdminSignUp.php"><button>Admin Sign Up</button></a>'; 
 }


?>
<center>



<?php 

//  if($_SESSION["UserLogIn"] != true ) {

// echo("<strong>you dont have access to route forbiden </strong>");

// header('Refresh: 5; URL=http://localhost:8080/DataBase/');

//   }

?>

	<form method="POST" action="AdminLog.php">

		Username: <input type="text" name="username" placeholder="Username"><br><br>
		Password: <input type="password" name="password" placeholder="Password"><br><br>
		<input type="submit" value="Log In">

	</form>

</center>


</body>
</html>
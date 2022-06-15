<?php
if(session_status()!=PHP_SESSION_ACTIVE) {

	session_start();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<?php include 'nav.php';?>

	<?php 
error_reporting(0);

 if($_SESSION["UserLogIn"] == true){
      
      echo '<a href="logout.php"><button>Log Out</button></a>'; 

 }else {

  echo '<a href="login.php"><button>Log In</button></a>
  <a href="faculatyIn.php"><button>Faculty Sign In</button></a>'; 
 }


?>
</head>
<body>
<center>
<form method="POST" action="create.php">


<?php 

//   if($_SESSION["UserLogIn"] != true ) {

//  echo("<strong>you dont have access to route forbiden </strong>");

// // header('Refresh: 5; URL=http://localhost:8080/DataBase/');
// }

?>
 
<input 

<?php 


if($_SESSION["UserExist"] == "true"){
        
        echo ("style='border-color:red;'");
        var_dump($_SESSION["UserExist"]);
 } 

 ?>


type="text" name="username" placeholder="username" required><br><br>
 
<?php 

if($_SESSION["UserExist"] == "true"){
        
        echo ("<small style='color:red;'> Username is taken or logIn </small><br>");
 
 } 

 ?>


<input  type="password" name="password" placeholder="password" required

<?php 

if($_SESSION["password_Miss_Match"] == "true"){
        
        echo ("style='border-color:red;'");
 
 }

 ?>
 ><br><br>
<input type="password" name="confirmPassword" placeholder="comfirm password" required

<?php 
if($_SESSION["password_Miss_Match"] == "true"){
        
        echo ("style='border-color:red'");
 
 }

 ?>><br><br>
<input type="text" name="Firstname" placeholder="First name" required><br><br>
<input type="text" name="Lastname" placeholder="Last name" required><br><br>
<input type="text" name="Address" placeholder="Address" required><br><br>
<input type="text" name="City" placeholder="City" required><br><br>
<select name="State" required>
	<option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
</select><br><br>
<input type="text" name="Zipcode" placeholder="Zipcode" required><br><br>

<select name="accountType" required>
	<option value="Faculty">Faculty</option>
</select><br><br>


<input type="submit">
</form>
</center>




</body>
</html>

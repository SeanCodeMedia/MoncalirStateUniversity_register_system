<?php
if(session_status()!=PHP_SESSION_ACTIVE) {

  session_start();
}
/*
@Author Sean Peart 
@Date created 8/3/2017
@FaculityEdit.php
*/

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
	<?php include 'nav.php'; ?>
</head>
<body>

<?php 
error_reporting(0);

 if($_SESSION["UserLogIn"] == true){
      
      echo '<a href="logout.php"><button>Log Out</button></a>
            <a href="FaculatyDashboard.php"><button>DashBoard</button></a>'; 


 }else {
 
 echo("<strong>you dont have access to route forbiden </strong>");
 	echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~pearts1/DatabaseProject/')}, 5000);</script>");
 
 }


?>
<?php 
     
include 'connect.php';

  $username = $_SESSION["Username"];
  
  $query = 'SELECT * FROM faculty where username = "'.$username.'"';
   
  $result = $conn->query($query);

  $row = $result->fetch_assoc();
     
   echo('
   	    <br>
   	    <br>
        <center><table border="1" cellpadding="2" style="width:70%;">  

         <tr>
              <th> Firstname </th>
              <th> Lastname </th>
              <th> Address </th>
              <th> City </th>
              <th> State </th>
              <th> zipCode </th>
              <th> Save </th>
         <tr>'); 
       
            echo('<form method="POST" action="update.php"><tr>
        <td><input type="text" name="Firstname" value='.$row['Firstname'].' required ></td>
       <td><input type="text" name="Lastname" value='.$row['Lastname'].'  required></td>
  <td><input type="text" required name="Address" value='.str_replace(' ', '',$row['Address']).'></td>
             <td><input type="text" name="City" value='.$row['City'].' required></td>
            <td>
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
	<option value="NJ" selected>New Jersey</option>
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
</select>

</td>

  <td><input type="text" name="Zipcode" value='.$row['zipcode'].' required></td>
   
             <td><input type="submit" value="save"></td>
         </tr></form>
');
         
   

      
   echo('</table></center>');



  ?>
</body>
</html>
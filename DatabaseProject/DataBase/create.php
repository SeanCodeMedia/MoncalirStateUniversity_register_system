<?php
if(session_status()!=PHP_SESSION_ACTIVE) {

  session_start();
}

/*
@Author Sean Peart 
@Date created 8/3/2017
@create.php
*/


?>


<?php 

include 'connect.php';

//session_start();
$username;
$password;
$Password2; 
$First;
$Last; 
$year;
$address;
$city;
$zipCode; 
$state; 
$account;


if($_SESSION["UserLogIn"] != true ) {

echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~pearts1/DatabaseProject/')}, 1);</script>");
  


  }

 
//  if($_SESSION["UserLogIn"] != true ) {

// echo("<strong>you dont have access to route forbiden </strong>");


//   echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~pearts1/DatabaseProject/')}, 5000);</script>");
  
//   }

if(isset($_POST['username'])){

        $username = $conn->escape_string($_POST['username']); 

} 


if(isset($_POST['password'])){

        $password = $conn->escape_string($_POST['password']); 

}


if(isset($_POST['confirmPassword'])){

        $Password2 = $conn->escape_string($_POST['confirmPassword']); 


}

 if(isset($_POST['Firstname'])){

         
         $First = $conn->escape_string($_POST['Firstname']); 

 }


  if(isset($_POST['Lastname'])){

    $Last = $conn->escape_string($_POST['Lastname']); 
 	
 }

  if(isset($_POST['Address'])){

     $address = $conn->escape_string($_POST['Address']);

 }





  if(isset($_POST['City'])){

     $city = $conn->escape_string($_POST['City']);

 }

 if(isset($_POST['State'])){

 	 $state = $conn->escape_string($_POST['State']);
   
}


  if(isset($_POST['Zipcode'])){

      $zipCode = $conn->escape_string($_POST['Zipcode']);
 	
 }


  if(isset($_POST['Year'])){

      $year = $conn->escape_string($_POST['Year']);
 	
 }


if(isset($_POST['accountType'])){

      $account = $conn->escape_string($_POST['accountType']);
 	
 }

// check if passwords match 
if($password == $Password2){
$_SESSION["password_Miss_Match"] = "false";
   
   //  insert account 


     $query = 'SELECT * FROM user where username = "'.$username.'"';

     $result = $conn->query($query);

  
   if($result && $result->num_rows > 0){
				
				$_SESSION["UserExist"] = "true";

  echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~pearts1/DatabaseProject/signup.php')}, 5000);</script>");
  

}
           else{

           		   $_SESSION["UserExist"] = "false";

                 $query = 'SELECT * FROM user';
                
                 $result = $conn->query($query);

            if($account == "Student"){

              $res = "INSERT INTO user( username,password, Firstname, Lastname,Address,City,state,year,zipcode,roll)VALUES('".$username."','".password_hash($password,PASSWORD_DEFAULT)."',' ".$First."','".$Last."','".$address."','".$city."',' ".$state."','".$year."','".$zipCode."',' ".$account."')";
            } else{

               $res = "INSERT INTO user( username,password, Firstname, Lastname,Address,City,state,zipcode,roll)VALUES('".$username."','".password_hash($password,PASSWORD_DEFAULT)."',' ".$First."','".$Last."','".$address."','".$city."',' ".$state."','".$zipCode."',' ".$account."')";
            }


           		          	// var_dump(mysqli_query($dataBase, $res));

           		           if($conn->query($res)){
                                   
                                echo("User created Sucessfully"); 
echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~pearts1/DatabaseProject/')}, 5000);</script>");
  

           		           }else{

                                   echo("User created Unsucessfully"); 
                                  echo ($conn->error);
           		          }

}
                  
       
     }



else if($password != $Password2){
        session_unset();
     $_SESSION["password_Miss_Match"] = "true";
  
     echo ("<script> setTimeout(function(){ window.location.replace('http://cyan.csam.montclair.edu/~pearts1/DatabaseProject/signup.php')}, 1000);</script>");
  
  
}



 ?>


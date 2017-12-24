<?php
session_start();
$mysqli = new mysqli('localhost', 'root', '', 'market') or die("Unable to connect");

//echo "Connected sucessfully";

if ( !empty( $_POST['email']) and !empty($_POST['password']) ) {

    $email =  $mysqli->escape_string($_POST['email']);
    $password =  $_POST['password'];

    $result = $mysqli->query("SELECT * FROM members WHERE email='$email'");

    if( $result->num_rows == 0 ) {
      $_SESSION['message'] = "You dont have an acount";
    }
    else {
      $user = $result->fetch_assoc();
      $password = md5($password); 
      if( $password == $user['password'] ) {
          header("location: main.php");
      }
      else {
          $_SESSION['message'] = "Wrong Password";
      }
    }
}
else {
    $_SESSION['message'] = "Fill all parts please!";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title> Login Page</title>
<link rel="stylesheet" type="text/css" href="css/logo.css">
<script src="javaScript/log.js" defer ></script>
</style>
</head>
<body>
  <div class = "loginBox" >
   	    <img src="images/user3.png" class = "user" height="100" width="100">
		<h2> Log In Here  </h2>    
        <form method="post" action="log.php" autocomplete="of">
        	<div class = "alert"> <?= $_SESSION['message'] ?></div>
          <p>Email</p>
        	<input type="text" name="email" placeholder="Enter Email">
        	
        	<p>Password</p>
        	<input type="Password" name ="password" placeholder="Password">
        	
          <input type="submit" value="Sign In" >
        	<a href="reg.php" class = "left" > Don't have an account? CLICK HERE</a>
        </form>
   </div>

</body>
</html>
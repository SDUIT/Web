<?php
session_start();
$_SESSION['message'] = '';
// Create connection
$conn = new mysqli('localhost', 'root', '', 'market') or die("Unable to connect");

//echo($name);
if( isset( $_POST['register'] ) ) {
  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password2 = $_POST['password2'];
  
  if( !empty($name) and !empty($surname) and !empty($email) and !empty($password) and !empty($password2)  ) {      
	  // Check connection
	  if( $password == $password2 ) {
		//create user
		$password = md5($password);
		   
		$sql = "INSERT INTO members(first_Name, last_Name, email, password) VALUES ('$name', '$surname' , '$email' , '$password')";
		
		if( $conn->query($sql) === true ) {	
			$_SESSION['message'] = "You are nov logged in";
		    header("location: log.php");
		}
		else 
			$_SESSION['message'] = "someting went wrong";
	  }
	  else {
		$_SESSION['message'] = "The two passwords are not same";
	  }
  }
  else {
	  $_SESSION['message'] = "Fill all parts";
  }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title> Register Page</title>
  <link rel="stylesheet" type="text/css" href="css/reg.css">
</style>
</head>
<body>
   
   <div class = "loginBox">
   	<img src="images/user3.png" class = "user" height="100" width="100">
		<h2> Registration page  </h2>    
        <form method="post" action="reg.php">
        	<div class = "alert"> <?= $_SESSION['message'] ?></div>
          <p>Name</p>
          <input type="text" name="name" placeholder="Enter Name">
          <p>Surname</p>
          <input type="text" name="surname" placeholder="Enter Surname">
          <p>Email</p>
          <input type="text" name="email" placeholder="Enter Email">
          <p>Password</p>
          <input type="password" name="password" placeholder="Enter Password">
        	<p>Repeate Password</p>
        	<input type="Password" name="password2" placeholder="Password Repeate">
        	<input type="submit" name="register" value="Register" >
        </form>
   </div>

</body>
</html>
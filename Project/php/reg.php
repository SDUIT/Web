<?php

// Create connection
$conn = new mysqli("localhost", "root", "", "market");

if( isset( $POST['register_btn'] ) ) {
	$name = mysql_real_escape_string($_POST['name']);
	$surname = mysql_real_escape_string($_POST['surname']);
	$email = mysql_real_escape_string($_POST['email']);
	$password = mysql_real_escape_string($_POST['password']);
	$password2 = mysql_real_escape_string($_POST['password2']);

    echo($name);
	// Check connection
	if( $password == $password2 ) {
		//create user
		$password = md5($password);
	    $sql = "INSERT INTO memebers(first_name, last_name, email, password) VALUES ('$name', '$surname' , '$email' , '$password')";
	    mysql_query($conn, $sql);
	    $_SESSION['message'] = "You are nov logged in";
		$_SESSION['name'] = $name;
		header("location: home.php");
	}
	else {
		$_SESSION['message'] = "The two passwords are not same";
	}
}

?>
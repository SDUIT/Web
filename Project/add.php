<?php

session_start();
$_SESSION['message'] = '';
// Create connection
$conn = new mysqli('localhost', 'root', '', 'market') or die("Unable to connect");

//echo($name);
if( isset( $_POST['submit'] ) ) {

    $target_dir = "images/downloaded/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $title = $_POST['title'];
    $name = $_POST['name'];
    $img = '';
    $cost = $_POST['cost'];
    $about = $_POST['about'];
    $phone = $_POST['phone'];
    $user = $_POST['user'];
    $address = $_POST['address'];

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        $_SESSION['message'] = "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $_SESSION['message'] = "File is not an image.";
        $uploadOk = 0;
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        $_SESSION['message'] = "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        $_SESSION['message'] = "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        $_SESSION['message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $_SESSION['message'] = "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $_SESSION['message'] = "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
            $img = $target_file;
        } else {
            $_SESSION['message'] = "Sorry, there was an error uploading your file.";
        }
    }
    if( !empty($title) and !empty($name) and !empty($cost) and !empty($about) and !empty($img) and !empty($phone) and !empty($user) and !empty($address)  ) {
        // Check connection
        $sql = "INSERT INTO produts(title, name, cost, about, img, phone , user, address) VALUES ('$title', '$name' , '$cost' , '$about', '$img', '$phone', '$user', '$address')";
        if ($conn->query($sql) === true) {
            $_SESSION['message'] = "You are nov logged in";
            header("location: main.php");
        } else {
            $_SESSION['message'] = "someting went wrong";
        }
    }

}

else {
    $_SESSION['message'] = "Fill all parts";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title> Login Page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="HTML, CSS, XML, XHTML, JavaScript PHP">
	<link rel="stylesheet" type="text/css" href="css/add.css">
</style>
</head>
<body>
  <div class="container" >

	<header class="head">

		<div class="topMenu">

			<div class="topBorder">
				<img id="topB2" src="images/useful/olx.jpg" >
			</div>

		</div>

	</header>

    <div class="menu1">
		<form method="post" action="add.php" enctype="multipart/form-data" >
			<p> Заголовок * <input type="text" name = "title" size = "30" class = "tpt" placeholder="Search" > </p>
			<p>Рубрика *
				<select name = "name" size = "1" id = "sleep" class = "tpt" >
                    <option> <label>  </label> </option>
                    <option> <label> Electronics </label> </option>
                    <option> <label> House </label> </option>
					<option> <label> Fashion </label> </option>
					<option> <label> Transport </label> </option>
					<option> <label> Animal </label> </option>
					<option> <label> Children </label> </option>
					<option> <label> nothing </label> </option>
				</select>
			</p>
			<p> Цена * <input type = "text" name="cost" class = "tpt" > </p>
			<p> Описание <textarea cols = "60" name = "about" rows ="10" class = "tpt" > Write about you thing... </textarea> </p>
			<p> Фотографии * <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*">  </p>
			<p> Номер телефона * <input type = "text" name = "phone" class = "tpt" > </p>
			<p> Контактное лицо *  <input type = "text" name = "user" class = "tpt" >  </p>
			<p> Добавьте населенный пункт *  <input type = "text" name = "address" class = "tpt">  </p>
			<p><input type="image" src = "images/useful/ibutton.png" name="submit" value="Upload" ></input></p>
		</form>
    </div>

	</div>

</body>

</html>
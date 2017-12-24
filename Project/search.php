<!DOCTYPE html>
<html>
<head>
<title> Login Page</title>
<link rel="stylesheet" type="text/css" href="css/search.css">
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
    <section>

<?php

if( isset($_GET["data"]) )
{
      $name = "'".$_GET["data"]."'";
      session_start();
      $_SESSION['message'] = '';
      // Create connection
      $conn = new mysqli('localhost', 'root', '', 'market') or die("Unable to connect");

      $result = mysqli_query($conn, "SELECT * FROM produts WHERE name = $name");
      while($row = mysqli_fetch_array($result)) {

            echo '<div class="card">';
            echo '<a href = "./info.php?data='.$row['id'].'"> <img src="'.$row['img'].'"/> </a>';
            echo '<section class="info">';
            echo '<a href="./info.php?data='.$row['id'].' ">'.$row['title'].'</a>';
            echo '<div class="title">'.$row['about'].'</div>';
            echo '<div class="price">'.$row['cost'].'ТГ. </div>';
            echo '<div class="address">'.$row['address'].'</div>';
            echo '</section>';
            echo '</div>';
      }
}

?>
    <section>

</body>
</html>
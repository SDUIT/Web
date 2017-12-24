<!DOCTYPE html>
<html>
<head>
	<title> Login Page</title>
<link rel="stylesheet" type="text/css" href="css/info.css">
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

 <?php

    if( isset($_GET["data"]) )
    {
          $id = "'".$_GET["data"]."'";
          session_start();
          $_SESSION['message'] = '';
          // Create connection
          $conn = new mysqli('localhost', 'root', '', 'market') or die("Unable to connect");

          $result = mysqli_query($conn, "SELECT * FROM produts WHERE id = $id");
          if( $result ) {
              $row = mysqli_fetch_array($result);

              echo '<div class = "menu" >';
              echo '<div class = "menuleft">';
              echo '<img src="'.$row['img'].'" class = "GlavniImage">';
              echo '<div class = "title"> <h1> '.$row['title'].' </h1> </div>';
              echo '<div class = "address"> <h5>Address :  '.$row['address'].' </h5> </div>';
              echo '<div class = "about"> '.$row['about'].' </div>';
              echo '</div>';
              echo '<div class = "menuright">';
              echo '<div class = "cost" >  '.$row['cost'].' ТГ. </div>';
              echo '<div class = "phone">  '.$row['phone'].'  </div>';
              echo '<div class = "user">  '.$row['user'].'  </div>';
              echo '</div>';
              echo '</div>';
          }
    }

?>
</div>

</body>
</html>
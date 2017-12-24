<!DOCTYPE html>
<html>
<head>

	<title>Main</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="HTML, CSS, XML, XHTML, JavaScript">
    <link href="css/main.css" type="text/css" rel="stylesheet" >   

</head>
<body>

<div class="container" >
	
	<header class="head">
		
    <div class="topMenu">
        <div class="topBorder">
            <img id="topB2" src="images/useful/olx.jpg" >
            <a href="add.php">
              <img id="topB1" src="images/useful/obyavlenie.jpg" >
            </a>
            <div class="logUser"> 
                <a href="log.php">
                <img id="logU" src="images/useful/user.jpg">
                </a>
                <div class="user"><a href="log.php">Мой профиль</a></div>
               
            </div>
           
        </div>		    
		</div>
    
    <nav id="glavniMenu"> 
		  
      <div class="glavniSearch"> 

         <input type="search" name="" 
                placeholder="Search" class="tovarSearch">

         <input type="search" name="" 
                placeholder="Address" class="AddresSearch"   >
         <button class="goToSearch"> Search </button>
      
      </div>
      
      <div class="glavniLinks">

        <div class="card">
           <img id="cardImage" src="images/menu/handshake.jpg">
           <div class="cardTopic"> <a href="search.php"> Услуги </a> </div>
        </div>
        
        <div class="card">
           <img id="cardImage" src="images/menu/electronika.jpg">
           <div class="cardTopic"> <a href="search.php?data=Electronics"> Елекртоника</a> </div>
        
        </div><div class="card">
           <img id="cardImage" src="images/menu/home.jpg">
           <div class="cardTopic"> <a href="search.php?data=House"> Дом и Сад </a></div>
        
        </div><div class="card">
           <img id="cardImage" src="images/menu/clothes.jpg">
           <div class="cardTopic"> <a href="search.php?data=Fashion"> Мода и Стил</a> </div>
        
        </div><div class="card">
           <img id="cardImage" src="images/menu/car.jpg">
           <div class="cardTopic"> <a href="search.php?data=Transport"> Транспорт </a></div>
        
        </div><div class="card">
           <img id="cardImage" src="images/menu/animal.jpg">
           <div class="cardTopic"> <a href="search.php?data=Animal"> Животние </a></div>
        
        </div><div class="card">
           <img id="cardImage" src="images/menu/child.jpg">
           <div class="cardTopic"> <a href="search.php?data=Children"> Детский Мир </a></div>
        
        </div><div class="card">
           <img id="cardImage" src="images/menu/priz.jpg">
           <div class="cardTopic"> <a href="search.php?data=nothing"> Отдам даром </a></div>

        </div><div class="card">
           <img id="cardImage" src="images/menu/child.jpg">
           <div class="cardTopic"> <a href="search.php?data=Children"> Детский Мир </a></div>
        
        </div><div class="card">
           <img id="cardImage" src="images/menu/priz.jpg">
           <div class="cardTopic"> <a href="search.php?data=nothing"> Отдам даром </a></div>
        
        </div>
      
      </div>

    </nav>

	</header>
  
  <section class="body">
      <?php
          session_start();
          $_SESSION['message'] = '';
          // Create connection
          $conn = new mysqli('localhost', 'root', '', 'market') or die("Unable to connect");

          $result = mysqli_query($conn, "SELECT * FROM produts");
          while($row = mysqli_fetch_array($result))
          {
              echo '<div class="zakaz" >';
              echo '<a href = "./info.php?data='.$row['id'].' "> <img class ="zakazImage" src="'.$row['img'].'" > </a>';
              echo '<div class="title">'.$row['title'].'</div>';
              echo '<div class="price">'.$row['cost'].' ТГ </div>';
              echo '<a href="info.php"><img class="icon" src="images/useful/star.png"/></a>';
              echo '</div>';
          }

      ?>

  </section> 

	<footer>
		Created by Zoirdzhon kabirov
	</footer>
	
</div>

</body>
</html>>
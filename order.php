<!DOCTYPE html>
<html lang="en">
<?php
// Get the current session ID and start a session
  if (isset($_GET ['session_id'])){
    session_id($_GET ['session_id']);
  }
  session_start();
  //hide Errors
  ini_set('display_errors',0);
  include('errorHandler.php');

  
    // Retrieve all items for the menu
    try{
      // Include the db connection
      include_once("db.php");
      // Run a query
      $result = mysqli_query($conn, "SELECT * FROM item");
      $dataArray = ($result->fetch_all(MYSQLI_ASSOC));

    }
    // catch any exceptions
    catch (Exception $e){
      echo '<p class="errorText">Sorry, an error has occurred!</p>';
      
    }
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Import style sheets -->
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="styles/order.css">
  <link rel="stylesheet" href="styles/back.css">

  <!-- Handles cart cookies -->
  <script type="text/javascript" src="cookieHandler.js"></script>
  <!-- Handles cart item counter text -->
  <script type="text/javascript">
    function update(count) {
      document.getElementById('cart_counter').innerText = count;
    }
  </script>


  <title>Elliot's - Order</title>
</head>

<!-- call func in cookieHandler on load -->

<body onload="getLen();">


  <!-- Include Components -->
  <?php
      // What page the back button should direct to
      $page = "index.php";
      // Back Button
      include_once('backButton.php');
      // Overlays
      include_once('overLays.php');
    ?>

  <!-- Decorative Triangles -->
  <div style="pointer-events:none;position:absolute;overflow:hidden;min-height:100%;height:100vh;width:100%">
    <div id="tri-parent">
      <div class="tri"><img class="Grunge" id="hero" src="images/mug3.png"></div>
    </div>
  </div>



  <!-- Floating cart bubble -->
  <a id="cart" href="cart.php">
    <img src="images/cart.png" class="Grunge" width="100%">
    <h2 id="cart_counter"> </h2>
  </a>

  <!-- Page title header -->
  <h1 class="Grunge">Order</h1>

  <!-- Menu grid that displays dynamic items -->
  <div id="menuGrid">
    <?php
          // loop through data array
          foreach($dataArray as $data){

              // store name,steps ect...
              $name         = $data['name'];
              $id           = $data['ID'];
              $description  = str_replace("\n","<br>",$data['description']);
              $image        = $data['image_Path'];
              $send         = json_encode($data);
              
          // use the data for any purpose, here its a menu menuItem
          echo'
          <div id="'. $id .'" class="menuItem">
            <div class="image" style="background-image: url(\''. $image .'\');"></div>
            <div class="item-info">
              <h2 class="Grunge" id="name" >'. $name .'</h2>
              <p class="Grunge" >'. $description .'</p>
              <a  class="subtle" onclick="addItem('. $id .')">
                  <h2 class="Grunge" >Add</h2>
                </a>
            </div>
          </div>';
          }
      ?>
  </div>
</body>

</html>
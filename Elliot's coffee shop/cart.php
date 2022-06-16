<?php
// Get the current session ID and start a session
if (isset($_GET ['session_id'])){
  session_id($_GET ['session_id']);
}
session_start();
//hide Errors
ini_set('display_errors',0);
include('errorHandler.php');
// Empty vars used later
$dataArray;
$total=0;
$cart = "";

// Get cart array (of ids) and query the DB for full item info
try{
  // Include the db connection
  include_once("db.php");
  // check if the cart cookie is not set
  if(!isset($_COOKIE['cart_array'])){
    // create an empty array to avoid throwing errors
    setcookie('cart_array',json_encode(array()), false, "/",false);
    $cart_array = array();
  }else{ 
    // get the data from the cookie and store as array     
    $cart_array = json_decode($_COOKIE['cart_array']);
  }
  // create a new empty array to store the full cart data
  $return_cart=array();

  // loop through each item id and get the full data
  foreach($cart_array as $i){
    $result = mysqli_query($conn, "SELECT * FROM item WHERE ID=".$i."");
    // add the returned data to the end of the cart list
    array_push($return_cart,$result->fetch_assoc());
  }
// catch any exceptions
}catch (Exception $e){
  echo '<p class="errorText">Sorry, an error has occurred!</p>';
  echo $e; 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="styles/cart.css">
  <link rel="stylesheet" href="styles/back.css">
  <script type="text/javascript" src="cookieHandler.js"></script>
  <title>Elliot's - Cart</title>
</head>

<body>
  <!-- Include Components -->
  <?php
    // What page the back button should direct to
    $page = "index.php";
    // Back Button
    include_once('backButton.php');
    // Overlays
    include_once('overLays.php');
  ?>
  <!-- decorative triangles -->
  <div style="pointer-events:none;position:absolute;overflow:hidden;min-height:100%;height:100vh;width:100%">
    <div id="tri-parent">
      <div class="tri"><img class="Grunge" id="hero" src="images/mug3.png"></div>
    </div>
  </div>
  <!-- Title -->
  <h1 class="Grunge">Cart</h1>
  <?php
      // 
      // Process the array menu data
      // Display each array item as a menu item
      // 

      // check if there are items in the cart
      if(sizeof($return_cart) > 0){
        // create an empty menu string to be echoed later. All items will be appended to this
        $cart = '<div id="menuGrid" style="font-size: 1rem; font-family:\'Courier New\', Courier, monospace;letter-spacing:normal">';
      // loop through data array
      foreach($return_cart as $data){
          // store name,steps ect...
          $name = $data['name'];
          $id = $data['ID'];
          $price = $data['price'];
          $total = floatval($total) + floatval($price);
          $image = $data['image_Path'];
          $send = json_encode($data);
      // Use the above data to build a menu item and append it to the menu string
      $cart = $cart.'
      <div id="'.$id.'" class="menuItem">
        <div class="image" style="background-image: url(\''.$image.'\');"></div>
        <div class="item-info">
          <h2 class="Grunge" id="name">'. $name .'</h2>
          <h2 class="Grunge" id="priceLine">Price:<p id="price">$'.$price.'</p></h2>
          <form method="POST"onClick="removeItem('.$id.')" action="cart.php"><button>
              <h2 class="Grunge" >Remove</h2>
            </button></form>
        </div>
      </div>';
      }
      // append "continue shopping" button and closing tags to the menu string
      $cart = $cart . '
        </div>
        <form action="order.php" style=" margin-right:auto; margin-left:auto; text-align:center;margin-top:40vh;width:100%">
          <button style="width:min-content;padding:1rem 2rem; margin-top:3rem;margin-bottom:20vh;">
            <h2 class="Grunge">Continue Shopping</h2>
          </button> 
        </form>';


      // display an order summary
      echo'
        <form method="POST" action="confirmed.php" id="summary">
          <h2 class="Grunge">Order Summary</h2>

          <div class="Grunge" id="infoRow" >
            <h2>Items:</h2>
            <h2 id="rightData">'.sizeof($return_cart).'</h2>
          </div>


          <div class="Grunge" id="infoRow">
            <h2>Total:</h2>
            <h1 id="rightData">$'.$total.'</h1>
          </div>
          
          <button style="width:100%;padding:1rem 2rem">
            <h2 class="Grunge">Purchase</h2>
          </button>
        </form> ';
      }

      // If there are no items in the cart, alert the user
      else{
        $cart ='
        <form action="order.php" style="text-align:center; margin-top:40vh" >
          <h2 class="Grunge">Opps! Your cart is empty</h2>
          <button style="width:min-content;padding:1rem 2rem; margin-top:3rem;margin-bottom:20vh;"><h2 class="Grunge">Start Shopping</h2></button>
        </form>';
      }
      
      // Echo the built out page content
      echo $cart;
      ?>
</body>

</html>
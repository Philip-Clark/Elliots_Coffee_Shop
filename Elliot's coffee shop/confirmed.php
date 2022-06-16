<?php
if (isset($_GET ['session_id'])){
  session_id($_GET ['session_id']);
}
session_start();
setcookie('cart_array', "");

?>




<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="styles/thanks.css">
  <link rel="stylesheet" href="styles/back.css">


  <title>Elliot's - Thanks</title>
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



  <div style="pointer-events:none;position:absolute;overflow:hidden;min-height:100%;height:100vh;width:100%">
    <div id="tri-parent">
    </div>
  </div>



  <div style="display:flex;flex-direction:column;align-items:center">
    <h1 class="Grunge">Thanks</h1>
    <p>Your Order has been placed</p>
    <a href="index.php">Home</a>
  </div>






</body>

</html>
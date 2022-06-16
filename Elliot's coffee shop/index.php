<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="styles/index.css">
  <title>Elliot's - Home</title>
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
  <!-- Decorative triangles -->
  <div style="position:absolute;overflow:hidden;min-height:100%;height:100vh;width:100%">
    <div class="tri">
      <div class="tri-yellow"></div>
    </div>
    <div class="tri">
      <div class="tri-yellow"></div>
    </div>
  </div>

  <!-- Title & subtitle -->
  <h1 class="Grunge">EllioTs</h1>
  <h2 class="Grunge">coffee</h2>

  <!-- non-mobile Hero image -->
  <img class="Grunge" id="hero" src="images/mug.png">

  <!-- nav buttons -->
  <a class="Grunge" id="ord" href="./order.php">order</a>
  <a class="Grunge" id="loc" href="./locations.php">locations</a>
  <a class="Grunge" id="abt" href="./about.php">about us</a>


  <!-- Left hand quote list -->
  <ul class="quote" id="leftList">
    <li>" I Love It" <br>-Jason G</li>
    <li>"No other coffee even competes!"<br>-James W</li>
    <li>"Highly recommend to anyone in the area"<br>-Steve M</li>
  </ul>
  <!-- Right hand quote list -->
  <ul class="quote" id="rightList">
    <li>"Best local coffee"<br>-Becky H</li>
    <li>"Favorite spot to hangout with friends"<br>-Jacob T</li>
    <li>"I love their carmel blast latte"<br>-Leah S</li>
  </ul>

  </div>
</body>

</html>
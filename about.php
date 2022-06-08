<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="styles/about.css">
  <link rel="stylesheet" href="styles/back.css">
  <title>Elliot's - About</title>
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
    // Triangles
    include_once('triangles.php');
  ?>
  <!-- Main hand about section -->
  <section id="about">
    <h1 id="title" class="Grunge">EllioTs</h1>
    <h2 id="subtitle" class="Grunge">premium coffee</h2>
    <p>Started as a side hustle to make ends meet, Elliot's has earned its spot in the local coffee community. In
      1987
      John Elliot was struggling to pay the bills, so he took his passion for coffee and started a shop in a small
      room
      on 3rd street. From that room grew one of the most recognized coffee brands in the LA area.</p>
  </section>
  <!-- divider for mobile -->
  <div id="Abt-divide"></div>
  <!-- Image of John Elliot -->
  <img id="profile" src="images/Elliot.jpg" alt="Image of John Elliot smiling">
  <!-- divider for mobile -->
  <div id="prsnl-divide-t"></div>
  <!-- Section detailing Elliot's personality ect. -->
  <section id="prsnl">
    <h2>JOHN Elliot</h2>
    <p>Trained as an artist in LA, John brings his artistic side to everything he touches.
      <br><br>John loves nature and classic cars, but most of all he loves his coffee.
      <br><br>He has been happily married to his wife Jen for 40 years and they have three grown children.</p>
  </section>
  <!-- divider for mobile -->
  <div id="prsnl-divide-b"></div>
  <!-- Contact section -->
  <section id="contact">
    <p id="phone">(000)-000-0000</p>
    <a id="email" href='Mailto:Pclark0079@kctcs.edu?subject=Web Contact&body=Mr. Elliot,'>contact@elliots.com</a>
  </section>
  <!-- Visual interest -->
  <h3>drink coffee!</h3>
  <img class="Grunge" id="hero" src="images/mug2.png">

</body>

</html>
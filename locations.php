<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="styles/locations.css">
  <link rel="stylesheet" href="styles/back.css">
  <title>Elliot's - Locations</title>
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
  <div style="pointer-events:none;position:absolute;overflow:hidden;min-height:100%;height:100vh;width:100%">
    <div id="tri-parent">
      <div class="tri">
        <!-- non-mobile hero image -->
        <img class="Grunge" id="hero" src="images/mug3.png">
      </div>
    </div>
  </div>

  <!-- title -->
  <h1 class="Grunge">Locations</h1>

  <!-- Locations List -->
  <ul>
    <!-- Location instance -->
    <li class="location" id="LA">
      <div>
        <h2>Elliot's of los ANgeles</h2>
        <p>
          300 Pico Blvd
          <br>
          Santa Monica, CA 90405
          <br>
          (000)-000-0000
        </p>
        <!-- Google map of location -->
        <div id="map"> <iframe
            src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d670.6346120756773!2d-118.48800578026783!3d34.00884882322118!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1648663598355!5m2!1sen!2sus"
            width="100%" height="100%" style="border: none;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe></div>
      </div>
      <!-- Images of location -->
      <div id="imageFlex">
        <div class="shopImg" style="background-image: url('images/shop/img(1).jpg')"></div>
        <div class="shopImg" style="background-image: url('images/shop/img(2).jpg')"></div>
        <div class="shopImg" style="background-image: url('images/shop/img(4).jpg')"></div>
      </div>
    </li>

    <!-- Location instance -->
    <li class="location" id="other">
      <div>
        <h2>Elliot's of CSUN</h2>
        <p>
          18111 Nordhoff St
          <br>
          NorthRidge, CA 91330
          <br>
          (000)-000-0000
        </p>
        <!-- Google map of location -->
        <div id="map"><iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1864.5458508979812!2d-118.52407688220657!3d34.23982320438646!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c29a5703397303%3A0x49f1a7c4cf6c5ea0!2sStudent%20Recreation%20Center!5e0!3m2!1sen!2sus!4v1648663697079!5m2!1sen!2sus"
            width="100%" height="100%" style="border: none;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe></div>
      </div>
      <!-- images of location -->
      <div id="imageFlex">
        <div class="shopImg" style="background-image: url('images/shop/img(5).jpg')"></div>
        <div class="shopImg" style="background-image: url('images/shop/img(6).jpg')"></div>
        <div class="shopImg" style="background-image: url('images/shop/img(7).jpg')"></div>
      </div>
    </li>

    <!-- Location instance -->
    <li class="location" id="other">
      <div>
        <h2>Elliot's of HuNtiNgtoN Beach</h2>
        <p>
          538 Main St
          <br>
          Huntington Beach, CA 92648
          <br>
          (000)-000-0000
        </p>
        <!-- Google map of location -->
        <div id="map"> <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d415.0995891721986!2d-117.9988676!3d33.6624289!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80dd2146dd99ed0d%3A0x6510e9d36959061!2s538%20Main%20St%2C%20Huntington%20Beach%2C%20CA%2092648!5e0!3m2!1sen!2sus!4v1648663905697!5m2!1sen!2sus"
            width="100%" height="100%" style="border: none;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
          </iframe></div>
      </div>
      <!-- images of location -->

      <div id="imageFlex">
        <div class="shopImg" style="background-image: url('images/shop/img(11).jpg')"></div>
        <div class="shopImg" style="background-image: url('images/shop/img(9).jpg')"></div>
        <div class="shopImg" style="background-image: url('images/shop/img(10).jpg')"></div>
      </div>
    </li>

  </ul>

</body>

</html>
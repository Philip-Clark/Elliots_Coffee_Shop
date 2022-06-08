<!DOCTYPE html>
<html lang="en">
<?php
// Get the current session ID and start a session
if (isset($_GET ['session_id'])){
  session_id($_GET ['session_id']);
}
session_start();
// Empty vars used later
$name ="";
$pass ="";

// Get all items on menu
try{
  // Include the db connection
  include_once("db.php");
  // check if logged in
  if(isset($_SESSION['loggedIn'])){
    // check if an action is being performed
      if(isset($_POST['action'])){

        // DELETE
        if($_POST['action'] == 'delete'){
          // run an DELETE query with the given ID
          $conn->query("DELETE FROM item WHERE ID=".(int)$_POST['id']);
        }

        // UPDATE
        if($_POST['action'] == 'update'){
          // will hold an image path
          $img = "";
          // get the image uploaded
          $image=$_FILES['image'.$_POST['id']]['name']; 
          $imageArr=explode('.',$image); //first index is file name and second index file type
          // store the image and the image path
          if(isset($imageArr[1])){
            $newImageName=$imageArr[0].'.'.$imageArr[1];
            $uploadPath="images/items/".$newImageName;
            $isUploaded=move_uploaded_file($_FILES['image'.$_POST['id']]["tmp_name"],$uploadPath);
            $d=$uploadPath;
            $img = ",`image_Path`='$d'";
          }
          // get values from POST
          $a = $_POST['item_name'];
          $b=$_POST['description'];
          $c=$_POST['price'];
          // run an UPDATE query with the above data
          $sql=("UPDATE `item` SET `name`='$a',`description`='$b',`price`='$c' $img WHERE ID=".(int)$_POST["id"]);
          $result = mysqli_query($conn, $sql);
        }
    
        // ADD
        if($_POST['action'] == 'add'){
          // get the image uploaded store it and get the stored location
          $image=$_FILES['image']['name']; 
          $imageArr=explode('.',$image); //first index is file name and second index file type
          $newImageName=$imageArr[0].'.'.$imageArr[1];
          $uploadPath="images/items/".$newImageName;
          $isUploaded=move_uploaded_file($_FILES["image"]["tmp_name"],$uploadPath);
          // get values from POST
          $a = $_POST['item_name'];
          $b=$_POST['description'];
          $c=$_POST['price'];
          $d=$uploadPath;
          // run an INSERT query with the above data
          $sql = "INSERT INTO item (`name`, `description`,`price`,`image_Path`) VALUES ('$a','$b','$c','$d') ";
          $result = mysqli_query($conn, $sql);
        }
      }
    }
    // If not logged in check if credentials where passed
    else{
      // grab the name
      if(isset($_REQUEST['name'])){
        $name = $_REQUEST['name'];
      }
      // grab the password
      if(isset($_REQUEST['password'])){
        $pass = $_REQUEST['password'];
      }

      // select the first credential item
      $sql = "SELECT * FROM credentials LIMIT 1";
      $result = mysqli_query($conn, $sql);
      // check if something was returned
      if(isset($result)){
        $data = $result->fetch_assoc();
        // check the passed name and password to the stored ones
        // if they match, set logged in to true
        if($data['name'] === $name and $data['password'] === md5($pass)){
          $_SESSION['loggedIn'] = true;
        }
        // if not, redirect to admin login page
        else{
          header("Location:admin.php");
          $_SESSION['name'] = $name;
          $_SESSION['password'] = $pass;
        }
    }
  }
    // get all the items on the menu
    $result = mysqli_query($conn, "SELECT * FROM item");
    $dataArray = ($result->fetch_all(MYSQLI_ASSOC));

  // catch errors
  }catch (Exception $e){
    echo '<p class="errorText">Sorry, an error has occurred!</p>';
  } 
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="styles/adminMenu.css">
  <link rel="stylesheet" href="styles/back.css">
  <!-- script to load image previews -->
  <script>
    var loadFile = function (event, id = "") {
      var image = document.getElementById('output' + id);
      image.style.backgroundImage = "url(" + URL.createObjectURL(event.target.files[0]) + ")";
    };
  </script>
  <title>Elliot's - Admin</title>
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
  <!-- Page specific triangle styling -->
  <div style="pointer-events:none;position:absolute;overflow:hidden;min-height:100%;height:100vh;width:100%">
    <div id="tri-parent">
    </div>
  </div>
  <!-- Title -->
  <h1 class="Grunge">Edit Menu</h1>
  <!-- Grid of menu items -->
  <div id="menuGrid" style="font-size: 1rem; font-family:'Courier New', Courier, monospace;letter-spacing:normal">
    <?php
      // 
      // Get all the menu items
      // Create a form for each item with the item data as place holders
      // This allows for easy and intuitive item updates
      // 

      // loop through data array
      foreach($dataArray as $data){
          // store name,steps ect...
          $name = $data['name'];
          $id = $data['ID'];
          $steps = $data['description'];
          $image = $data['image_Path'];
          $price = $data['price'];
          $send = json_encode($data);
      // use the above data to build a form for each item
      echo'
      <div id="'.$id.'" class="menuItem">
        <form method="POST" action="adminMenu.php" enctype="multipart/form-data">

          <label class="customUpload image" for="image'.$id.'" id="output'.$id.'"
            style="background-image:url('.$image.');">
          </label>

          <input type="file" name="image'.$id.'" id="image'.$id.'" onchange="loadFile(event,'.$id.')">

          <div class="item-info">
            <input class="Grunge" value="'. $name .'" name="item_name">
            <textarea class="Grunge" name="description">'.$steps.'</textarea>
            <input type="number" class="Grunge" value="'. $price .'"step="0.01" min="0.00" max="999.99" name="price">
            <input value="'.$id.'" name="id" type="hidden">

            <div  style="display:flex; flex-direction:row; width:100%">
              <button class="rowButton" name="action" value="update">
                <h2 class="Grunge">change</h2>
              </button>

              <button class="rowButton" name="action" value="delete">
                <h2 class="Grunge">remove</h2>
              </button>
            </div>
          </div>
        </form>
      </div>';
    }
    ?>
  </div>
  <!-- Add New Item section -->
  <h1>Add Item</h1>

  <div class="menuItem" id="addItem">
    <!-- Form to add item -->
    <form method="POST" action="adminMenu.php" enctype="multipart/form-data">
      <!-- Override the default file picker -->
      <label class="customUpload image" for="image" id="output" style="background-image:url('images/upload.png');">
      </label>
      <input type="file" name="image" id="image" onchange="loadFile(event,)" required>
      <!-- Name, Description, and price -->
      <div class="item-info">
        <input class="Grunge" placeholder="Name" name="item_name" required>
        <textarea class="Grunge" name="description" required>Description</textarea>
        <input type="number" lass="Grunge" placeholder="0.00" step="0.01" min="0.00" max="999.99" name="price" required>
        <!-- Add Button -->
        <button name="action" value="add">
          <h2 class="Grunge">Add</h2>
        </button>
      </div>
    </form>
  </div>
</body>

</html>
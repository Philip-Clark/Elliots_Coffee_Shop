<!DOCTYPE html>
<?php
//Credentials to login : 
// USER: Admin-Elliot 
// PASSWORD: AdminPassword
  
// Get the current session ID and start a session
    include("db.php");
    if (isset($_GET ['session_id'])){
      session_id($_GET ['session_id']);
    }
    session_start();
  
    
    // Overlays
    include_once('overLays.php');

    // hold sticky form data later
    $pass = "";
    $name = "";
    $message = "";
      
    // grab session name val
    if(isset($_SESSION['name'])){
      $name = $_SESSION['name'];
    }
    // grab session password val
    if(isset($_SESSION['password'])){
      $pass = $_SESSION['password'];
    }
    // validate that name and pass are set
    if($name > 0 && $pass > 0){
      $name_class = "";
      $pass_class = "";
      $message = "Username or password incorrect";
    }
    else{
      if($name < 1){$name_class = "error";}
      if($pass < 1){ $pass_class = "error";}

    } 
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Login</title>
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="styles/adminLogin.css">
</head>

<body>
  <div id="formArea">
    <h1>Admin Login</h1>
    <h3 style="font-size: 2rem;color: #ff475d;letter-spacing:0.2rem"><?php echo $message ?></h3>
    <form action="adminMenu.php" method="POST">
      <label class="<?php echo $name_class; ?>">Name</label>
      <input type="name" name="name" value="<?php echo $name; ?>" required>
      <label class="<?php echo $pass_class; ?>">Password</label>
      <input type="password" name="password" value="<?php echo $pass; ?>" required>
      <button>Login</button>
    </form>
  </div>
</body>

</html>
<?php
ob_start();
session_start();
if (isset($_SESSION['email']) && isset($_SESSION['pass'])) {
  ?>
  <?php
  if (isset($_POST['submit'])) {
    echo 'Hello';
    session_destroy();
    header("Location: login.php");
  } 
  if(isset($_GET['submit'])){
    header('Location: edit.php');
  }
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="./css/profile.css">
  </head>
  <body>
    <div class="profile">
      <div class="profile-img">
        <img src="./images/user.jpg" alt="">
      </div>
      <div class='row'>
        <div class='row-1'>
          <h5>First Name</h5>
          <h5>Last Name</h5>
          <h5>Email Address</h5>
        </div>
        <div class="row-2">
          <h5><?php echo $_SESSION['first']?></h5>
          <h5><?php echo $_SESSION['last']?></h5>
          <h5><?php echo $_SESSION['email']?></h5>
        </div>
      </div>
      <form class='logout' action="" method="POST">
        <input type="submit" value="Logout" name='submit'>
      </form>
    </div>


  </body>
</html>
  <?php
} else {
  header("Location: login.php");
}
?>
<?php ob_end_flush(); ?>
<?php
ob_start();
session_start();
include('./database/db.php');
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="./css/login.css">
</head>

<body>
  <div class="main">
    <div id='log-text' class="text">
      <p>
        Login
      </p>
    </div>
    <?php
    ?>
    <a onclick=''></a>
    <form class='login' action="" method="POST">
      <div class="login-email">
        <input id="login-email" placeholder="Email Address" type="email" name="email">
      </div>
      <div class="login-pass">
        <input id="login-pass" placeholder="Password" type="password" name="pass">
        <?php
        if (isset($_POST['submit'])) {
          $email = $_POST['email'];
          $pass = $_POST['pass'];
          $sql = "SELECT * FROM `loginData` where Email = '$email' and Password = '$pass'";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['first'] = $row['First Name'];
            $_SESSION['last'] = $row['Last Name'];
            $_SESSION['email'] = $row['Email'];
            $_SESSION['pass'] = $row['Password'];
            echo 'Logged';
            header('Location: profile.php');
          } else {
            echo '<span>Your Email or Password wrong</span>';
            
            ?>
            <script>
              document.querySelector('.login-email input').classList.add("wrong")
              document.querySelector('.login-pass input').classList.add("wrong")
              document.querySelector('.login-pass span').classList.add("wrong")
            </script>
            <?php
          }
        }
        ?>
      </div>
      <button class='login-btn' id="login-submit" name='submit' type="submit">
        <h5>Login</h5>
      </button>
      <div class="bottom">
        <a href="">Forget The Password?</a>
        <a href='./sign-in.php'>haven't account? Create Account</a>
      </div>

    </form>
  </div>
</body>
</html>
<?php ob_end_flush(); ?>
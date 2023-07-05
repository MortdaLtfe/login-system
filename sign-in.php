<?php
ob_start();
session_start();
include('./database/db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="./css/sign-in.css">
  <title>sign-in</title>
</head>
<body>
  <a href='./login.php' class='top'>Log-in</a>
  <img class='one' src="./images/bg-intro-desktop.png" alt=''>
  <img class="two" src="./images/bg-intro-mobile.png" alt=''>
  <div class="main">
    <div class="text">
      <p>
        <span>Try it free 7 days </span>then $20/mo. thereafter
      </p>
    </div>
    <?php
    unset($error)
    ?>
    <form class='sign-in' action="" method="POST">
      <div class="sign-first">
        <input id="sign-first" value='<?php if (isset($_POST['first'])) { $first = $_POST['first']; echo "$first"; } ?>' placeholder="First Name" type="text" name='first'>
        <?php
        if (isset($_POST['submit'])) {
          if (empty($_POST['first'])) {
            $error[] = "Empty First";
            echo '<span>First Name Cannot be empty</span>';
            ?>
            <script>
              document.querySelector('.sign-first input').classList.add("wrong")
              document.querySelector('.sign-first span').classList.add("wrong")
            </script>

            <?php
          }
        }
        ?>
      </div>
      <div class="sign-last">
        <input id="sign-last" value='<?php if (isset($_POST['last'])) { $last = $_POST['last']; echo $last; } ?>' placeholder="Last Name" type="text" name='last'>
        <?php
        if (isset($_POST['submit'])) {
          if (empty($_POST['last'])) {
            $error[] = "Empty Last";
            echo '<span>Last Name Cannot be empty</span>';
            ?>
            <script>
              document.querySelector('.sign-last input').classList.add("wrong")
              document.querySelector('.sign-last span').classList.add("wrong")
            </script>

            <?php
          }
        }
        ?>
      </div>
      <div class="sign-email">
        <input id="sign-email" value='<?php if (isset($_POST['email'])) { $email = $_POST['email']; echo "$email"; } ?>' placeholder="Email Address" type="text" name='email'>
        <?php
        if (isset($_POST['submit'])) {
          $email = trim($_POST['email']);
          $sql = "SELECT * FROM loginData WHERE email = '$email'";
          $result = mysqli_query($conn, $sql);
          if (empty($email)) {
            $error[] = 'empty email';
            echo '<span>Email is Required</span>';
            ?>
            <script>
              document.querySelector('.sign-email input').classList.add("wrong")
              document.querySelector('.sign-email span').classList.add("wrong")
            </script>

            <?php
          } elseif (mysqli_num_rows($result) === 1) {
            $error[] = 'used an email';
            echo '<span>Email Alrady exit</span>';
            ?>
            <script>
              document.querySelector('.sign-email input').classList.add("wrong")
              document.querySelector('.sign-email span').classList.add("wrong")
            </script>

            <?php
          }
        }
        ?>
      </div>
      <div class="sign-pass">
        <input id="sign-pass" placeholder="Password" type="password" name='pass'>
        <?php
        if (isset($_POST['submit'])) {
          if (empty(trim($_POST['pass']))) {
            $error[] = "Empty pass";
            echo '<span>Password is Required</span>';
            ?>
            <script>
              document.querySelector('.sign-pass input').classList.add("wrong")
              document.querySelector('.sign-pass span').classList.add("wrong")
            </script>
            <?php
          } elseif (strlen(trim($_POST['pass'])) < 6) {
            $error[] = 'short pass';
            echo '<span>Password long should be more than 5</span>';
            ?> <script>
              document.querySelector('.sign-pass input').classList.add("wrong")
              document.querySelector('.sign-pass span').classList.add("wrong")
            </script>
            <?php
          }
        }
        ?>
      </div>
      <input id="sign-submit" name='submit' type="submit" value="Claim your free trial">
      <p>
        By clicking the button, you are agreeing to our <span>Terms and Services</span>
      </p>
    </form>
    <?php
    if (isset($_POST['submit'])) {
      if (empty($error)) {
        $_SESSION['first'] = $_POST['first'];
        $_SESSION['last'] = $_POST['last'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['pass'] = $_POST['pass'];
        $first = $_POST['first'];
        $last = $_POST['last'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $q = "INSERT INTO loginData VALUES('$first','$last','$email','$pass')";
        $sql = mysqli_query($conn, $q);
        header("Location: profile.php");
      }
    }
    ?>
  </div>
  <?php
  ?>
</body>
</html>
<?php ob_end_flush();
<?php

session_start();
if(isset($_SESSION["email"])) {
    session_destroy();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $host = "localhost";
    $dbusername = "id20679722_root";
    $dbpassword = "Asmi#001";
    $dbname = "id20679722_pathfinder";

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $email = $_POST['email'];
    $enteredPwd = $_POST['pwd'];

   // ...

$stmt = $conn->prepare("SELECT email, pwd FROM signup WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($fetchedEmail, $hashedPwd);
$stmt->fetch();
$stmt->close();

if ($hashedPwd && $enteredPwd === $hashedPwd) {
    // Successful login
    $_SESSION['email'] = $fetchedEmail;
    header("Location: ../map.php"); // Redirect to features.html on successful login
    exit();
} else {
    // Incorrect email or password
    $_SESSION['login_error'] = "Invalid email or password";
    header("Location: ../php/u_login.php"); // Redirect back to login.html on incorrect login
    exit();
}

// ...


    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login</title>
      <link rel="stylesheet" href="../css/u_login.css">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
      <div class="wrapper">

         <div class="title">
            <div class="image-container">
               <img src="../img/pf2.png" alt="logo" style="width: 150px; justify-content: center;">
            </div>
            Login Form
         </div>
         <br>
         <div id="error-message" style="color: red; text-align: center; padding-top: 2px;">
            <?php
            if (isset($_SESSION['login_error'])) {
                echo $_SESSION['login_error'];
                unset($_SESSION['login_error']); // Clear the error message
            }
            ?>
         </div>
         <form action="u_login.php" method="POST">
            <div class="field">
               <input type="text" name="email" id="email" required>
               <label>Email Address</label>
            </div>
            <div class="field">
               <input type="password" name="pwd" id="pwd" required>
               <label>Password</label>
            </div>
            <div class="content">
               <div class="checkbox">
                  <input type="checkbox" id="remember-me">
                  <label for="remember-me">Remember me</label>
               </div>
               <div class="pass-link">
                  <a href="#">Forgot password?</a>
               </div>
            </div>
            <div class="field">
               <input type="submit" value="Login">
            </div>
            <div class="signup-link">
               Not a member? <a href="u_signup.php">Signup now</a>
            </div>
         </form>
      </div>
   </body>
</html>

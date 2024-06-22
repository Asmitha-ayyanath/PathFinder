<?php
session_start();

include("database.php");

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pno = $_POST['pno'];
    $password = $_POST['pwd'];

    $email = mysqli_real_escape_string($con, $email); // Sanitize input

    $query = "SELECT email FROM signup WHERE email='$email'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<center><h3><script>alert('Sorry.. This email is already registered !!');</script></h3></center>";
        header("refresh:0;url=u_login.php");
        exit(); // Important: Stop further execution
    } else {
        $query = "INSERT INTO signup (fname, lname, email, pno, pwd) VALUES ('$fname', '$lname', '$email', '$pno', '$password')";
        if (mysqli_query($con, $query)) {
            header('Location: ../map.html');
            exit(); // Important: Stop further execution
        }
    }
}
?>
 



 <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Sign up</title>
    <link rel="stylesheet" href="../css/signup.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container"><img src="../img/pf2.png" style="width:70px">
    <div class="title">Sign up</div>

    <div class="content">
      <form action="u_signup.php" method="post" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" placeholder="Enter your first name" id="fname" name="fname" required>
          </div>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" placeholder="Enter your last name" id="lname" name="lname" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" placeholder="Enter your email" id="email" name="email" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your number" id="pno" name="pno" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter your password" id="pwd" name="pwd" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" placeholder="Confirm your password" id="cpwd" name="cpwd" required>
          </div>
        </div>
       <div class="button">
        <a href="login.php?email=$email">
          <input type="submit" name="submit" value="submit"> 
        </a> 
       </div>
      </form>
    </div>
  </div>

</body>


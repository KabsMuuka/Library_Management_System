<!DOCTYPE html>
<html>
<head>

  <title>Student Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  
</head>
<body>
<section>
  <div class="reg_img">

    <div class="box2">
        <h1 style="text-align: center; font-size: 25px;">User Registration Form</h1><br>
      <form class="register" name="Registration" action="./register.php" method="POST">
        <br><br>
        <div class="login">
          <input class="first" type="text" name="first" placeholder="First Name"=""> <br><br>
          <input class="last" type="text" name="last" placeholder="Last Name"> <br><br>
          <input class="password" type="password" name="password" placeholder="Password"> <br><br>
          <input class="comfirm" type="password" name="pass" placeholder="Comfirm Password"><br><br>
          <input class="email" type="text" name="email" placeholder="Email"><br><br>
          <p class="pass_match"></p><br>
          <button id="signup" type="submit">Sign Up</button></div>
      </form>
    </div>
  </div>
</section>

<script src="./app.js"></script>
</body>
</html>
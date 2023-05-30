<!DOCTYPE html>
<html>
<head>

  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  
</head>
<body class="log_img">
<section>
  <div>
    <br> <br><br>
    <div class="box1">
        <h1 style="text-align: center; font-size: 25px;">User Login Form</h1><br>
        <div class="login">
          <form action="./signin.php" method="post">
            <input class="userId" type="text" name="userid" placeholder="Userid" required=""> <br><br>
            <input class="pwd" id="password" type="password" name="password" placeholder="Password" required=""> <br><br>
            <div class="show-pass">
              <input type="checkbox" name="check" id="check">
              <label for="check">Show password</label><br>
            </div>
            <button name="login">Login</button>
          </form>
        </div>
      <p style="color: white; padding-left: 15px;">
        <br><br>
        <a style="color:white;" href="">Forgot password?</a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
        New to this website?<a style="color: white;" href="registration.php">Sign Up</a>
      </p>
    </div>
  </div>
</section>

<script src="./index.js"></script>
</body>
</html>
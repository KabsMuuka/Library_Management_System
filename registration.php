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
      <form name="Registration" action="./register.php" method="POST">
        <br><br>
        <div class="login">
          <input type="text" name="first" placeholder="First Name" required=""> <br><br>
          <input type="text" name="last" placeholder="Last Name" required=""> <br><br>
          <input type="text" name="username" placeholder="Username" readonly> <br><br>
          <input type="password" name="password" placeholder="Password" required=""> <br><br>
          <input type="text" name="email" placeholder="Email" required=""><br><br>

          <button>Sign Up</button></div>
      </form>
    </div>
  </div>
</section>
</body>
</html>
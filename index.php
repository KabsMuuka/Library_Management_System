<!DOCTYPE html>
<html>
<head>
  <title>Library Login Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-image: url('images/background.png'); /* Set background image */
      background-repeat: no-repeat;
      background-size: cover;
    }

    .container {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: rgba(255, 255, 255, 0.8); /* Add opacity to the background color */
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    /* Rest of the CSS code... */
  </style>
</head>
<body>
  <div class="container">
    <h1>Library Login</h1>
    <form method="POST" action="home/home.php">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter your username" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
      </div>
      <div class="form-group">
        <button type="submit" name="login">Login</button>
      </div>
    </form>
  </div>
</body>
</html>

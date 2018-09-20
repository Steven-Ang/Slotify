<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Welcome to Slotify!</title>
</head>
<body>

  <div id="inputContainer">
    <form action="register.php" method="POST" id="loginForm">
      <h2>Login To Your Account</h2>
      <div>
        <label for="loginUsername">Username</label>
        <input type="text" id="loginUsername" name="loginUsername" placeholder="Your Username" required>
      </div>
      <div>
        <label for="loginPassword">Password</label>
        <input type="password" id="loginPassword" name="loginPassword" required>
      </div>
      <button type="submit" name="loginButton">Login</button>
    </form>
  </div>

</body>
</html>
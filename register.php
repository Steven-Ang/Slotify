<?php

function sanitizeFormPassword($inputText) {
  $inputText = strip_tags($inputText);
  return $inputText;
}

function sanitizeFormUsername($inputText) {
  $inputText = strip_tags($inputText);
  $inputText = str_replace(" ", "", $inputText);
  return $inputText;
}

function sanitizeFormString($inputText) {
  $inputText = strip_tags($inputText);
  $inputText = str_replace(" ", "", $inputText);
  $inputText = ucfirst(strtolower($inputText));
  return $inputText;
}

if (isset($_POST["loginButton"])) {
  
}

if (isset($_POST["registerButton"])) {
  $username = sanitizeFormUsername($_POST["username"]);
  $firstName = sanitizeFormString($_POST["firstName"]);  
  $lastName = sanitizeFormString($_POST["lastName"]);  
  $email = sanitizeFormString($_POST["email"]);  
  $confirmEmail = sanitizeFormString($_POST["confirmEmail"]);  
  $password = sanitizeFormPassword($_POST["password"]);
  $confirmPassword = sanitizeFormPassword($_POST["confirmPassword"]);
  echo "All Good";
}

?>

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
        <input type="password" id="loginPassword" name="loginPassword" placeholder="Your Password" required>
      </div>

      <button type="submit" name="loginButton">Login</button>
    </form>

    <form action="register.php" method="POST" id="registerForm">
      <h2>Create Your Free Account</h2>

      <div>
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Your Username" required>
      </div>

      <div>
        <label for="firstName">First Name</label>
        <input type="text" id="firstName" name="firstName" placeholder="First Name" required>
      </div>

      <div>
        <label for="lastName">Last Name</label>
        <input type="text" id="lastName" name="lastName" placeholder="Last Name" required>
      </div>

      <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Your Email" required>
      </div>

      <div>
        <label for="confirmEmail">Confirm Email</label>
        <input type="email" id="confirmEmail" name="confirmEmail" placeholder="Confirm Your Email" required>
      </div>

      <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="loginPassword" placeholder="Your Password" required>
      </div>

      <div>
        <label for="confirmPassword">Confirm Password</label>
        <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Your Password" required>
      </div>

      <button type="submit" name="registerButton">Sign Up</button>
    </form>

  </div>

</body>
</html>
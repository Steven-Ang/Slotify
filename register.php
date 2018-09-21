<?php 

include("inc/config.php");

include("inc/classes/Constants.php");
include("inc/classes/Account.php");

$account = new Account();

include("inc/handlers/register-handler.php");
include("inc/handlers/login-handler.php");

function getInput($input) {
  if (isset($_POST[$input])) {
    echo $_POST[$input];
  }
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
        <!-- Error Message -->
        <?php echo $account->getError(Constants::$usernameLength); ?>
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Your Username" value="<?php getInput("username") ?>" required>
      </div>

      <div>
        <!-- Error Message -->
        <?php echo $account->getError(Constants::$firstNameLength); ?>
        <label for="firstName">First Name</label>
        <input type="text" id="firstName" name="firstName" placeholder="First Name" value="<?php getInput("firstName") ?>" required>
      </div>

      <div>
        <!-- Error Message -->
        <?php echo $account->getError(Constants::$lastNameLength); ?>
        <label for="lastName">Last Name</label>
        <input type="text" id="lastName" name="lastName" placeholder="Last Name" value="<?php getInput("lastName") ?>" required>
      </div>

      <div>
        <!-- Error Message -->
        <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
        <?php echo $account->getError(Constants::$invalidEmail); ?>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Your Email" value="<?php getInput("email") ?>" required>
      </div>

      <div>
        <label for="confirmEmail">Confirm Email</label>
        <input type="email" id="confirmEmail" name="confirmEmail" placeholder="Confirm Your Email" 
        value="<?php getInput("confirmEmail") ?>" required>
      </div>

      <div>
        <!-- Error Message -->
        <?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
        <?php echo $account->getError(Constants::$passwordNotAlpha); ?>
        <?php echo $account->getError(Constants::$passwordLength); ?>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Your Password" required>
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
<?php 

include("inc/config.php");

include("inc/classes/Constants.php");
include("inc/classes/Account.php");

$account = new Account($con);

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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link rel="stylesheet" href="assets/css/register.css">
  <title>Welcome to Slotify!</title>
</head>
<body>

  <div id="background">
    <div class="row container" id="inputContainer">
      <form action="register.php" method="POST" id="loginForm" class="col s12 l4"">
        <h2>Login To Your Account</h2>

        <div>
          <!-- Error Message -->
          <?php echo $account->getError(Constants::$loginFailed); ?>
          <label for="loginUsername">Username</label>
          <input type="text" id="loginUsername" name="loginUsername" placeholder="Your Username" value="<?php getInput("loginUsername") ?>" required>
        </div>

        <div>
          <label for="loginPassword">Password</label>
          <input type="password" id="loginPassword" name="loginPassword" placeholder="Your Password" value="<?php getInput("loginPassword") ?>" required>
        </div>

        <button type="submit" name="loginButton">Login</button>

        <div class="hasAccount">
          <a href="#"><span class="hideLogin">Don't have an account yet? Sign up here!</span></a>
        </div>
      </form>

      <form action="register.php" method="POST" id="registerForm" class="col s12 l4">
        <h2>Create Your Free Account</h2>

        <div>
          <label for="username">Username</label>
          <input type="text" id="username" name="username" placeholder="Your Username" value="<?php getInput("username") ?>" required>
          <!-- Error Message -->
          <?php echo $account->getError(Constants::$usernameLength); ?>
          <?php echo $account->getError(Constants::$usernameTaken); ?>
        </div>

        <div>
          <label for="firstName">First Name</label>
          <input type="text" id="firstName" name="firstName" placeholder="First Name" value="<?php getInput("firstName") ?>" required>
          <!-- Error Message -->
          <?php echo $account->getError(Constants::$firstNameLength); ?>
        </div>

        <div>
          <label for="lastName">Last Name</label>
          <input type="text" id="lastName" name="lastName" placeholder="Last Name" value="<?php getInput("lastName") ?>" required>
          <!-- Error Message -->
          <?php echo $account->getError(Constants::$lastNameLength); ?>
        </div>

        <div>
          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="Your Email" value="<?php getInput("email") ?>" required>
          <!-- Error Message -->
          <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
          <?php echo $account->getError(Constants::$invalidEmail); ?>
          <?php echo $account->getError(Constants::$emailTaken); ?>
        </div>

        <div>
          <label for="confirmEmail">Confirm Email</label>
          <input type="email" id="confirmEmail" name="confirmEmail" placeholder="Confirm Your Email" 
          value="<?php getInput("confirmEmail") ?>" required>
        </div>

        <div>
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="Your Password" required>
          <!-- Error Message -->
          <?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
          <?php echo $account->getError(Constants::$passwordNotAlpha); ?>
          <?php echo $account->getError(Constants::$passwordLength); ?>
        </div>

        <div>
          <label for="confirmPassword">Confirm Password</label>
          <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Your Password" required>
        </div>

        <button type="submit" name="registerButton">Sign Up</button>

        <div class="hasAccount">
          <a href="#"><span class="hideRegister">Already have an account? Login in here!</span></a>
        </div>
      </form>

      <div id="loginText" class="col s12 l8"">
        <h2>Get great music, right now</h2>
        <h2>Listen to loads of songs for free.</h2>
        <ul>
          <li>Discover music you'll fall in love with</li>
          <li>Create your own playlists</li>
          <li>Follow artists to keep up-to-date</li>
        </ul>
      </div>

    </div>
  </div>

<script src="./assets/js/register.js"></script>
<?php 

if (isset($_POST["registerButton"])) {
  echo '<script>
  loginForm.style.display = "none";
  registerForm.style.display = "block";
  </script>';
} else {
  echo '<script>
  loginForm.style.display = "block";
  registerForm.style.display = "none";
  </script>';
}

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
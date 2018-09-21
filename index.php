<?php

include("inc/config.php");

// session_destroy();

if (isset($_SESSION['userLoggedIn'])) {
  $userLoggedIn = $_SESSION["userLoggedIn"];
} else {
  header("Location: register.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Welcome to Slotify!</title>
</head>
<body>
  <div id="nowPlayingBarContainer">
    <div id="nowPlayingBar">

      <div id="nowPlayingLeft">

      </div>

      <div id="nowPlayingCenter">

      </div>

      <div id="nowPlayingRight">

      </div>

    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
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
  
  <div id="mainContainer">

    <div id="topContainer">

      <div id="navBarContainer">
        <nav class="navBar">
          <a href="index.php" class="logo">
            <img src="assets/images/spotify.png" alt="">
          </a>
        </nav>
      </div>

    </div>

    <div id="nowPlayingBarContainer">
      <div id="nowPlayingBar">

        <div id="nowPlayingLeft">
          <div class="content">
            <span class="albumLink">
              <img src="https://upload.wikimedia.org/wikipedia/en/thumb/3/3b/Dark_Side_of_the_Moon.png/220px-Dark_Side_of_the_Moon.png" class="albumArtwork" alt="">
            </span>
            <div class="trackInfo">
              <span class="trackName">
                <span>Brain Damage</span>
              </span>

              <span class="artistName">
                <span>Pink Floyd</span>
              </span>
            </div>
          </div>
        </div>

        <div id="nowPlayingCenter">

          <div class="content playerControls">

            <div class="buttons">
              <button class="controlButton shuffle" title="Shuffle Button">
                <img src="assets/images/icons/shuffle.png" alt="Shuffle">
              </button>

              <button class="controlButton previous" title="Previous Button">
                <img src="assets/images/icons/previous.png" alt="Previous">
              </button>

              <button class="controlButton play" title="Play Button">
                <img src="assets/images/icons/play.png" alt="Play">
              </button>

              <button class="controlButton pause" title="Pause Button">
                <img src="assets/images/icons/pause.png" alt="Pause">
              </button>

              <button class="controlButton next" title="Next Button">
                <img src="assets/images/icons/next.png" alt="Next">
              </button>

              <button class="controlButton repeat" title="Repeat Button">
                <img src="assets/images/icons/repeat.png" alt="Repeat">
              </button>

            </div>

          </div>

          <div class="playbackBar">
            <span class="progressTime current">0.00</span>
            <div class="progressBar">
              <div class="progressBarBackground">
                <div class="progress"></div>
              </div>
            </div>
            <span class="progressTime remaining">0.00</span>
          </div>

        </div>

        <div id="nowPlayingRight">
          <div class="volumeBar">
            <button class="controlButton volume" title="Volume Button">
              <img src="assets/images/icons/volume.png" alt="Volume">
            </button>

            <div class="progressBar">
              <div class="progressBarBackground">
                <div class="progress"></div>
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>

  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
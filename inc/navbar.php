<?php ?>
<div id="navBarContainer">
  <nav class="navBar">
    <span onclick="openPage('index.php')" role="link" tabIndex="0" class="logo">
      <img src="assets/images/spotify.png" alt="">
    </span>
    <div class="group">
      <div class="navItem">
      <span onclick="openPage('search.php')" role="link" tabIndex="0" class="navItemLink">Search</span>
        <img src="assets/images/icons/search.png" class="icon" alt="Search">
      </div>
    </div>
    <div class="group">
      <div class="navItem">
      <span onclick="openPage('browse.php')" role="link" tabIndex="0" class="navItemLink">Browse</span>
      </div>
      <div class="navItem">
      <span onclick="openPage('yourMusic.php')" role="link" tabIndex="0" class="navItemLink">Your Music</span>
      </div>
      <div class="navItem">
      <span onclick="openPage('profile.php')" role="link" tabIndex="0" class="navItemLink"><?php echo $userLoggedIn; ?></span>
      </div>
    </div>
  </nav>
</div>
<?php ?>
<div id="navBarContainer">
  <nav class="navBar">
    <span class="logo">
      <img src="assets/images/spotify.png" alt="">
    </span>
    <div class="group">
      <div class="navItem">
        <a href="search.php" class="navItemLink">Search</a>
        <img src="assets/images/icons/search.png" class="icon" alt="Search">
      </div>
    </div>
    <div class="group">
      <div class="navItem">
        <a href="browse.php" class="navItemLink">Browse</a>
      </div>
      <div class="navItem">
        <a href="yourMusic.php" class="navItemLink">Your Music</a>
      </div>
      <div class="navItem">
        <a href="profile.php" class="navItemLink"><?php echo $userLoggedIn; ?></a>
      </div>
    </div>
  </nav>
</div>
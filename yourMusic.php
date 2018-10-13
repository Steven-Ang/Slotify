<?php
include("inc/includedFiles.php");
?>

<div class="playlistContainer">
  <h4 class="text-center">Playlists</h4>
  <div class="buttons">
    <button class="button green text-center" style="display: block; margin: 15px auto;" onclick="createPlaylist()">New Playlist</button>
  </div>

  <div class="row padding-left">
  <?php

  $username = $userLoggedIn->getUsername();

  $query = mysqli_query($con, "SELECT * FROM playlist WHERE owner='$username'");

  if (mysqli_num_rows($query) === 0) {
    echo "<span class='noResults'>"."You don't have any playlist.</span>";
  }

  while($row = mysqli_fetch_array($query)) {

    $playlist = new Playlist($con, $row);

    $output = "<div class='col s12 m3 album' style='padding: 0 20px 0 0;' role='link' tabindex='0' onclick='openPage(\"playlist.php?id=".$playlist->getId()."\")'>";
    $output .= "<div class='playlistImage'>";
    $output .= "<img src='assets/images/icons/playlist.png'>";
    $output .= "</div>";
    $output .= $playlist->getName();
    $output .= "</div>";
    echo $output;
  }

  ?>

</div>

</div>
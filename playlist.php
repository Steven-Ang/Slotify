<?php include("inc/includedFiles.php"); ?>

<?php 

if (isset($_GET["id"])) {
  $playlistId = $_GET["id"];
} else {
  header("Location: index.php");
}

$playlist = new Playlist($con, $playlistId);

$owner = new User($con, $playlist->getOwner());

?>

<div class="entityInfo">
  <div class="leftSection">
    <img class="artwork" src="assets/images/icons/playlist.png" alt="">
  </div>

  <div class="rightSection">
    <h2><?php echo $playlist->getName(); ?></h2>
    <p>Created By <?php echo $playlist->getOwner() ?></p>
    <p><?php echo $playlist->totalSongs(); ?> songs</p>
    <button class="button delete-button" onclick="deletePlaylist(<?php echo $playlistId; ?>)">Delete Playlist</button>
  </div>
</div>

<div class="tracklistContainer">
  <ul class="tracklist">
    <?php
    
    $songs = $playlist->getSongs(); 

    $i = 1;

    foreach($songs as $song) {
      $playlistSong = new Song($con, $song);
      $songArtist = $playlistSong->getArtist();
      $output = "<li class='tracklistRow'>";

      $output .= "<div class='trackCount'>";
      $output .= "<img class='play-white' src='assets/images/icons/play-white.png' onclick='setTrack(\"".$playlistSong->getId()."\", tempPlaylist, true)'>";
      $output .= "<span class='trackNumber'>$i</span>";
      $output .= "</div>";

      $output .= "<div class='albumTrackInfo'>";
      $output .= "<span class='albumTrackName'>".$playlistSong->getTitle()." &minus; "."<span class='albumArtistName'>".$songArtist->getName()."</span>"."</span>";
      $output .= "</div>";

      $output .= "<div class='trackOptions'>";
      $output .= "<input type='hidden' class='song-id' value='".$playlistSong->getId()."'>";
      $output .= "<img class='optionsButton' src='assets/images/icons/more.png' onclick='showOptionsMenu(this)'>";
      $output .= "</div>";

      $output .= "<div class='trackDuration'>";
      $output .= "<span class='duration'>".$playlistSong->getDuration()."</span>";
      $output .= "</div>";

      $output .= "</li>";
      echo $output;
      $i++;
    }
    
    ?>
    <script>
      var tempSongIds = '<?php echo json_encode($songs) ?>';
      tempPlaylist = JSON.parse(tempSongIds);
    </script>
  </ul>
</div>

<div class="optionsMenu">
  <input type="hidden" class="song-id">
  <?php echo Playlist::getPlaylistDropdown($con, $userLoggedIn->getUsername()); ?>
  <div class="item" onclick="removeFromPlaylist(this, '<?php echo $playlistId; ?>')">
    Remove From Playlist
  </div>
</div>
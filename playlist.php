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
    <button class="button delete-button">Delete Playlist</button>
  </div>
</div>

<div class="tracklistContainer">
  <ul class="tracklist">
    <?php
    
    $songs = [];//$album->getSongs(); 

    $i = 1;

    foreach($songs as $song) {
      $albumSong = new Song($con, $song);
      $albumArtist = $albumSong->getArtist();
      $output = "<li class='tracklistRow'>";

      $output .= "<div class='trackCount'>";
      $output .= "<img class='play-white' src='assets/images/icons/play-white.png' onclick='setTrack(\"".$albumSong->getId()."\", tempPlaylist, true)'>";
      $output .= "<span class='trackNumber'>$i</span>";
      $output .= "</div>";

      $output .= "<div class='albumTrackInfo'>";
      $output .= "<span class='albumTrackName'>".$albumSong->getTitle()." &minus; "."<span class='albumArtistName'>".$albumArtist->getName()."</span>"."</span>";
      $output .= "</div>";

      $output .= "<div class='trackOptions'>";
      $output .= "<img class='optionsButton' src='assets/images/icons/more.png'>";
      $output .= "</div>";

      $output .= "<div class='trackDuration'>";
      $output .= "<span class='duration'>".$albumSong->getDuration()."</span>";
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
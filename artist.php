<?php
include("inc/includedFiles.php");

if (isset($_GET["id"])) {
  $artistId = $_GET["id"];
} else {
  header("Location: index.php");
}

$artist = new Artist($con, $artistId);
?>

<div class="entityInfo border-bottom">
  <div class="centerSection">
    <div class="artistInfo">
      <h1 class="artistPageName"><?php echo $artist->getName() ?></h1>
      <div class="headerButtons">
        <button class="button green">Play</button>
      </div>
    </div>
  </div>
</div>

<div class="tracklistContainer border-bottom">
  <ul class="tracklist">
    <?php
    
    $songs = $artist->getSongIds();

    $i = 1;

    foreach($songs as $song) {
      if ($i > 5) {
        break;
      }
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
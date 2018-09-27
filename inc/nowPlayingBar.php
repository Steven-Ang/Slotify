<?php 

$songQuery = mysqli_query($con, "SELECT id FROM songs ORDER BY RAND() LIMIT 10");
$songs = [];

while($row = mysqli_fetch_array($songQuery)) {
  array_push($songs, $row["id"]);
}

$jsonArr = json_encode($songs);

?>

<script>
currentPlaylist = <?php echo $jsonArr ?>;
setTrack(currentPlaylist[0], currentPlaylist, false);
</script>

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
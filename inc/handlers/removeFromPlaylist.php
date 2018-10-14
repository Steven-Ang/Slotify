<?php
include("../config.php");

if (isset($_POST['playlistId']) && isset($_POST["songId"])) {
  $playlistId = $_POST["playlistId"];
  $songId = $_POST["songId"];

  $query = mysqli_query($con, "DELETE FROM playlist_songs WHERE playlist_id='$playlistId' AND song_id='$songId'");
} else {
  echo "PlaylistId or songID was not passed.";
}

?>
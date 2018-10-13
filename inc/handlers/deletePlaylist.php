<?php
include("../config.php");

if (isset($_POST['playlistId'])) {
  $playlistId = $_POST["playlistId"];
  $playlistQuery = mysqli_query($con, "DELETE FROM playlist WHERE id='$playlistId'");
  $songQuery = mysqli_query($con, "DELETE FROM playlist_songs WHERE playlist_id='$playlistId'");
} else {
  echo "Unable to delete the playlist. Check whether the id is passed onto the function.";
}

?>
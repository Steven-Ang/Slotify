<?php
include("../config.php");

if (isset($_POST['playlistId']) && isset($_POST["songId"])) {
  $playlistId = $_POST["playlistId"];
  $songId = $_POST["songId"];

  $orderIdQuery = mysqli_query($con, "SELECT IFNULL(MAX(playlist_order), 0) + 1 AS play_order FROM playlist_songs WHERE playlist_id='$playlistId'");
  $row = mysqli_fetch_array($orderIdQuery);
  $order = $row["play_order"];

  $query = mysqli_query($con, "INSERT INTO playlist_songs VALUES (NULL, '$songId', '$playlistId', '$order')");
} else {
  echo "PlaylistId or songID was not passed.";
}

?>
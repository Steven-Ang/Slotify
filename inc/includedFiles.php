<?php

if (isset($_SERVER["HTTP_X_REQUESTED_WITH"])) {
  include("inc/config.php");
  include("inc/classes/Artist.php");
  include("inc/classes/Album.php");
  include("inc/classes/Song.php");
} else {
  include("inc/header.php");
  include("inc/footer.php");

  $url = $_SERVER["REQUEST_URI"];
  echo "<script>openPage('$url')</script>";
  exit();
}
?>
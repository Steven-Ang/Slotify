<?php include("inc/header.php"); ?>

<?php 

if (isset($_GET["id"])) {
  $albumId = $_GET["id"];
} else {
  header("Location: index.php");
}

$album = new Album($con, $albumId);
$artist = $album->getArtist();

?>

<div class="entityInfo">
  <div class="leftSection">
    <img class="artwork" src="<?php echo $album->getArtworkPath(); ?>" alt="">
  </div>

  <div class="rightSection">
    <h2><?php echo $album->getTitle(); ?></h2>
    <p>By <span class="artistName"><?php echo $artist->getName(); ?></span></p>
    <p><?php echo $album->totalSongs(); ?> songs</p>
  </div>
</div>

<div class="tracklistContainer">
  <ul class="tracklist">
    <?php
    
    $songs = $album->getSongs();

    $i = 1;

    foreach($songs as $song) {
      $albumSong = new Song($con, $song);
      $albumArtist = $albumSong->getArtist();
      $output = "<li class='tracklistRow'>";

      $output .= "<div class='trackCount'>";
      $output .= "<img class='play-white' src='assets/images/icons/play-white.png'>";
      $output .= "<span class='trackNumber'>$i</span>";
      $output .= "</div>";

      $output .= "<div class='trackInfo'>";
      $output .= "<span class='trackName'>".$albumSong->getTitle()." &minus; "."<span class='artistName'>".$albumArtist->getName()."</span>"."</span>";
      // $output .= "<span class='artistName'>".$albumArtist->getName()."</span>";
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
  </ul>
</div>

<?php include("inc/footer.php"); ?>
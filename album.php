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

<?php include("inc/footer.php"); ?>
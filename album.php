<?php include("inc/header.php"); ?>

<?php 

if (isset($_GET["id"])) {
  $albumId = $_GET["id"];
} else {
  header("Location: index.php");
}

$album = new Album($con, $albumId);
$artist = $album->getArtist();

echo $album->getTitle();
echo "<br>";
echo $artist->getName();

?>

<?php include("inc/footer.php"); ?>
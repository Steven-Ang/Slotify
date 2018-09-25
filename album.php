<?php include("inc/header.php"); ?>

<?php 

if (isset($_GET["id"])) {
  $albumID = $_GET["id"];
} else {
  header("Location: index.php");
}

$albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE id='$albumID'");
$album = mysqli_fetch_array($albumQuery);

$artistId = $album["artist"];
$artistQuery = mysqli_query($con, "SELECT * FROM artists WHERE id='$artistId'");
$artist = mysqli_fetch_array($artistQuery);

echo $album["title"];
echo "<br>";
echo $artist["name"];

?>

<?php include("inc/footer.php"); ?>
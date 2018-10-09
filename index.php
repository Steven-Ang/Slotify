<?php 
include("inc/includedFiles.php");
?>

<h2 class="pageHeading">You Might Also Like</h2>

<div class="row">

  <?php 

  $query = mysqli_query($con, "SELECT * FROM albums ORDER BY RAND() LIMIT 10");

  while($row = mysqli_fetch_array($query)) {
    $albumTitle = $row["title"];
    if (strlen($albumTitle) > 30) {
      $albumTitle = strstr(wordwrap($albumTitle, 30), "\n", true)."...";
    }
    $output = "<div class='col s12 m3 album'>";
    $output .= "<a href='album.php?id=".$row["id"] . "'>";
    $output .= "<img class='artwork' src='";
    $output .= $row["artwork"];
    $output .= "'>";
    $output .= "<p class='albumTitle'>".$albumTitle."</p>";
    $output .= "</div>";
    $output .= "</a>";
    echo $output;
  }

  ?>

</div>
<?php

include("inc/includedFiles.php");

if (isset($_GET["term"])) {
  $search = urldecode($_GET["term"]);
} else {
  $search = "";
}

?>

<div class="searchContainer">
  <h4>Search for an artist, album, or song</h4>
  <input type="text" class="searchInput" value="<?php echo $search ?>" placeholder="Start typing..." onfocus="let val = this.value; this.value = ''; this.value = val;">
</div>

<script>
  $(function() {

    $(".searchInput").keyup(() => {
      clearTimeout(timer);

      timer = setTimeout(() => {
        let val = $(".searchInput").val();
        openPage(`search.php?term=${val}`);
      }, 1000);
    });
    $(".searchInput").focus();
  });
</script>

<!-- If the search term is empty, don't load the rest of the code. -->
<?php if ($search === '') { exit(); }?>

<div class="tracklistContainer border-bottom" style="padding-left: 20px;">
  <ul class="tracklist">
    <h4>Songs</h4>
    <?php

    $query = mysqli_query($con, "SELECT id FROM songs WHERE title LIKE '$search%' LIMIT 10");

    if (mysqli_num_rows($query) === 0) {
      echo "<span class='noResults'>"."No songs found matching ".$search."</span>";
    }
    
    $songs = [];

    $i = 1;

    while($row = mysqli_fetch_array($query)) {
      if ($i > 15) {
        break;
      }

      array_push($songs, $row["id"]);

      $albumSong = new Song($con, $row["id"]);
      $albumArtist = $albumSong->getArtist();
      $output = "<li class='tracklistRow'>";

      $output .= "<div class='trackCount'>";
      $output .= "<img class='play-white' src='assets/images/icons/play-white.png' onclick='setTrack(\"".$albumSong->getId()."\", tempPlaylist, true)'>";
      $output .= "<span class='trackNumber'>$i</span>";
      $output .= "</div>";

      $output .= "<div class='albumTrackInfo'>";
      $output .= "<span class='albumTrackName'>".$albumSong->getTitle()." &minus; "."<span class='albumArtistName'>".$albumArtist->getName()."</span>"."</span>";
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
    <script>
      var tempSongIds = '<?php echo json_encode($songs) ?>';
      tempPlaylist = JSON.parse(tempSongIds);
    </script>
  </ul>
</div>

<div class="artistsContainer border-bottom" style="padding-left: 20px;">
  <h4>Artists</h4>
  <?php 
  $artistQuery = mysqli_query($con, "SELECT id FROM artists WHERE name like '$search%' LIMIT 10");

  if (mysqli_num_rows($artistQuery) === 0) {
    echo "<span class='noResults'>"."No artists found matching ".$search."</span>";
  }

  while ($row = mysqli_fetch_array($artistQuery)) {
    $artistFound = new Artist($con, $row["id"]);

    echo "<div class='searchResult'>
            <div class='searchAristName'>
              <span role='link' tabindex='0' onclick='openPage(\"artist.php?id=".$artistFound->getId()."\")'>".$artistFound->getName()."</span>
            </div>
          </div>";
  }
  
  ?>
</div>

<div class="row padding-left">
  <h4 style="padding: 10px 0;">Albums</h4>
<?php 

$query = mysqli_query($con, "SELECT * FROM albums WHERE title like '$search%' LIMIT 10");

if (mysqli_num_rows($query) === 0) {
  echo "<span class='noResults'>"."No albums found matching ".$search."</span>";
}

while($row = mysqli_fetch_array($query)) {
  $albumTitle = $row["title"];
  if (strlen($albumTitle) > 30) {
    $albumTitle = strstr(wordwrap($albumTitle, 30), "\n", true)."...";
  }
  $output = "<div class='col s12 m3 album' style='padding: 0 20px 0 0;'>";
  $output .= "<span onclick='openPage(\"album.php?id=".$row["id"]."\")' role='link' tabIndex='0'>";
  $output .= "<img class='artwork' src='";
  $output .= $row["artwork"];
  $output .= "'>";
  $output .= "<p class='albumTitle'>".$albumTitle."</p>";
  $output .= "</div>";
  $output .= "</span>";
  echo $output;
}

?>

</div>
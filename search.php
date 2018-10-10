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
    let timer;

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
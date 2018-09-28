let currentPlaylist = [];
let audio = new Audio();

function setTrack(trackId, newPlaylist, play) {
  
  $.post("inc/handlers/getSongJSON.php", { songId: trackId }, function(data) {
    let track = JSON.parse(data);
    audio.setTrack(track.path);
    audio.play();

    $.post("inc/handlers/getArtistJSON.php", { artistId: track.artist }, function(data) {
      let artist = JSON.parse(data);
      $(".artistName span").text(artist.name);
    });

    $.post("inc/handlers/getAlbumJSON.php", { albumId: track.album }, function(data) {
      let album = JSON.parse(data);
      $(".albumLink img").attr("src", album.artwork);
    });

    $(".trackName span").text(track.title);
  });
  
  audio.setTrack("assets/music/Ziggy-Stardust/Five Years.mp3");
  if (play) {
    audio.play();
  }
}

document.addEventListener("DOMContentLoaded", function() {
  $(".play").on("click", () => {
    playSong();
  });
  $(".pause").on("click", () => {
    pauseSong();
  });

  function playSong() {
    $(".play").hide();
    $(".pause").show();
    audio.play();
  }

  function pauseSong() {
    $(".play").show();
    $(".pause").hide();
    audio.pause();
  }

});
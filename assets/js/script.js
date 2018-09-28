let currentPlaylist = [];
let audio = new Audio();

function setTrack(trackId, newPlaylist, play) {
  
  $.post("inc/handlers/getSongJSON.php", { songId: trackId }, function(data) {
    let track = JSON.parse(data);
    console.log(data);
    audio.setTrack(track.path);
    audio.play();
  });
  
  audio.setTrack("assets/music/Ziggy-Stardust/Five Years.mp3");
  if (play) {
    audio.play();
  }
}

document.addEventListener("DOMContentLoaded", function() {
  const playBtn = document.querySelector(".play");
  const pauseBtn = document.querySelector(".pause");

  playBtn.addEventListener("click", () => {
    playSong();
  });

  pauseBtn.addEventListener("click", () => {
    pauseSong();
  });

  function playSong() {
    playBtn.style.display = "none";
    pauseBtn.style.display = "inline-block"
    audio.play();
  }

  function pauseSong() {
    pauseBtn.style.display = "none";
    playBtn.style.display = "inline-block";
    audio.pause();
  }

});
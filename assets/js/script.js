let currentPlaylist = [];
let audio = new Audio();
setTrack(currentPlaylist[0], currentPlaylist, false);

function setTrack(trackId, newPlaylist, play) {
  audio.setTrack("assets/music/Ziggy-Stardust/Five Years.mp3");
  if (play) {
    audio.play();
  }
}
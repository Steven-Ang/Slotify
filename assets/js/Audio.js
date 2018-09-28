class Audio {
  constructor() {
    this.audio = document.createElement("audio"); 
    this.currentlyPlaying;
  }

  setTrack(track) {
    this.currentlyPlaying = track;
    this.audio.src = track.path;
  }

  play() {
    this.audio.play();
  }

  pause() {
    this.audio.pause();
  }
}
class Audio {
  constructor() {
    this.audio = document.createElement("audio"); 
  }

  setTrack(src) {
    this.audio.src = src;
  }

  play() {
    this.audio.play();
  }

  pause() {
    this.audio.pause();
  }
}
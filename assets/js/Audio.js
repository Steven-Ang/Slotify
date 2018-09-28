class Audio {
  constructor() {
    this.audio = document.createElement("audio"); 
    this.currentlyPlaying;
    this.audio.addEventListener("canplay", () => {
      $(".progressTime.remaining").text(this.formatTime(this.audio.duration));
    });
  }

  formatTime(duration) {
    let time = Math.round(duration);
    let minutes = Math.floor(time / 60);
    let seconds = time - minutes * 60;
    let extraZero = (seconds < 10) ? "0" : "";
    
    return `${minutes}:${extraZero}${seconds}`;
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
class Audio {
  constructor() {
    this.audio = document.createElement("audio"); 
    this.currentlyPlaying;
    this.audio.addEventListener("canplay", () => {
      $(".progressTime.remaining").text(this.formatTime(this.audio.duration));
    });
    this.audio.addEventListener("timeupdate", () => {
      if (this.audio.duration) {
        this.updateTimeProgressBar(this.audio);
      }
    });
  }

  updateTimeProgressBar(audio) {
    $(".progressTime.current").text(this.formatTime(audio.currentTime));
    $(".progressTime.remaining").text(this.formatTime(audio.duration - audio.currentTime));
    let progress = audio.currentTime / audio.duration * 100;
    $(".playbackBar .progress").css("width", progress + "%");
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
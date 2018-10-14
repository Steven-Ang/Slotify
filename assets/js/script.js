let currentPlaylist = [];
let shufflePlaylist = [];
let tempPlaylist = [];
let currentIndex = 0;
let audio;
let timer;
let mouseDown = false;
let repeat = false;
let shuffle = false;
let userLoggedIn;

$(function() {
  $(window).scroll(() => {
    hideOptionsMenu();
  });

  $(document).click((e) => {
    target = $(e.target);

    if (!target.hasClass("item") && !target.hasClass("optionsButton")) {
      hideOptionsMenu();
    }
  });

  // Prevent the highlighting
  $("#nowPlayingBarContainer").on("mousedown touchstart mousemove touchmove", (e) => {
    e.preventDefault();
  });
  
  $(".playbackBar .progressBar").mousedown(() => {
    mouseDown = true;
  });

  $(".playbackBar .progressBar").mousemove(function(e) {
    if (mouseDown) {
      // Set time of song, depending on the position of the cursor
      timeFromOffset(e, this);
    }
  });
  
  $(".playbackBar .progressBar").mouseup(function(e) {
    timeFromOffset(e, this);
  });

  $(".volumeBar .progressBar").mousedown(() => {
    mouseDown = true;
  });
  
  $(".volumeBar .progressBar").mousemove(function(e) {
    if (mouseDown) {
      let percentage = e.offsetX / $(this).width();
      if (percentage >= 0 && percentage <= 1) {
        audio.audio.volume = percentage;
      }
    }
  });
  
  $(".volumeBar .progressBar").mouseup(function(e) {
    let percentage = e.offsetX / $(this).width();
    if (percentage >= 0 && percentage <= 1) {
      audio.audio.volume = percentage;
    }
  });

  $(document).mouseup(() => {
    mouseDown = false;
  });

  $(".play").on("click", () => {
    playSong();
  });
  
  $(".pause").on("click", () => {
    pauseSong();
  });
  
  $(".next").on("click", () => {
    nextSong();
  });
  
  $(".previous").on("click", () => {
    prevSong();
  });
  
  $(".repeat").on("click", () => {
    setRepeat();
  });
  
  $(".volume").on("click", () => {
    setMute();
  });
  
  $(".shuffle").on("click", () => {
    setShuffle();
  });
  
  $(audio.audio).on("ended", () => {
    nextSong();
  });
  
});

function playFirstSong() {
  setTrack(tempPlaylist[0], tempPlaylist, true);
}

function load(url, element) {
  let req = new XMLHttpRequest();
  req.open("GET", url, false);
  req.send(null);

  element.innerHTML = req.responseText; 
}

function openPage(url) {

  if (timer !== null) {
    clearTimeout(timer);
  }

  if (url.indexOf("?") == -1) {
		url += "?";
	}

  let encodedUrl = encodeURI(url + "&userLoggedIn=" + userLoggedIn);
  $("#mainContent").load(encodedUrl);
  $("body").scrollTop(0);
  history.pushState(null, null, url);
  
}

function timeFromOffset(mouse, progressBar) {
  let percentage = mouse.offsetX / $(progressBar).width() * 100;
  let seconds = audio.audio.duration * percentage / 100;
  audio.setTime(seconds);
}

function prevSong() {
  if (audio.audio.currentTime === 3 || currentIndex === 0) {
    audio.setTime(0);
  } else {
    currentIndex--;
    setTrack(currentPlaylist[currentIndex], currentPlaylist, true);
  }
}

function nextSong() {
  if (repeat) {
    audio.setTime(0);
    playSong();
    return;
  }

  if (currentIndex === currentPlaylist.length - 1) {
    currentIndex = 0;
  } else {
    currentIndex++;
  }

  let trackToPlay = shuffle ? shufflePlaylist[currentIndex] : currentPlaylist[currentIndex];
  setTrack(trackToPlay, currentPlaylist, true);
}

function setRepeat() {
  repeat = !repeat;
  let imageName = repeat ? "repeat-active" : "repeat";
  $(".controlButton.repeat img").attr("src", `assets/images/icons/${imageName}.png`);
}

function setMute() {
  audio.audio.muted = !audio.audio.muted;
  let imageName = audio.audio.muted ? "volume-mute" : "volume";
  $(".controlButton.volume img").attr("src", `assets/images/icons/${imageName}.png`);
}

function setShuffle() {
  shuffle = !shuffle;
  let imageName = shuffle ? "shuffle-active" : "shuffle";
  $(".controlButton.shuffle img").attr("src", `assets/images/icons/${imageName}.png`);
  if (shuffle) {
    // Randomize the playlist
    shuffleArray(shufflePlaylist);
    currentIndex = shufflePlaylist.indexOf(audio.currentlyPlaying.id);
  } else {
    // Deactivate the shuffle
    currentIndex = currentPlaylist.indexOf(audio.currentlyPlaying.id);
  }
}

function shuffleArray(a) {
  for (let i = a.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    [a[i], a[j]] = [a[j], a[i]];
  }
  return a;
}

function setTrack(trackId, newPlaylist, play) {

  if (newPlaylist != currentPlaylist) {
    currentPlaylist = newPlaylist;
    shufflePlaylist = currentPlaylist.slice();
    shuffleArray(shufflePlaylist);
  }
  
  if (shuffle) {
    currentIndex = shufflePlaylist.indexOf(trackId);
  } else {
    currentIndex = currentPlaylist.indexOf(trackId);
  }

  pauseSong();

  $.post("inc/handlers/getSongJSON.php", { songId: trackId }, function(data) {
    let track = JSON.parse(data);
    $(".trackName span").text(track.title);

    $.post("inc/handlers/getArtistJSON.php", { artistId: track.artist }, function(data) {
      let artist = JSON.parse(data);
      $(".trackInfo .artistName span").text(artist.name);
      $(".trackInfo .artistName span").attr("onclick", `openPage("artist.php?id=${artist.id}")`);
    });

    $.post("inc/handlers/getAlbumJSON.php", { albumId: track.album }, function(data) {
      let album = JSON.parse(data);
      $(".albumLink img").attr("src", album.artwork);
      $(".albumLink img").attr("onclick", `openPage("album.php?id=${album.id}")`);
      $(".trackName span").attr("onclick", `openPage("album.php?id=${album.id}")`);
    });

    audio.setTrack(track);

    if (play) {
      playSong();
    }
  });
}

function playSong() {
  if (audio.audio.currentTime === 0 ) {
    $.post("inc/handlers/updatePlays.php", { songId: audio.currentlyPlaying.id });
  } 
  $(".play").hide();
  $(".pause").show();
  audio.play();
}

function pauseSong() {
  $(".play").show();
  $(".pause").hide();
  audio.pause();
}

function createPlaylist() {
  let popup = prompt("Enter the name of your playlist.");
  if (popup !== null) {
    $.post("inc/handlers/createPlaylist.php", {name: popup, username: userLoggedIn})
    .done((err) => {

      if (err !== '') {
        alert(err);
        return;
      }

      openPage("yourMusic.php");
    });
  }
}

function deletePlaylist(id) {
  let prompt = confirm("Are you sure?");
  if (prompt) {
    $.post("inc/handlers/deletePlaylist.php", { playlistId: id })
    .done((err) => {

      if (err !== '') {
        alert(err);
        return;
      }

      openPage("yourMusic.php");
    });
  }
}

function hideOptionsMenu() {
  let menu = $(".optionsMenu");
  if (menu.css("display") !== "none") {
    menu.css("display", "none");
  }
}

function showOptionsMenu(btn) {
  let menu = $(".optionsMenu");
  let menuWidth = menu.width();
  let scrollTop = $(window).scrollTop();
  let elementOffset = $(btn).offset().top;
  let top = elementOffset - scrollTop;
  let left = $(btn).position().left;

  menu.css({ "top": top + "px", "left": left - menuWidth + "px", "display": "block" });
}
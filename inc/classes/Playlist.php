<?php

class Playlist {
  private $con;
  private $id;
  private $name;
  private $owner;

  public function __construct($con, $data) {

    if (!is_array($data)) {
      // Convert into an array
      $query = mysqli_query($con, "SELECT * FROM playlist WHERE id='$data'");
      $data = mysqli_fetch_array($query);
    }

    $this->con = $con;
    $this->id = $data["id"];
    $this->name = $data["name"];
    $this->owner = $data["owner"];
  }

  public function getName() {
    return $this->name;
  }

  public function getOwner() {
    return $this->owner;
  }

  public function getId() {
    return $this->id;
  }

  public function totalSongs() {
    $query = mysqli_query($this->con, "SELECT song_id FROM playlist_songs WHERE playlist_id='$this->id'");
    return mysqli_num_rows($query);
  }
}

?>
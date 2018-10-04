<?php

include("inc/config.php");
include("inc/classes/Artist.php");
include("inc/classes/Album.php");
include("inc/classes/Song.php");

// session_destroy();

if (isset($_SESSION['userLoggedIn'])) {
  $userLoggedIn = $_SESSION["userLoggedIn"];
  echo "<script>userLoggedIn = '$userLoggedIn'; </script>";
} else {
  header("Location: register.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Welcome to Slotify!</title>
  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="assets/js/Audio.js"></script>
  <script src="assets/js/script.js"></script>
</head>
<body>
  
  <div id="mainContainer">

    <div id="topContainer">

      <?php include("inc/navBar.php"); ?>

      <div id="mainViewContainer">

        <div id="mainContent">
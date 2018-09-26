<?php

include("inc/config.php");
include("inc/classes/Artist.php");
include("inc/classes/Album.php");
include("inc/classes/Song.php");

// session_destroy();

if (isset($_SESSION['userLoggedIn'])) {
  $userLoggedIn = $_SESSION["userLoggedIn"];
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
</head>
<body>
  
  <div id="mainContainer">

    <div id="topContainer">

      <?php include("inc/navBar.php"); ?>

      <div id="mainViewContainer">

        <div id="mainContent">
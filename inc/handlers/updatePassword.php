<?php
include("../config.php");

if (!isset($_POST["username"])) {
  echo "Error: Could not set username";
  exit();
}

if (!isset($_POST["oldPassword"]) || !isset($_POST["newPassword"]) || !isset($_POST["confirmNewPassword"])) {
  echo "All the fields are required.";
  exit();
}

if (isset($_POST["oldPassword"]) === "" || isset($_POST["newPassword"]) === "" || isset($_POST["confirmNewPassword"]) === "") {
  echo "Please fill in all of the fields.";
  exit();
}

$username = $_POST["username"];
$oldPassword = $_POST["oldPassword"];
$newPassword = $_POST["newPassword"];
$confirmNewPassword = $_POST["confirmNewPassword"];

// Encrypt the current password
$oldMd5 = md5($oldPassword);

$passwordCheck = mysqli_query($con, "SELECT * FROM users WHERE username='$username' AND password='$oldMd5'");

if (mysqli_num_rows($passwordCheck) != 1) {
  echo "Password is incorrect";
  exit();
}

if ($newPassword !== $confirmNewPassword) { 
  echo "Your new passwords do not match.";
  exit();
}

if (preg_match("/[^A-Za-z0-9]/", $newPassword)) {
  echo "Your password must only contain letters and/or numbers.";
  exit();
}

if (strlen($newPassword) > 30 || strlen($newPassword) < 5 ) {
  echo "Your password must be between 5 and 30 characters";
  exit();
}

$newMd5 = md5($newPassword);

$query = mysqli_query($con, "UPDATE users SET password='$newMd5' WHERE username='$username'");

echo "Update Successful!";

?>
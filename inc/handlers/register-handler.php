<?php

function sanitizeFormPassword($inputText) {
  $inputText = strip_tags($inputText);
  return $inputText;
}

function sanitizeFormUsername($inputText) {
  $inputText = strip_tags($inputText);
  $inputText = str_replace(" ", "", $inputText);
  return $inputText;
}

function sanitizeFormString($inputText) {
  $inputText = strip_tags($inputText);
  $inputText = str_replace(" ", "", $inputText);
  $inputText = ucfirst(strtolower($inputText));
  return $inputText;
}

function validateUsername($input) {
  
}

function validateFirstName($input) {

}

function validateLastName($input) {

}

function validateEmails($email, $confirmEmail) {

}

function validatePasswords($password, $confirmPassword) {

}

if (isset($_POST["registerButton"])) {
  $username = sanitizeFormUsername($_POST["username"]);
  $firstName = sanitizeFormString($_POST["firstName"]);  
  $lastName = sanitizeFormString($_POST["lastName"]);  
  $email = sanitizeFormString($_POST["email"]);  
  $confirmEmail = sanitizeFormString($_POST["confirmEmail"]);  
  $password = sanitizeFormPassword($_POST["password"]);
  $confirmPassword = sanitizeFormPassword($_POST["confirmPassword"]);
  
  validateUsername($username);
  validateFirstName($firstName);
  validateLastName($lastName);
  validateEmails($email, $confirmEmail);
  validatePasswords($password, $confirmPassword);

}

?>
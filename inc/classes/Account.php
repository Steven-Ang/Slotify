<?php

class Account {

  private $err;
  
  public function __construct() {
    $this->err = [];
  }

  public function register($username, $firstName, $lastName, $email, $confirmEmail, $password, $confirmPassword) {
    $this->validateUsername($username);
    $this->validateFirstName($firstName);
    $this->validateLastName($lastName);
    $this->validateEmails($email, $confirmEmail);
    $this->validatePasswords($password, $confirmPassword);

    if (empty($this->err)) {
      // Insert into database
      return true;
    } else {
      return false;
    }
  }

  public function getError($err) {
    if (!in_array($err, $this->err)) {
      $err = '';
    }
    return "<span class='errorMessage'>$err</span>";
  }

  private function validateUsername($input) {
    if (strlen($input) > 25 || strlen($input) < 5) {
      array_push($this->err, Constants::$usernameLength);
      return;
    }

    // Todo: Check if username exists
  }
  
  private function validateFirstName($input) {
    if (strlen($input) > 25 || strlen($input) < 5) {
      array_push($this->err, Constants::$firstNameLength);
      return;
    }
  }
  
  private function validateLastName($input) {
    if (strlen($input) > 25 || strlen($input) < 3) {
      array_push($this->err, Constants::$lastNameLength);
      return;
    }
  }
  
  private function validateEmails($email, $confirmEmail) {
    if ($email != $confirmEmail) {
      array_push($this->err, Constants::$emailsDoNotMatch);
      return;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      array_push($this->err, Constants::$invalidEmail);
      return;
    }

    // Todo: Check that username hasn't already being used
  }
  
  private function validatePasswords($password, $confirmPassword) {
    if ($password != $confirmPassword) {
      array_push($this->err, Constants::$passwordsDoNotEmail);
      return;
    }

    if (preg_match('/[^A-Za-z0-9]/', $password)) {
      array_push($this->err, Constants::$passwordNotAlpha);
      return;
    }

    if (strlen($password) > 30 || strlen($password) < 5) {
      array_push($this->err, Constants::$passwordLength);
      return;
    }
  }

}

?>
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
  }

  private function validateUsername($input) {
    if (strlen($input) > 25 || strlen($input) < 5) {
      array_push($this->err, "Your username must be between 5 and 25 characters.");
      return;
    }

    // Todo: Check if username exists
  }
  
  private function validateFirstName($input) {
    if (strlen($input) > 25 || strlen($input) < 5) {
      array_push($this->err, "Your first name must be between 5 and 25 characters.");
      return;
    }
  }
  
  private function validateLastName($input) {
    if (strlen($input) > 25 || strlen($input) < 5) {
      array_push($this->err, "Your last name must be between 5 and 25 characters.");
      return;
    }
  }
  
  private function validateEmails($email, $confirmEmail) {
    if ($email != $confirmEmail) {
      array_push($this->err, "Your emails don't match.");
      return;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      array_push($this->err, "Invalid email.");
      return;
    }

    // Todo: Check that username hasn't already being used
  }
  
  private function validatePasswords($password, $confirmPassword) {
  
  }

}

?>
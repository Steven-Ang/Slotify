<?php

class Account {
  
  public function __construct() {

  }

  public function register() {
    $this->validateUsername($username);
    $this->validateFirstName($firstName);
    $this->validateLastName($lastName);
    $this->validateEmails($email, $confirmEmail);
    $this->validatePasswords($password, $confirmPassword);
  }

  private function validateUsername($input) {
    echo "username function called";
  }
  
  private function validateFirstName($input) {
  
  }
  
  private function validateLastName($input) {
  
  }
  
  private function validateEmails($email, $confirmEmail) {
  
  }
  
  private function validatePasswords($password, $confirmPassword) {
  
  }

}

?>
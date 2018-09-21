<?php

class Account {

  private $con;

  private $err;
  
  public function __construct($con) {
    $this->con = $con;
    $this->err = [];
  }

  public function login($username, $password) {
    $password = md5($password);

    $query = mysqli_query($this->con, "SELECT * FROM users where username='$username' AND password='$password'");

    if (mysqli_num_rows($query) === 1) {
      return true;
    } else {
      array_push($this->err, Constants::$loginFailed);
      return false;
    }
  }

  public function register($username, $firstName, $lastName, $email, $confirmEmail, $password, $confirmPassword) {
    $this->validateUsername($username);
    $this->validateFirstName($firstName);
    $this->validateLastName($lastName);
    $this->validateEmails($email, $confirmEmail);
    $this->validatePasswords($password, $confirmPassword);

    if (empty($this->err)) {
      // Insert into database
      return $this->addUser($username, $firstName, $lastName, $email, $password);
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

  private function addUser($username, $firstName, $lastName, $email, $password) {
    $encryptedPw = md5($password);
    $profilePic = "assets/images/profile-pics/Default.jpg";
    $date = date("Y-m-d");

    $result = mysqli_query($this->con, "INSERT INTO users VALUES (NULL, '$username', '$firstName', '$lastName', '$email', '$encryptedPw', '$date', '$profilePic')");

    return $result;
  }

  private function validateUsername($input) {
    if (strlen($input) > 25 || strlen($input) < 5) {
      array_push($this->err, Constants::$usernameLength);
      return;
    }

    // Todo: Check if username exists
    $checkUsername = mysqli_query($this->con, "SELECT username FROM users WHERE username='$input'");
    if (mysqli_num_rows($checkUsername) != 0) {
      array_push($this->err, Constants::$usernameTaken);
      return;
    }
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
    $checkEmail = mysqli_query($this->con, "SELECT email FROM users WHERE email='$email'");
    if (mysqli_num_rows($checkEmail) != 0) {
      array_push($this->err, Constants::$emailTaken);
      return;
    }
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
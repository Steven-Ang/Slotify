<?php
include("inc/includedFiles.php");
?>

<div class="userDetails">
  <div class="user-container">

    <div class="email-container">
      <h4>Email</h4>
      <input type="text" class="email" name="email" placeholder="Email Address" value="<?php echo $userLoggedIn->getEmail(); ?>">
      <span class="message"></span>
      <button class="button" style="display: block; margin: 15px auto;" onclick="updateEmail('email')">Save</button>
    </div>

    <div class="password-container">
      <h4>Password</h4>
      <input type="password" class="oldPassword" name="oldPassword" placeholder="Current Password">
      <input type="password" class="newPassword" name="newPassword" placeholder="New Password">
      <input type="password" class="confirmNewPassword" name="confirmNewPassword" placeholder="Confirm New Password">
      <span class="message"></span>
      <button class="button" style="display: block; margin: 15px auto;" onclick="updatePassword('oldPassword', 'newPassword', 'confirmNewPassword')">Save</button>
    </div>
    
  </div>
</div>
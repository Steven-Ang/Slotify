<?php
include("inc/includedFiles.php");
?>

<div class="entityInfo">
  <div class="centerSection">
    <div class="userInfo">
      <h2><?php echo $userLoggedIn->getFullName() ?></h2>
    </div>
    <button class="button" style="display: block; margin: 15px auto;">User Details</button>
    <button class="button" style="display: block; margin: 15px auto;">Logout</button>
  </div>
</div>
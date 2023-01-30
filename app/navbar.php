<?php 

session_start();
$role = @$_SESSION ['user_data'] ['admin'];

?>

<div class="left">
  <h1>#</h1>
  <img class="" src="" alt="none">
</div>

<div class="right">
  <ul>
    <?php if ( $role ) { ?>
      <li>
        <a href="#">Console</a>
      </li>
    <?php } ?>
    <li>
      <a href="classifications.php">Classifications</a>
    </li>
  </ul>
  
  <div class="action">
    <div class="profile" onclick="menuToggle();">
      <img src="../img/images (1).jpeg" alt="">
    </div>
    <div class="menu">
      <!-- <h3>Some Famous<br><span>Website Designer</span></h3> -->
      <ul>
        <li><i class="fa-solid fa-user"></i><a>My Profile</a></li>
        <li><i class="fa-solid fa-right-from-bracket"></i><a href="../scripts/php/logoutAction.php">Logout</a></li>
      </ul>
    </div>
  </div>
</div>
<?php
session_start();
if(!isset($_SESSION["user"])){
  $_SESSION['message'] = "You must log in to continue";
  header('location: login.php');
}
?>
<!DOCTYPE html>
<?php  include("./_header.php") ?>
<body>
  <div id="main-container">
    <?php include("./_top_nav.php") ?>
    <?php include("./_left_nav.php") ?>
    <div id="content-area">
      <?php include("./_technologies.php")?>
    </div>
    <!-- End Content Area -->
  </div>
</body>
</html>
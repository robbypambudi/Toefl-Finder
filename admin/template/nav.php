<nav  class="navbar" style="background-color: #e3f2fd;">
  <div class="container ">
    <a class="navbar-brand" href="./index.php">TEST FINDER</a>
    <p class="navbar-text">
      <?php 
      if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
      ?>
      <!-- Logout -->
      <a href="../logout.php" type="button" class="btn btn-danger text-white">Logout</a>
      <?php } else { ?>
      <!-- Login -->
      <a href="./login.php" type="button" class="btn btn-success">Login</a>
      <?php } ?>
      
     

  </div>
</nav>
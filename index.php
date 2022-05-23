<?php 
session_start();
include "db_conn.php";

// Apakah USer Sudah Login APa Belum
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) { // Session Itu sudah terbentuk atau belum
	header("Location: ./admin/index.php"); // Header = Redirect ke halaman admin
}
else {
?>
<!-- Kalau Belum Login Maka Login DUlu di HTML INI -->

<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="login.php" method="post">
     	<h2>LOGIN</h2>
		 <!-- Kalau ada pesan Error Nanti ditampilin lewat Fungsi ini -->
     	<?php if (isset($_GET['error'])) { ?> 
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
		<!-- Logo -->
		<div  class="text-center">
			<img src="logo.png" alt="logo" class="rounded" >
		</div>
		<!-- Form -->
     	<label>User Name</label>
     	<input type="text" name="uname" placeholder="User Name"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit">Login</button>
          <a href="signup.php" class="ca">Create an account</a>
     </form>
</body>
</html>

<?php
}
?>
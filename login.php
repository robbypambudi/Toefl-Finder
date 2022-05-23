<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) { // Apakah uname dan password kosong atau tidak

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	} // Mengantisipasi adanya Hacker

	$uname = validate($_POST['uname']); // Mengambil username dan dimasukan kedalam Variable $uname
	$pass = validate($_POST['password']);

	if (empty($uname)) { // Apakah username kosong atau tidak
		header("Location: index.php?error=User Name is required"); 
	    exit();
	}else if(empty($pass)){ // Apakah password kosong atau tidak
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		// hashing the password
        $pass = md5($pass);

        
		// Query untuk mencari username dan password yang sesuai
		$sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";
		$result = mysqli_query($conn, $sql);
		// Mempunyai niali 2 sama kaya databse

		if (mysqli_num_rows($result) === 1) { // Cek apakah ada data yang sama dengan database atau tidak
			$row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $uname && $row['password'] === $pass) {
            	$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['id'] = $row['id'];
            	header("Location: ./admin/index.php"); // Masuk kedalam admin
		        exit();
            }else{ // Kalau tidak sama di redirect ke index.php
				header("Location: index.php?error=Incorect User name or password");
		        exit();
			}
		}else{ // Kalau tidak sama di redirect ke index.php
			header("Location: index.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: index.php"); // Diarakan ke index.php
	exit();
}
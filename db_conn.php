<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "test_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

if (!$conn) {
	echo "Connection failed!";
}
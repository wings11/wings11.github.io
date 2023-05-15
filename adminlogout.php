<?php
	session_start();
	unset($_SESSION['AdminID']);
	unset($_SESSION['loggedIn']);
	unset($_SESSION['adminFirstName']);
	unset($_SESSION['adminLastName']);
	
	header("Location:AdminLogin.php");
 ?>

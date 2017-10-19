<?php
	session_start(); 
	$user_name = "Welcome, Guest!";
	$is_admin = false;
	
	if (isset($_SESSION['RoleID'])) {
		$user_name = 'Hello, ' . $_SESSION['UserName'] . "!";
		
		if(isset($_SESSION['RoleID']) && $_SESSION['RoleID'] == 1) {
			$is_admin = true;
		}
	}		
?>
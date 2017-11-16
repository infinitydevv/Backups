<?php
	function isLoggedIn(){
    	if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true){
       		return false;
    	}
    	return true;
	}
?>
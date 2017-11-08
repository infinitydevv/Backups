<?php
	function isLoggedInCli(){
    	if (!isset($_SESSION['logged_in_cli']) || $_SESSION['logged_in_cli'] !== true){
       		return false;
    	}
    	return true;
	}
	function validMail($email){
		if(preg_match('/^[a-z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9_\.\-]+\.[a-z]{2,4}$/',$email)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
?>
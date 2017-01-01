<?php
session_start();

function loggedin() {
	if(isset($_SESSION['customer_name'])) {
		return true;
	}
	else {
		return false;
	}
}
?>
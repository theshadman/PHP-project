<?php
include 'connection.php';
include 'loginFunction.php';

session_destroy();
header('location: index.php');
?>
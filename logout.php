<?php 

session_start();

unset($_SESSION['username']);
header('Refresh:0; url=./index.php');

?>
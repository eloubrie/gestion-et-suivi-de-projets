<?php
session_start();
unset($_SESSION['pseudo']);
session_destroy();
header('location: index.php');
?>
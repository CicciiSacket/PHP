<?php
require_once 'ManageDB.php';
$mysqli = connectDB('localhost','root','root');
useDB($mysqli,'Esame');
session_start();
$_SESSION['userID']; 



echo "POOOOOOOO";

logout($mysqli);

?>
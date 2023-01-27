<?php 
session_start();
if(empty($_SESSION['id'])){
$id_session=" ";
$login=" ";
}
else{
$id_session=$_SESSION['id'];
$login=$_SESSION['login'];	
}
?>

<?php
session_start();
if(!isset($_SESSION["Usuario"])){
   header("Location: ../Form/login.php");
}
?>
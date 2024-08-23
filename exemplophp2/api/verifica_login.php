<?php
session_start(); // Inicie a sessão

if(!isset($_SESSION['email'])) {
    header('Location: index.php');
    exit();
}
?>

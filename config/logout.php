<?php 
session_start();

if(isset($_SESSION['user'])){
    session_unset();
    session_destroy();
}

if(isset($_SESSION['admin'])){
    session_unset();
    session_destroy();
}

session_destroy();

header('location: ../');
?>
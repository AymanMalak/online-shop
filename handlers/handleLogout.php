<?php

session_start();
session_unset();
session_destroy();

if (!isset($_SESSION['id'])) {
    header('location:../login.php');
    die();
}
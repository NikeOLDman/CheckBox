<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("LOCATION: /login.php?ref=" . $_SERVER['REQUEST_URI']);
    exit;
}

<?
session_start();
if (!isset($_SESSION['user'])) {
    header("LOCATION: login.php?ref=" . $_SERVER['REQUEST_URI']);
    exit;
}

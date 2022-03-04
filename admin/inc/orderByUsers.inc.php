<?php
require "../../inc/lib.inc.php";
require "../../inc/config.inc.php";
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $ref = $_GET['ref'];
    switch ($_GET['orderByUsers']) {
        case 'uname':
            changeSettings('orderByUsers', 'uname');
            break;
        case 'login':
            changeSettings('orderByUsers', 'login');
            break;
        case 'daytime':
            changeSettings('orderByUsers', 'daytime');
            break;
    }
    header("Location: $ref");
}

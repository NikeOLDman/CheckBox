<?php
require "../../inc/lib.inc.php";
require "../../inc/config.inc.php";
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $ref = $_GET['ref'];
    switch ($_GET['filterUsers']) {
        case 'all':
            changeSettings('filterUsers', 'all');
            break;
        case 'active':
            changeSettings('filterUsers', 'active');
            break;
        case 'deleted':
            changeSettings('filterUsers', 'deleted');
            break;
    }
    header("Location: $ref");
}

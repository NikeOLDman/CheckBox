<?php
require "../../inc/lib.inc.php";
require "../../inc/config.inc.php";
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $ref = $_GET['ref'];
    switch ($_GET['orderByTasks']) {
        case 'title':
            changeSettings('orderByTasks', 'title');
            break;
        case 'daytime':
            changeSettings('orderByTasks', 'daytime');
            break;
        case 'deadline':
            changeSettings('orderByTasks', 'deadline');
            break;
    }
    header("Location: $ref");
}

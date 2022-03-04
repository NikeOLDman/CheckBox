<?php
require "../../inc/lib.inc.php";
require "../../inc/config.inc.php";
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $ref = $_GET['ref'];
    switch ($_GET['filterTasks']) {
        case 'all':
            changeSettings('filterTasks', 'all');
            break;
        case 'active':
            changeSettings('filterTasks', 'active');
            break;
        case 'checked':
            changeSettings('filterTasks', 'checked');
            break;
    }
    header("Location: $ref");
}

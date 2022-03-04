<?php
if ($_SESSION['admin'] == true && $_SESSION['editableUserID'] != NULL) $uid = clearInt($_SESSION['editableUserID']);
else
    $uid = clearInt($_SESSION['user']);
$id = (int)($_GET['id']);
$check = (int)($_GET['check']);
$ref = trim(strip_tags($_GET['ref']));

if (!checkTask($id, $uid, $check, $ref)) trigger_error(ERR_ON_CHECK_TASK, E_USER_NOTICE);

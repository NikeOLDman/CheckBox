<?php
require "../secure/admsession.inc.php";
$_SESSION['editableUserID'] = trim(strip_tags($_GET['id']));
$_SESSION['editableUserName'] = trim(strip_tags($_GET['uname']));
header('Location: ../admincheckbox.php');

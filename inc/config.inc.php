<?php
error_reporting(0);
const
    DB_HOST = 'localhost',
    DB_LOGIN = 'root',
    DB_PASSWORD = '',
    DB_NAME = 'checkbox';

$usersCount = 0;
$tasksCount = 0;
$deadlineCount = 0;
$settings = [];

$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);
if (!$link) {
    trigger_error(ERR_ON_BD_CONNECT, E_USER_ERROR);
    die;
}

settingsInit();

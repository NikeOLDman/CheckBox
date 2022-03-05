<?php

// Обработчик ошибок
const
    ERR_ON_BD_CONNECT = 'Невозможно подключиться к базе данных',
    ERR_ON_CREATE_USER_NULLFIELD = 'В процессе регистрации пользователя заполнены не все поля',
    ERR_ON_CREATE_USER_USEREXISTS = 'Пользователь с таким именем уже существует. Выберите другое имя.',
    ERR_ON_CREATE_USER_ERROR = 'В процессе создания учетной записи произошла ошибка',
    ERR_ON_CREATE_USER_CREATE = 'Пользователь успешно создан!',
    ERR_ON_DELETE_USER = 'Удалить пользователя не удалось',
    ERR_ON_RECOVER_USER = 'Восстановить пользователя не удалось',
    ERR_ON_CHANGE_USER_LOAD = 'Не удалось загрузить данные пользователя',
    ERR_ON_CHANGE_USER = 'Не удалось изменить данные пользователя',
    ERR_ON_LOGIN_USER = 'Неправильное имя пользователя или пароль!',
    ERR_ON_LOGIN_USER_FIELD = 'Заполнены не все поля!',
    ERR_ON_CREATE_TASK_FIELD = 'Заполнены не все поля!',
    ERR_ON_CREATE_TASK = 'Не удалось создать задачу',
    ERR_ON_CHECK_TASK = 'Не удалось чекнуть задачу',
    ERR_ON_DELETE_TASK = 'Не удалось удалить задачу',
    ERR_ON_CHANGE_TASK_LOAD = 'Не удалось загрузить данные задачи',
    ERR_ON_CHANGE_TASK = 'Не удалось изменить данные задачи',
    ERR_ON_USER_DELITED = 'Пользователь удален';

function myError($no, $msg, $file, $line)
{
    $dt = date("d-m-Y H:i:s");
    $str = "[$dt] - $msg in $file:$line\n";
    switch ($no) {
        case E_USER_ERROR:
        case E_USER_WARNING:
        case E_USER_NOTICE:
            echo "<div class='header__error'>" . $msg . "</div>";
    }
    error_log("$str", 3, "error.log");
};


// Очистка запросов SQL
function clearStr($data)
{
    return mysqli_real_escape_string($GLOBALS['link'], strip_tags(trim($data)));
}

function clearInt($data)
{
    return (int)(trim($data));
}


// Сохранение настроек в Куки

function saveSettings()
{
    global $settings;
    $settings = base64_encode(serialize($settings));
    setcookie('settings', $settings, 0x7FFFFFFF, '/');
}

function settingsInit()
{
    global $settings;
    if (!isset($_COOKIE['settings'])) {
        $settings = [
            'id' => uniqid(),
            'filterUsers' => 'all',
            'orderByUsers' => 'daytime',
            'filterTasks' => 'all',
            'orderByTasks' => 'daytime',
        ];
        saveSettings();
    } else {
        $settings = unserialize(base64_decode($_COOKIE['settings']));
    }
}

function changeSettings($param, $data)
{
    global $settings;
    $settings[$param] = $data;
    saveSettings();
}


// Обработчик всплывающих окон
function admpopup($popuptask = NULL)
{
    switch ($popuptask) {
        case NULL:
            break;
        case 'create':
            include "../inc/create.inc.php";
            break;
        case 'delete':
            include "../inc/delete.inc.php";
            break;
        case 'change':
            include "../inc/changetask.inc.php";
            break;
        case 'checktask':
            include "../inc/checktask.inc.php";
            break;
        case 'createuser':
            include "secure/createuser.php";
            break;
        case 'changeuser':
            include "secure/changeuser.php";
            break;
        case 'deleteuser':
            include "secure/deleteuser.php";
            break;
        case 'recoveruser':
            include "secure/recoveruser.php";
            break;
    }
}

function mainpopup($popuptask = NULL)
{
    switch ($popuptask) {
        case NULL:
            break;
        case 'create':
            include "inc/create.inc.php";
            break;
        case 'delete':
            include "inc/delete.inc.php";
            break;
        case 'change':
            include "inc/changetask.inc.php";
            break;
        case 'checktask':
            include "inc/checktask.inc.php";
            break;
    }
}

// Работа с разделом AdminUsers
function selectAllUsers($filter = 'all', $orderByUsers = 'daytime')
{
    $str = "ORDER BY $orderByUsers";
    switch ($filter) {
        case 'all':
            $sql = "SELECT id, uname, login, daytime, deleted, adm FROM users $str ASC";
            break;
        case 'active':
            $sql = "SELECT id, uname, login, daytime, deleted, adm FROM users WHERE deleted = '0' $str ASC";
            break;
        case 'deleted':
            $sql = "SELECT id, uname, login, daytime, deleted, adm FROM users WHERE deleted = '1' $str ASC";
            break;
    }
    if (!$result = mysqli_query($GLOBALS['link'], $sql))
        return false;
    $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    return $items;
}

function usersCount()
{
    $sql = "SELECT COUNT(*) FROM users";
    if (!$result = mysqli_query($GLOBALS['link'], $sql))
        return '0';
    $count = mysqli_fetch_row($result);
    mysqli_free_result($result);
    return $count[0];
}


//Работа с разделом CheckTable
function createTask($uid, $title, $description = NULL, $daytime, $deadline)
{
    $sql = 'INSERT INTO tasks (uid, title, description, daytime, deadline) VALUES (?, ?, ?, ?, ?)';
    if (!$stmt = mysqli_prepare($GLOBALS['link'], $sql))
        return false;
    mysqli_stmt_bind_param($stmt, 'issii', $uid, $title, $description, $daytime, $deadline);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
}

function selectAllTasks($currentUser, $filter = 'all', $orderByTasks = 'daytime')
{
    $str = "ORDER BY $orderByTasks";
    switch ($filter) {
        case 'all':
            $sql = "SELECT id, title, description, daytime, deadline, checked, deleted FROM tasks WHERE uid = $currentUser AND deleted != 1 $str ASC";
            break;
        case 'active':
            $sql = "SELECT id, title, description, daytime, deadline, checked, deleted FROM tasks WHERE uid = $currentUser AND deleted != 1 AND checked = 0 $str ASC";
            break;
        case 'checked':
            $sql = "SELECT id, title, description, daytime, deadline, checked, deleted FROM tasks WHERE uid = $currentUser AND deleted != 1 AND checked = 1 $str ASC";
            break;
    }

    if (!$result = mysqli_query($GLOBALS['link'], $sql))
        return false;
    $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    return $items;
}

function checkTask($id, $uid, $check, $ref)
{
    ($check == 0) ? $check = 1 : $check = 0;
    $sql = "UPDATE tasks SET checked = '$check' WHERE uid = $uid AND id = $id";
    if (!mysqli_query($GLOBALS['link'], $sql)) return false;
    header("Location: $ref");
    return true;
}

function deleteTask($id, $uid, $ref)
{
    $sql = "UPDATE tasks SET deleted = 1 WHERE uid = $uid AND id = $id";
    if (!mysqli_query($GLOBALS['link'], $sql)) return false;
    header("Location: $ref");
    return true;
}

function taskData($id, $uid)
{
    $sql = "SELECT title, description, deadline FROM tasks WHERE uid = '$uid' AND id = $id";
    if (!$result = mysqli_query($GLOBALS['link'], $sql)) return false;
    $item = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $item;
}

function changeTask($id, $uid, $ref, $title = NULL, $description = NULL, $deadline = NULL)
{
    echo "$id, $uid, $ref, $title, $description, $deadline";
    $str = '';
    ($title) ? $str .= "title = '$title'" : $str;
    ($description) ? $str .= ", description = '$description'" : $str;
    ($deadline) ? $str .= ", deadline = '$deadline'" : $str;
    $sql = "UPDATE tasks SET $str WHERE uid = $uid AND id = $id";
    if (!mysqli_query($GLOBALS['link'], $sql)) return false;
    header("Location: $ref");
    return true;
}

function tasksCount($uid)
{
    $sql = "SELECT COUNT(*) FROM tasks WHERE uid = $uid AND checked != 1 AND deleted != 1";
    if (!$result = mysqli_query($GLOBALS['link'], $sql))
        return '0';
    $count = mysqli_fetch_row($result);
    mysqli_free_result($result);
    return $count[0];
}

function tasksCountAll()
{
    $sql = "SELECT COUNT(*) FROM tasks WHERE checked != 1 AND deleted != 1";
    if (!$result = mysqli_query($GLOBALS['link'], $sql))
        return '0';
    $count = mysqli_fetch_row($result);
    mysqli_free_result($result);
    return $count[0];
}

function deadlineCount($uid)
{
    $currentTime = time();
    $sql = "SELECT COUNT(*) FROM tasks WHERE uid = $uid AND ((deadline - $currentTime) < 172800) AND checked != 1 AND deleted != 1";
    if (!$result = mysqli_query($GLOBALS['link'], $sql))
        return '0';
    $count = mysqli_fetch_row($result);
    mysqli_free_result($result);
    return $count[0];
}

function deadlineCountAll()
{
    $currentTime = time();
    $sql = "SELECT COUNT(*) FROM tasks WHERE ((deadline - $currentTime) < 172800) AND checked != 1 AND deleted != 1";
    if (!$result = mysqli_query($GLOBALS['link'], $sql))
        return '0';
    $count = mysqli_fetch_row($result);
    mysqli_free_result($result);
    return $count[0];
}

function deletedUser($uid)
{
    $sql = "SELECT deleted FROM users WHERE id = $uid";
    if (!$result = mysqli_query($GLOBALS['link'], $sql))
        return '0';
    $item = mysqli_fetch_row($result);
    mysqli_free_result($result);
    return $item[0];
}

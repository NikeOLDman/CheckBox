<?php

function getHash($password)
{
    $hash = password_hash($password, PASSWORD_BCRYPT);
    return trim($hash);
}

function checkHash($password, $hash)
{
    return password_verify(trim($password), trim($hash));
}

function saveUser($login, $hash, $uname)
{
    $daytime = time();
    $sql = 'INSERT INTO users (login, pw, uname, daytime) VALUES (?, ?, ?, ?)';
    if (!$stmt = mysqli_prepare($GLOBALS['link'], $sql))
        return false;
    mysqli_stmt_bind_param($stmt, 'sssi', $login, $hash, $uname, $daytime);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
}

function userExists($login)
{
    $sql = "SELECT id, login, pw, adm, uname, deleted FROM users WHERE login = '$login'";
    if (!$result = mysqli_query($GLOBALS['link'], $sql)) return false;
    $userExists = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $userExists;
}

function deleteUser($uid, $ref)
{
    $sql = "UPDATE users SET deleted = 1 WHERE id = $uid";
    if (!mysqli_query($GLOBALS['link'], $sql)) return false;
    header("Location: $ref");
    return true;
}

function recoverUser($uid, $ref)
{
    $sql = "UPDATE users SET deleted = 0 WHERE id = $uid";
    if (!mysqli_query($GLOBALS['link'], $sql)) return false;
    header("Location: $ref");
    return true;
}

function userData($uid)
{
    $sql = "SELECT login, uname, adm FROM users WHERE id = '$uid'";
    if (!$result = mysqli_query($GLOBALS['link'], $sql)) return false;
    $item = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $item;
}

function changeUser($uid, $ref, $login = NULL, $pw = NULL, $fio = NULL, $adm = NULL)
{
    $str = '';
    ($login) ? $str .= "login = '$login'" : $str;
    ($pw) ? $str .= ", pw = '" . getHash($pw) . "'" : $str;
    ($fio) ? $str .= ", uname = '$fio'" : $str;
    ($adm == 'on') ? $str .= ", adm = '1'" : $str .= ", adm = '0'";
    $sql = "UPDATE users SET $str WHERE id = $uid";
    if (!mysqli_query($GLOBALS['link'], $sql)) return false;
    header("Location: $ref");
    return true;
}

function logOut()
{
    session_destroy();
    header('Location: /login.php');
}

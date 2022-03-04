<?php
require "admin/secure/secure.inc.php";
require "inc/lib.inc.php";
set_error_handler("myError");
require "inc/config.inc.php";
$title = 'Авторизация';
$login  = '';
session_start();
header("HTTP/1.1 401 Unauthorized");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $login = trim(strip_tags($_POST['login']));
    $pw = trim(strip_tags($_POST['pw']));
    $ref = trim(strip_tags($_GET['ref']));
    if (!$ref)
        $ref = 'index.php';
    if ($login && $pw) {
        if ($result = userExists($login)) {
            if ($result['deleted'] == 0) {
                $hash = trim($result['pw']);
                if (checkHash($pw, $hash)) {
                    $_SESSION['user'] = $result['id'];
                    $_SESSION['currentuser'] = $result['uname'];
                    if ($result['adm'] == 1) $_SESSION['admin'] = true;
                    header("Location: $ref");
                    exit;
                } else {
                    trigger_error(ERR_ON_LOGIN_USER, E_USER_NOTICE);
                }
            } else trigger_error(ERR_ON_USER_DELITED, E_USER_NOTICE);
        } else {
            trigger_error(ERR_ON_LOGIN_USER, E_USER_NOTICE);
        }
    } else {
        trigger_error(ERR_ON_LOGIN_USER_FIELD, E_USER_NOTICE);
    }
}
?>

<!DOCTYPE html>
<html lang="ru-RU">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="../../css/main.css">
    <script src="js/modernizr-custom.js"></script>
</head>

<body>
    <div class="wrapper">
        <div class="maincontent">
            <div class="mainpopup-wrapper">
                <div class="mainpopup-left"></div>
                <div class="mainpopup-right">
                    <div class="mainpopup">
                        <div class="mainpopup__header">АВТОРИЗАЦИЯ_</div>
                        <div class="mainpopup__form">
                            <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
                                <div class="mainpopup__input">
                                    <label for="txtUser" class="mainpopup__title">LOGIN</label>
                                    <input id="txtUser" required type="text" name="login" class="mainpopup__descr" value="<?= $login ?>" />
                                </div>
                                <div class="mainpopup__input">
                                    <label for="txtString" class="mainpopup__title">PASS</label>
                                    <input id="txtString" required class="mainpopup__descr" type="password" name="pw" />
                                </div>
                                <div class="mainpopup__buttons">
                                    <div class="mainpopup__otherbutton">
                                        <a href="register.php?ref=<?= $_SERVER['REQUEST_URI'] ?>" class="mainpopup__link">РЕГИСТРАЦИЯ</a>
                                    </div>
                                    <div class="mainpopup__button">
                                        <button type="submit" class="mainpopup__submit">ВХОД</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
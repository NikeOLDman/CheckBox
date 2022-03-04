<?php
$login = NULL;
$password = NULL;
$uname = NULL;
$ref = trim(strip_tags($_GET['ref']));
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = clearStr($_POST['login']);
    $password = clearStr($_POST['pw']);
    $uname = clearStr($_POST['uname']);
    if ($login) {
        if (!userExists($login)) {
            $hash = getHash($password);
            if (saveUser($login, $hash, $uname)) {
                trigger_error(ERR_ON_CREATE_USER_CREATE, E_USER_NOTICE);
                if (!$ref) header("Location: /admin/secure/login.php");
                else header("Location: $ref");
            } else trigger_error(ERR_ON_CREATE_USER_ERROR, E_USER_NOTICE);
        } else trigger_error(ERR_ON_CREATE_USER_USEREXISTS, E_USER_NOTICE);
    } else trigger_error(ERR_ON_CREATE_USER_NULLFIELD, E_USER_NOTICE);
}
?>
<div class="blockscreen"></div>
<div class="mainpopup-wrapper">
    <div class="mainpopup-left"></div>
    <div class="mainpopup-right">
        <div class="mainpopup">
            <div class="mainpopup__header">Регистрация_</div>
            <div class="mainpopup__form">
                <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
                    <div class="mainpopup__input">
                        <label for="txtUser" class="mainpopup__title">LOGIN</label>
                        <input id="txtUser" required type="text" name="login" class="mainpopup__descr" />
                    </div>
                    <div class="mainpopup__input">
                        <label for="txtString" class="mainpopup__title">PASS</label>
                        <input id="txtString" required class="mainpopup__descr" type="password" name="pw" />
                    </div>
                    <div class="mainpopup__input">
                        <label for="txtUname" class="mainpopup__title">Name</label>
                        <input id="txtUname" required type="text" name="uname" class="mainpopup__descr" />
                    </div>
                    <div class="mainpopup__buttons">
                        <div class="mainpopup__otherbutton">
                            <a href="<?php if ($ref) echo $ref;
                                        else echo $_SERVER['HTTP_REFERER']; ?>" class="mainpopup__link">ОТМЕНА</a>
                        </div>
                        <div class="mainpopup__button">
                            <button type="submit" class="mainpopup__submit">OK</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
if ($_SESSION['admin'] == true && $_SESSION['editableUserID'] != NULL) $uid = clearInt($_SESSION['editableUserID']);
else $uid = (int)($_GET['uid']);
$ref = trim(strip_tags($_GET['ref']));
if (!$result = userData($uid)) trigger_error(ERR_ON_CHANGE_USER_LOAD, E_USER_NOTICE);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!changeUser($uid, $ref, clearStr($_POST['login']), clearStr($_POST['pw']), clearStr($_POST['fio']), clearStr($_POST['adm']))) trigger_error(ERR_ON_CHANGE_USER, E_USER_NOTICE);
}
?>

<div class="blockscreen"></div>
<div class="mainpopup-wrapper">
    <div class="mainpopup-left"></div>
    <div class="mainpopup-right">
        <div class="mainpopup">
            <div class="mainpopup__header">Изменить пользователя_</div>
            <div class="mainpopup__form">
                <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
                    <div class="mainpopup__input">
                        <label for="txtUser" class="mainpopup__title">LOGIN</label>
                        <input id="txtUser" type="text" name="login" class="mainpopup__descr" value="<?= $result['login'] ?>" />
                    </div>
                    <div class="mainpopup__input">
                        <label for="txtString" class="mainpopup__title">PASS</label>
                        <input id="txtString" class="mainpopup__descr" type="password" name="pw" />
                    </div>
                    <div class="mainpopup__input">
                        <label for="txtFio" class="mainpopup__title">Name</label>
                        <input id="txtFio" type="text" name="fio" class="mainpopup__descr" value="<?= $result['uname'] ?>" />
                    </div>
                    <div class="mainpopup__input">
                        <input id="txtAdm" type="checkbox" name="adm" class="mainpopup__descr mainpopup__descr-check" <?php ($result['adm'] == 1) ? print('checked') : print('') ?> />
                        <label for="txtAdm" class="mainpopup__title">ADM</label>

                    </div>
                    <div class="mainpopup__buttons">
                        <div class="mainpopup__otherbutton">
                            <a href="<?= $ref ?>" class="mainpopup__link">ОТМЕНА</a>
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
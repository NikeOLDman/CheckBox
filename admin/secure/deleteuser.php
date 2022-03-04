<?php
if ($_SESSION['admin'] == true && $_SESSION['editableUserID'] != NULL) $uid = clearInt($_SESSION['editableUserID']);
else $uid = (int)($_GET['uid']);
$ref = trim(strip_tags($_GET['ref']));

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!deleteUser($uid, $ref)) trigger_error(ERR_ON_DELETE_USER, E_USER_NOTICE);
}
?>
<div class="blockscreen"></div>
<div class="mainpopup-wrapper">
    <div class="mainpopup-left"></div>
    <div class="mainpopup-right">
        <div class="mainpopup">
            <div class="mainpopup__header">Одумайся_</div>
            <div class="mainpopup__form">
                <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
                    <div class="mainpopup__text">
                        Уверены, что хотите удалить пользователя?
                    </div>
                    <div class="mainpopup__buttons">
                        <div class="mainpopup__otherbutton">
                            <a href="<?= $ref ?>" class="mainpopup__link">ОТМЕНА</a>
                        </div>
                        <div class="mainpopup__button">
                            <button type="submit" class="mainpopup__submit">УДАЛИТЬ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
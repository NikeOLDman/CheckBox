<div class="userdisplay">
    <div class="userdisplay__title">ПОЛЬЗОВАТЕЛЬ:</div>
    <div class="userdisplay__name"><?= $_SESSION['editableUserName'] ?></div>
    <div class="userdisplay__func">
        <a href="<?= $_SERVER['REQUEST_URI'] ?>?popuptask=changeuser&uid=<?= $_SESSION['editableUserID'] ?>&ref=<?= $_SERVER['REQUEST_URI'] ?>" class="userdisplay__button">Изменить</a>

        <?php
        if (deletedUser($_SESSION['editableUserID']) == 1) {
        ?>
            <a href="<?= $_SERVER['REQUEST_URI'] ?>?popuptask=recoveruser&uid=<?= $_SESSION['editableUserID'] ?>&ref=<?= $_SERVER['REQUEST_URI'] ?>" class="userdisplay__button">Восстановить</a>
        <?php
        } else {
        ?>

            <a href="<?= $_SERVER['REQUEST_URI'] ?>?popuptask=deleteuser&uid=<?= $_SESSION['editableUserID'] ?>&ref=<?= $_SERVER['REQUEST_URI'] ?>" class="userdisplay__button">Удалить</a>
        <?php
        }
        ?>

        <!-- <a href="<?= $_SERVER['REQUEST_URI'] ?>?popuptask=deleteuser" class="userdisplay__button">Удалить</a> -->
    </div>
</div>
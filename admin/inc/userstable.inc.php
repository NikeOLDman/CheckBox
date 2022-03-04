<div class="checktable">

    <ul class="checktable__table">
        <li class="checktable__head">
            <div class="checktable__check usertable-fio"><a class="checktable__link" href="inc/orderByUsers.inc.php?orderByUsers=uname&ref=<?= $_SERVER['REQUEST_URI'] ?>">ФИО</a></div>
            <div class="checktable__task usertable-login"><a class="checktable__link" href="inc/orderByUsers.inc.php?orderByUsers=login&ref=<?= $_SERVER['REQUEST_URI'] ?>">Логин</a></div>
            <div class="checktable__create usertable-create"><a class="checktable__link" href="inc/orderByUsers.inc.php?orderByUsers=daytime&ref=<?= $_SERVER['REQUEST_URI'] ?>">Создан</a></div>
            <div class="checktable__deadline usertable-deleted">Удален</div>
            <div class="checktable__func"> </div>
        </li>
        <?php
        foreach ($allUsers as $item) {
            if ($item['deleted'] == true) $deletedUser = "checktable__row-deleted";
            else $deletedUser = '';
            if ($item['adm'] == true) $admUser = "checktable__row-red";
            else $admUser = '';
        ?>
            <li class="checktable__row <?php
                                        echo $admUser;
                                        echo $deletedUser;
                                        ?>">
                <div class="checktable__check usertable-fio">
                    <div class="checktable__title">
                        <a href="inc/editableUser.inc.php?id=<?= $item['id'] ?>&uname=<?= $item['uname'] ?>" class="checktable__link"><?php echo "(" . tasksCount($item['id']) . ") " . $item['uname'] ?>
                        </a>
                    </div>
                </div>
                <div class="checktable__task usertable-login">
                    <?= $item['login'] ?>
                </div>
                <div class="checktable__create usertable-create"><?= date('d-m-Y', $item['daytime']) ?></div>
                <div class="checktable__deadline usertable-deleted"><?php ($item['deleted'] == true) ? print('ДА') : print('НЕТ') ?></div>
                <div class="checktable__func">
                    <div class="hamburger">
                        <a href="#" class="hamburger__link">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </a>
                    </div>
                    <ul class="funcmenu">
                        <li class="funcmenu__item">
                            <a href="<?= $_SERVER['REQUEST_URI'] ?>?popuptask=changeuser&uid=<?= $item['id'] ?>&ref=<?= $_SERVER['REQUEST_URI'] ?>" class="funcmenu__link">Изменить</a>
                        </li>
                        <li class="funcmenu__item">
                            <?php
                            if ($item['deleted'] == true) {
                            ?>
                                <a href="<?= $_SERVER['REQUEST_URI'] ?>?popuptask=recoveruser&uid=<?= $item['id'] ?>&ref=<?= $_SERVER['REQUEST_URI'] ?>" class="funcmenu__link">Восстановить</a>
                            <?php
                            } else {
                            ?>

                                <a href="<?= $_SERVER['REQUEST_URI'] ?>?popuptask=deleteuser&uid=<?= $item['id'] ?>&ref=<?= $_SERVER['REQUEST_URI'] ?>" class="funcmenu__link">Удалить</a>
                            <?php
                            }
                            ?>
                        </li>
                    </ul>
                </div>
            </li>
        <?php
        }
        ?>
    </ul>
</div>
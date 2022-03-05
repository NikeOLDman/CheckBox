<div class="checktable">

    <ul class="checktable__table">
        <li class="checktable__head">
            <div class="checktable__check">Чек</div>
            <div class="checktable__task"><a class="checktable__headtitle" href="inc/orderByTasks.inc.php?orderByTasks=title&ref=<?= $_SERVER['REQUEST_URI'] ?>">Задача</a></div>
            <div class="checktable__create"><a class="checktable__headtitle" href="inc/orderByTasks.inc.php?orderByTasks=daytime&ref=<?= $_SERVER['REQUEST_URI'] ?>">Создана</a></div>
            <div class="checktable__deadline"><a class="checktable__headtitle" href="inc/orderByTasks.inc.php?orderByTasks=deadline&ref=<?= $_SERVER['REQUEST_URI'] ?>">Deadline</a></div>
            <div class="checktable__func"> </div>
        </li>
        <?php
        foreach ($allTasks as $item) {
            if ($item['checked'] == true) $CheckedRow = "checktable__row-checked";
            elseif ((($item['deadline'] - time()) < 172800) && $item['checked'] != true) $CheckedRow = "checktable__row-red";
            else $CheckedRow = '';
        ?>
            <li class="checktable__row <?= $CheckedRow ?>">
                <div class="checktable__check">
                    <a href="<?= $_SERVER['REQUEST_URI'] ?>?popuptask=checktask&id=<?= $item['id'] ?>&check=<?= $item['checked'] ?>&ref=<?= $_SERVER['REQUEST_URI'] ?>" class="checkbutton">
                        <i class="fa fa-check" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="checktable__task">
                    <a href="#" class="checktable__link"><?= $item['title'] ?>
                        <div class="checktable__title">
                        </div>
                    </a>
                    <div class="checktable__description"><?= $item['description'] ?></div>
                </div>
                <div class="checktable__create"><?= date('d-m-Y', $item['daytime']) ?></div>
                <div class="checktable__deadline"><?= date('d-m-Y', $item['deadline']) ?></div>
                <div class="checktable__func">
                    <div class="hamburger">
                        <a href="#" class="hamburger__link">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </a>
                    </div>
                    <ul class="funcmenu">
                        <li class="funcmenu__item">
                            <a href="<?= $_SERVER['REQUEST_URI'] ?>?popuptask=change&id=<?= $item['id'] ?>&ref=<?= $_SERVER['REQUEST_URI'] ?>" class="funcmenu__link">Изменить</a>
                        </li>
                        <li class="funcmenu__item">
                            <a href="<?= $_SERVER['REQUEST_URI'] ?>?popuptask=delete&id=<?= $item['id'] ?>&ref=<?= $_SERVER['REQUEST_URI'] ?>" class="funcmenu__link">Удалить</a>
                        </li>
                    </ul>
                </div>
            </li>
        <?php
        }
        ?>
    </ul>
</div>
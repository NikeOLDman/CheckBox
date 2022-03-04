<header class="header">
    <div class="container">
        <div class="header__block">
            <div class="header__left">
                <div class="user">
                    <?= $_SESSION['currentuser'] ?>
                </div>
                <ul class="items-count">
                    <li class="items-count__item">
                        Активных задач: <a href="#" class="items-count__num"><?= tasksCount($_SESSION['user']) ?></a>
                    </li>
                    <li class="items-count__item">
                        Приближается Deadline: <a href="#" class="items-count__num"><?= deadlineCount($_SESSION['user']) ?></a>
                    </li>
                </ul>
            </div>
            <div class="header__right"><a href="<?= $_SERVER['REQUEST_URI'] ?>?logout" class="logout">LogOut</a></div>
        </div>
    </div>
</header>
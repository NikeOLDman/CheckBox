<header class="header">
    <div class="container">
        <div class="header__block">
            <div class="header__left">
                <div class="user">
                    Режим администратора - <?= $_SESSION['currentuser'] ?>
                </div>
                <ul class="items-count">
                    <li class="items-count__item">
                        Зарегистрировано пользователей: <a href="#" class="items-count__num"><?= usersCount() ?></a>
                    </li>
                    <li class="items-count__item">
                        Всего активных задач: <a href="#" class="items-count__num"><?= tasksCountAll() ?></a>
                    </li>
                    <li class="items-count__item">
                        Всего приближается Deadline: <a href="#" class="items-count__num"><?= deadlineCountAll() ?></a>
                    </li>
                </ul>
            </div>
            <div class="header__right"><a href="<?= $_SERVER['REQUEST_URI'] ?>?logout" class="logout">LogOut</a></div>
        </div>
    </div>
</header>
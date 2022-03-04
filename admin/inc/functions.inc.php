<div class="functions">
    <div class="functions__create">
        <a href="<?= $_SERVER['REQUEST_URI'] ?>?popuptask=create&ref=<?= $_SERVER['REQUEST_URI'] ?>" class="functions__button functions__button-blue">Создать</a>
    </div>
    <div class="functions__filter">
        <a href="inc/filterTasks.inc.php?filterTasks=all&ref=<?= $_SERVER['REQUEST_URI'] ?>" class="functions__button functions__button-grey <?php $settings['filterTasks'] == 'all' ? print('functions__button-greyactive') : '' ?>">Все</a>
        <a href="inc/filterTasks.inc.php?filterTasks=active&ref=<?= $_SERVER['REQUEST_URI'] ?>" class="functions__button functions__button-grey <?php $settings['filterTasks'] == 'active' ? print('functions__button-greyactive') : '' ?>">Актуальные</a>
        <a href="inc/filterTasks.inc.php?filterTasks=checked&ref=<?= $_SERVER['REQUEST_URI'] ?>" class="functions__button functions__button-grey <?php $settings['filterTasks'] == 'checked' ? print('functions__button-greyactive') : '' ?>">Закрытые</a>
    </div>
    <div class="functions__filter">
        <a href="adminusers.php" class="functions__button functions__button-grey functions__button-grey-back">К списку пользователей</a>
    </div>
</div>
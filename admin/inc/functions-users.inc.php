<div class="functions">
    <div class="functions__create">
        <a href="<?= $_SERVER['REQUEST_URI'] ?>?popuptask=createuser&ref=<?= $_SERVER['REQUEST_URI'] ?>" class="functions__button functions__button-blue">Создать</a>
    </div>
    <div class="functions__filter">
        <a href="inc/filterUsers.inc.php?filterUsers=all&ref=<?= $_SERVER['REQUEST_URI'] ?>" class="functions__button functions__button-grey <?php $settings['filterUsers'] == 'all' ? print('functions__button-greyactive') : '' ?>">Все</a>
        <a href="inc/filterUsers.inc.php?filterUsers=active&ref=<?= $_SERVER['REQUEST_URI'] ?>" class="functions__button functions__button-grey <?php $settings['filterUsers'] == 'active' ? print('functions__button-greyactive') : '' ?>">Актуальные</a>
        <a href="inc/filterUsers.inc.php?filterUsers=deleted&ref=<?= $_SERVER['REQUEST_URI'] ?>" class="functions__button functions__button-grey <?php $settings['filterUsers'] == 'deleted' ? print('functions__button-greyactive') : '' ?>">Удаленные</a>
    </div>
</div>
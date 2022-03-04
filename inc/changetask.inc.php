<?php
if ($_SESSION['admin'] == true && $_SESSION['editableUserID'] != NULL) $uid = clearInt($_SESSION['editableUserID']);
else $uid = (int)($_SESSION['user']);
$id = (int)($_GET['id']);
$ref = trim(strip_tags($_GET['ref']));
if (!$result = taskData($id, $uid)) trigger_error(ERR_ON_CHANGE_TASK_LOAD, E_USER_NOTICE);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!changeTask($id, $uid, $ref, clearStr($_POST['title']), clearStr($_POST['description']), strtotime($_POST['deadline']))) trigger_error(ERR_ON_CHANGE_TASK, E_USER_NOTICE);
}
?>

<div class="blockscreen"></div>
<div class="mainpopup-wrapper">
    <div class="mainpopup-left"></div>
    <div class="mainpopup-right">
        <div class="mainpopup">
            <div class="mainpopup__header">Изменить задачу_</div>
            <div class="mainpopup__form">
                <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
                    <div class="mainpopup__input mainpopup__input-create">
                        <label for="txtTitle" class="mainpopup__title create-item">Заголовок</label>
                        <input id="txtTitle" type="text" name="title" class="mainpopup__descr create-descr" required value="<?= $result['title'] ?>" />
                    </div>
                    <div class="mainpopup__input mainpopup__input-create">
                        <label for="txtDescr" class="mainpopup__title create-item create-item__textarea">Описание</label>
                        <textarea id="txtDescr" type="text" name="description" class="mainpopup__descr create-descr create-descr__textarea"><?= $result['description'] ?></textarea>
                    </div>
                    <div class="mainpopup__input mainpopup__input-create mainpopup__input-date">
                        <label for="txtDeadline" class="mainpopup__title create-item">Deadline</label>
                        <input id="txtDeadline" type="date" name="deadline" class="mainpopup__descr create-descr create-descr__date" value="<?= date('Y-m-d', $result['deadline']) ?>" />
                    </div>
                    <div class="mainpopup__buttons mainpopup__buttons-deadline">
                        <div class="mainpopup__button">
                            <button type="submit" class="mainpopup__submit">ИЗМЕНИТЬ</button>
                        </div>
                        <div class="mainpopup__otherbutton">
                            <a href="<?= $ref ?>" class="mainpopup__link">ОТМЕНА</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
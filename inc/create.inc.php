<?php
$taskTitle = NULL;
$taskDescr = NULL;
$taskDeadline = NULL;
$ref = trim(strip_tags($_GET['ref']));
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_SESSION['admin'] == true && $_SESSION['editableUserID'] != NULL) $uid = clearInt($_SESSION['editableUserID']);
    else $uid = clearInt($_SESSION['user']);
    $taskTitle = clearStr($_POST['title']);
    $taskDescr = clearStr($_POST['descriprion']);
    $daytime = clearInt(time());
    $taskDeadline = strtotime($_POST['deadline']);
    if ($taskTitle && $taskDeadline) {
        if (!createTask($uid, $taskTitle, $taskDescr, $daytime, $taskDeadline)) trigger_error(ERR_ON_CREATE_TASK, E_USER_NOTICE);
        else header("Location: $ref");
    } else trigger_error(ERR_ON_CREATE_TASK_FIELD, E_USER_NOTICE);
}
?>

<div class="blockscreen"></div>
<div class="mainpopup-wrapper">
    <div class="mainpopup-left"></div>
    <div class="mainpopup-right">
        <div class="mainpopup">
            <div class="mainpopup__header">Создать задачу_</div>
            <div class="mainpopup__form">
                <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="POST">
                    <div class="mainpopup__input mainpopup__input-create">
                        <label for="txtTitle" class="mainpopup__title create-item">Заголовок</label>
                        <input id="txtTitle" type="text" name="title" class="mainpopup__descr create-descr" required />
                    </div>
                    <div class="mainpopup__input mainpopup__input-create">
                        <label for="txtDescr" class="mainpopup__title create-item create-item__textarea">Описание</label>
                        <textarea id="txtDescr" required type="text" name="descriprion" class="mainpopup__descr create-descr create-descr__textarea"></textarea>
                    </div>
                    <div class="mainpopup__input mainpopup__input-create mainpopup__input-date">
                        <label for="txtDeadline" class="mainpopup__title create-item">Deadline</label>
                        <input id="txtDeadline" required type="date" name="deadline" class="mainpopup__descr create-descr create-descr__date" />
                    </div>
                    <div class="mainpopup__buttons mainpopup__buttons-deadline">
                        <div class="mainpopup__button">
                            <button type="submit" class="mainpopup__submit">СОЗДАТЬ</button>
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
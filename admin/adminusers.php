<?php
require "secure/admsession.inc.php";
require "../inc/lib.inc.php";
set_error_handler("myError");
require "../inc/config.inc.php";
require "secure/secure.inc.php";
$title = "Таблица пользователей";
$_SESSION['editableUserID'] = NULL;
(isset($_GET['popuptask'])) ?: $_GET['popuptask'] = '';
$allUsers = selectAllUsers($settings['filterUsers'], $settings['orderByUsers']);

if (isset($_GET['logout'])) {
    logOut();
}
?>

<!DOCTYPE html>
<html lang="ru-RU">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="../css/main.css">
    <script src="../js/modernizr-custom.js"></script>
</head>

<body>
    <?php admpopup($_GET['popuptask']); ?>
    <div class="wrapper">
        <div class="maincontent">

            <!-- /==================== header ====================\ -->
            <?php include "inc/header.inc.php" ?>

            <!-- /==================== page-content ====================\ -->

            <main class="page-content">
                <div class="container">
                    <!-- /==================== functions ====================\ -->
                    <?php include "inc/functions-users.inc.php" ?>

                    <!-- /==================== userstable ====================\ -->
                    <?php include "inc/userstable.inc.php" ?>
                </div>
            </main>
        </div>
    </div>


    <!-- /==================== Footer ====================\ -->
    <?php include "../inc/footer.inc.php" ?>
</body>

</html>
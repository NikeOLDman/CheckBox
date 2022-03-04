<?php
require "admin/secure/session.inc.php";
require "admin/secure/secure.inc.php";
require "inc/lib.inc.php";
set_error_handler("myError");
require "inc/config.inc.php";
$title = "Таблица пользователей";
$_SESSION['editableUserID'] = NULL;
$currentUser = clearInt($_SESSION['user']);
$allTasks = selectAllTasks($currentUser, $settings['filterTasks'], $settings['orderByTasks']);
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
    <title>Check-Box</title>
    <link rel="stylesheet" href="css/main.css">
    <script src="js/modernizr-custom.js"></script>
</head>

<body>
    <?php mainpopup($_GET['popuptask']); ?>
    <div class="wrapper">
        <div class="maincontent">

            <!-- /==================== header ====================\ -->
            <?php include "inc/header.inc.php" ?>

            <!-- /==================== page-content ====================\ -->

            <main class="page-content">
                <div class="container">
                    <!-- /==================== functions ====================\ -->
                    <?php include "inc/functions.inc.php" ?>

                    <!-- /==================== checktable ====================\ -->
                    <?php include "inc/checktable.inc.php" ?>
                </div>
            </main>

        </div>
    </div>


    <!-- /==================== Footer ====================\ -->
    <?php include "inc/footer.inc.php" ?>
    <script src=" js/script.js"></script>
</body>

</html>
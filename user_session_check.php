<?php
ini_set('max_execution_time', 0);
session_start();
if ($permissionNeeded <> '') {
    if (substr(md5($_SESSION['usercurrentlogintime'] + 77), 0, 8) != $_SESSION['userkey']) {
        $_SESSION = array();

        session_destroy();
        header('Location: ' . PAGES_URL . 'user_login.php');
        exit();
    }

    if (!$_SESSION['userrecord'][$permissionNeeded]) {
        header('Location: ' . PAGES_URL . 'home.php');
        StatusMessages::setStatus("You do not have rights to that function, please contact administrator");
    }
}
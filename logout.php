<?php require_once('../config.inc.php'); ?>
<?php

@session_start();
@session_destroy();
header('Location: ' . PAGES_URL . 'user_login.php?');
exit();
?>
<?php

require_once('../config.inc.php');
$permissionNeeded = '';
//require_once('../user_session_check.php');
require_once(CLASS_PATH . 'firearm.class.php');

$firearmObj = new Firearm();

if ($firearmObj->checkIfAnotherFirearmHasSameSerial($_POST) == true) {

    echo "<script type='text/javascript'>";
    echo "alert('Firearm with this serial number already exists!');";
    echo "location='" . PAGES_URL . "firearms.php';";
    echo "</script>";
}
else {

    $addQuery = $firearmObj->editFirearm($_POST);

    echo "<script type='text/javascript'>";
    echo "alert('Edit Successful');";
    echo "location='" . PAGES_URL . "firearms.php';";
    echo "</script>";
}
?>
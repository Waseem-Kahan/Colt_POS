<?php

require_once('../config.inc.php');
$permissionNeeded = '';
//require_once('../user_session_check.php');
require_once(CLASS_PATH . 'item.class.php');

$itemObj = new Item();

if ($itemObj->checkIfItemAlreadyPresent($_POST) == true) {

    echo "<script type='text/javascript'>";
    echo "alert('Item with this name or barcode already exists!');";
    echo "location='" . PAGES_URL . "items.php';";
    echo "</script>";
}
else {
    $addQuery = $itemObj->addItem($_POST);

    echo "<script type='text/javascript'>";
    echo "alert('Add Successful');";
    echo "location='" . PAGES_URL . "items.php';";
    echo "</script>";
}
?>
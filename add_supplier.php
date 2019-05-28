<?php

require_once('../config.inc.php');
$permissionNeeded = '';
//require_once('../user_session_check.php');
require_once(CLASS_PATH . 'supplier.class.php');

$supplierObj = new Supplier();

if ($supplierObj->checkIfSupplierAlreadyPresent($_POST) == true) {

    echo "<script type='text/javascript'>";
    echo "alert('Supplier with this name or code already exists!');";
    echo "location='" . PAGES_URL . "suppliers.php';";
    echo "</script>";
}
else {
$addQuery = $supplierObj->addSupplier($_POST);

    echo "<script type='text/javascript'>";
        echo "alert('Add Successful');";
        echo "location='" . PAGES_URL . "suppliers.php';";
    echo "</script>";
}
?>
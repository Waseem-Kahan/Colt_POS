<?php

require_once('../config.inc.php');
$permissionNeeded = '';
//require_once('../user_session_check.php');
require_once(CLASS_PATH . 'supplier.class.php');

$supplierObj = new Supplier();

$addQuery = $supplierObj->editSupplier($_POST);

echo "<script type='text/javascript'>";
echo "alert('Edit Successful');";
echo "location='" . PAGES_URL . "suppliers.php';";
echo "</script>";
?>
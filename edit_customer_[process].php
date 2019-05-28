<?php

require_once('../config.inc.php');
$permissionNeeded = '';
//require_once('../user_session_check.php');
require_once(CLASS_PATH . 'customer.class.php');

$customerObj = new Customer();

$addQuery = $customerObj->editCustomer($_POST);

echo "<script type='text/javascript'>";
echo "alert('Edit Successful');";
echo "location='" . PAGES_URL . "customers.php';";
echo "</script>";
?>
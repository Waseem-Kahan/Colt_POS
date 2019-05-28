<?php

require_once('../config.inc.php');
$permissionNeeded = '';
//require_once('../user_session_check.php');
require_once(CLASS_PATH . 'customer.class.php');

$customerObj = new Customer();

if ($customerObj->checkIfCustomerAlreadyPresent($_POST) == true) {

    echo "<script type='text/javascript'>";
    echo "alert('Customer with this ID number already exists!');";
    echo "location='" . PAGES_URL . "customers.php';";
    echo "</script>";
}
else {
$addQuery = $customerObj->addCustomer($_POST);

    echo "<script type='text/javascript'>";
        echo "alert('Add Successful');";
        echo "location='" . PAGES_URL . "customers.php';";
    echo "</script>";
}
?>
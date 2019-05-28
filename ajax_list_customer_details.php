<?php
require_once('../config.inc.php');
//$permissionNeeded = 'm1Sales';
//require_once('../user_session_check.php');
require_once(CLASS_PATH . 'customer.class.php');

$customerObj = new Customer();

// get the q parameter from URL
$customerName = $_GET["cName"];

$details = $customerObj->getCustomerDetailsFromName($customerName);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Customers</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include_once(PAGES_PATH . 'styles.php'); ?>
<?php include_once(PAGES_PATH . 'jsscripts.php');?>

</head>

<body>
    <table class="table table-striped" style="width: 50%">
        <tr>
            <td>Customer Name</td>
            <td><?php echo $details['customer_name']; ?></td>
        </tr>
        <tr>
            <td>Customer I.D. Number</td>
            <td><?php echo $details['customer_code']; ?></td>
        </tr>
        <tr>
            <td>Customer Cellular Phone Number</td>
            <td><?php echo $details['customer_code']; ?></td>
        </tr>
        <tr>
            <td>Customer Email Address</td>
            <td><?php echo $details['customer_code']; ?></td>
        </tr>
        <tr>
            <td>Customer Address</td>
            <td><?php echo $details['customer_code']; ?></td>
        </tr>
        <tr>
            <td>Balance Owed</td>
            <td><?php echo $details['customer_balance_owed']; ?></td>
        </tr>
        <tr>
            <td>Customer Notes</td>
            <td><?php echo $details['customer_tag']; ?></td>
        </tr>
    </table>
</body>
</html>

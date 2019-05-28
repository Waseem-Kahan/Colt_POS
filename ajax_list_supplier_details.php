<?php
require_once('../config.inc.php');
//$permissionNeeded = 'm1Sales';
//require_once('../user_session_check.php');
require_once(CLASS_PATH . 'supplier.class.php');

$supplierObj = new Supplier();

// get the q parameter from URL
$q = $_GET["q"];

$details = $supplierObj->getSupplierDetailsFromName($q);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Suppliers</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include_once(PAGES_PATH . 'styles.php'); ?>
<?php include_once(PAGES_PATH . 'jsscripts.php');?>

</head>

<body>
    <table class="table table-striped" style="width: 50%">
        <tr>
            <td>Supplier Name</td>
            <td><?php echo $details['supplier_name']; ?></td>
        </tr>
        <tr>
            <td>Supplier Code</td>
            <td><?php echo $details['supplier_code']; ?></td>
        </tr>
        <tr>
            <td>Balance Owed</td>
            <td><?php echo $details['balance_owed']; ?></td>
        </tr>
        <tr>
            <td>Supplier Address</td>
            <td><?php echo $details['supplier_address']; ?></td>
        </tr>
        <tr>
            <td>Supplier Telephone Number</td>
            <td><?php echo $details['supplier_telephone']; ?></td>
        </tr>
        <tr>
            <td>Supplier Alternative Phone Number</td>
            <td><?php echo $details['supplier_alt_phone']; ?></td>
        </tr>
        <tr>
            <td>Supplier Email Address</td>
            <td><?php echo $details['supplier_email']; ?></td>
        </tr>
        <tr>
            <td>Supplier Contact Person</td>
            <td><?php echo $details['supplier_contact_person']; ?></td>
        </tr>
    </table>
</body>
</html>

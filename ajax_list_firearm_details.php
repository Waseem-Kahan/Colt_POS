<?php
require_once('../config.inc.php');
//$permissionNeeded = 'm1Sales';
//require_once('../user_session_check.php');
require_once(CLASS_PATH . 'firearm.class.php');

$firearmObj = new Firearm();

if ($_GET["fStockNumber"] != NULL) {
    // get the stock number parameter from URL
    $firearmStockNumber = $_GET["fBarcode"];

    $firearmDetails = $firearmObj->getFirearmDetailsFromStockNumber($firearmStockNumber);
}
else if ($_GET["fSerial"] != NULL) {
    // get the description parameter from URL
    $firearmSerialNumber = $_GET["fSerial"];

    $firearmDetails = $firearmObj->getFirearmDetailsFromSerialNumber($firearmSerialNumber);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Firearms</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include_once(PAGES_PATH . 'styles.php'); ?>
    <?php include_once(PAGES_PATH . 'jsscripts.php');?>

</head>

<body>
    <table class="table table-striped" style="width: 50%">
        <tr>
            <td>Date Received into stock</td>
            <td colspan="3"><?php echo $firearmDetails['firearm_date_received']; ?></td>
        </tr>
        <tr>
            <td>Firearm Make</td>
            <td colspan="3"><?php echo $firearmDetails['firearm_make']; ?></td>
        </tr>
        <tr>
            <td>Firearm Model</td>
            <td colspan="3"><?php echo $firearmDetails['firearm_model']; ?></td>
        </tr>
        <tr>
            <td>Firearm Caliber</td>
            <td colspan="3"><?php echo $firearmDetails['firearm_caliber']; ?></td>
        </tr>
        <tr>
            <td>Firearm Action</td>
            <td colspan="3"><?php echo $firearmDetails['firearm_action']; ?></td>
        </tr>
        <tr>
            <td>Firearm Serial Number</td>
            <td colspan="3"><?php echo $firearmDetails['firearm_serial_number']; ?></td>
        </tr>
        <tr>
            <td>Firearm Selling Price</td>
            <td colspan="3"><?php echo $firearmDetails['firearm_sell_price']; ?></td>
        </tr>
        <tr>
            <td>Firearm Barcode</td>
            <td colspan="3"><?php echo $firearmDetails['firearm_barcode']; ?></td>
        </tr>
        <tr>
            <td>Firearm Supplier</td>
            <td colspan="3"><?php echo $firearmDetails['supplier_name']; ?></td>
        </tr>
        <tr>
            <td>Firearm Category</td>
            <td colspan="3"><?php echo $firearmDetails['category_name']; ?></td>
        </tr>
        <tr>
            <td>Is this firearm in stock?</td>
            <?php if ($firearmDetails['is_in_stock == 1']) {
                    echo '<td colspan="3">Yes</td>';
                } else {
                    echo '<td>No</td>';
                    echo '<td>Date Collected</td>';
                    echo '<td>'. $firearmDetails['firearm_collected_date'] .'</td>';
                } ?>
        </tr>
        <tr>
            <td>Is this firearm reserved?</td>
            <?php if ($firearmDetails['is_reserved == 1']) {
                echo '<td>Yes</td>';
                echo '<td colspan="2">'. $firearmDetails['reserved_date'] .'</td>';
            } else {
                echo '<td colspan="3">No</td>';
            } ?>
        </tr>
        <tr>
            <td>Is this firearm in storage?</td>
            <?php if ($firearmDetails['is_in_storage == 1']) {
                    echo '<td>Yes</td>';
                    echo '<td>Date Stored</td>';
                    echo '<td>'. $firearmDetails['storage_date'] .'</td>';
                } else if ($firearmDetails['is_in_storage == 2']) {
                    echo '<td>Previously Stored and Collected</td>';
                    echo '</tr><tr>';
                    echo '<td>Date Stored</td>';
                    echo '<td>'. $firearmDetails['storage_date'] .'</td>';
                    echo '<td>Date Collected</td>';
                    echo '<td>'. $firearmDetails['firearm_collected_date'] .'</td>';
                    echo '</tr>';
            } else {
                    echo '<td colspan="2">No</td>';
                } ?>
        </tr>
        <?php if ($firearmDetails['customer_name'] != NULL) { ?>
        <tr>
            <td>Customer Name</td>
            <td><?php echo $firearmDetails['customer_name']; ?></td>
            <td>Customer ID Number</td>
            <td><?php echo $firearmDetails['customer_id']; ?></td>
        </tr>
        <?php }
        if ($firearmDetails['license_number'] != NULL) { ?>
        <tr>
            <td>License Number</td>
            <td><?php echo $firearmDetails['license_number']; ?></td>
        </tr>
        <?php } ?>

    </table>
</body>
</html>

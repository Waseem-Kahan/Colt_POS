<?php
require_once('../config.inc.php');
//$permissionNeeded = 'm1Sales';
//require_once('../user_session_check.php');
require_once(CLASS_PATH . 'item.class.php');

$itemObj = new Item();

if ($_GET["barcode"] != NULL) {
    // get the barcode parameter from URL
    $itemBarcode = $_GET["barcode"];

    $itemDetails = $itemObj->getItemDetailsFromBarcode($itemBarcode);
}
else if ($_GET["description"] != NULL) {
    // get the description parameter from URL
    $itemDescription = $_GET["description"];

    $itemDetails = $itemObj->getItemDetailsFromDescription($itemDescription);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Items</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include_once(PAGES_PATH . 'styles.php'); ?>
<?php include_once(PAGES_PATH . 'jsscripts.php');?>

</head>

<body>
    <table class="table table-striped" style="width: 50%">
        <tr>
            <td>Item Description</td>
            <td><?php echo $itemDetails['item_description']; ?></td>
        </tr>
        <tr>
            <td>Quantity Available</td>
            <td><?php echo $itemDetails['item_quantity']; ?></td>
        </tr>
        <tr>
            <td>Price per UOM</td>
            <td><?php echo $itemDetails['item_sell_price']; ?></td>
        </tr>
        <tr>
            <td>Item UOM</td>
            <td><?php echo $itemDetails['item_uom']; ?></td>
        </tr>
        <tr>
            <td>Item Barcode</td>
            <td><?php echo $itemDetails['item_barcode']; ?></td>
        </tr>
        <tr>
            <td>Other Barcode</td>
            <td><?php echo $itemDetails['existing_barcode']; ?></td>
        </tr>
        <tr>
            <td>Item Category</td>
            <td><?php echo $itemDetails['item_category']; ?></td>
        </tr>
        <tr>
            <td>Item Supplier</td>
            <td><?php echo $itemDetails['item_supplier']; ?></td>
        </tr>
    </table>
</body>
</html>

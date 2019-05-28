<?php
require_once('../config.inc.php');
//$permissionNeeded = 'm1Sales';
//require_once('../user_session_check.php');
require_once(CLASS_PATH . 'item.class.php');
require_once(CLASS_PATH . 'category.class.php');
require_once(CLASS_PATH . 'supplier.class.php');

$supplierObj = new Supplier();
$supplierNames = $supplierObj->listSupplierNames();

$categoryObj = new Category();
$categoryNames = $categoryObj->listItemCategoryNames();

$itemObj = new Item();

if ($_GET["barcode"] != NULL) {
    // get the barcode parameter from URL
    $itemBarcode = $_GET["barcode"];

    $itemDetails = $itemObj->getItemDetailsFromBarcode($itemBarcode);
}
else if ($_GET["description"] != NULL) {
    // get the name parameter from URL
    $itemDescription = $_GET["description"];

    $itemDetails = $itemObj->getItemDetailsFromDescription($itemDescription);
}

$costPriceWithVAT = round(($itemDetails['item_cost_price'] * (1 + $VAT)), 2);
$sellPriceWithVAT = round($itemDetails['item_sell_price'] * (1 + $VAT));
$markup = round(((($itemDetails['item_sell_price'] - $itemDetails['item_cost_price']) / $itemDetails['item_cost_price']) * 100), 2);
$profit = round(($itemDetails['item_sell_price'] - $itemDetails['item_cost_price']), 2);


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

<input type="hidden" value="<?php echo $itemDetails['item_key']; ?>" name="item_key" id="item_key">
<table class="table table-striped">
    <tr>
        <td><label for="item_description">Item Description:&nbsp;</label></td>
        <td colspan="3"><input type="text" value="<?php echo $itemDetails['item_description']; ?>" name="item_description" id="item_description" style="width: 100%"></td>
    </tr>
    <tr>
        <td><label for="item_barcode">Item Barcode:&nbsp;</label></td>
        <td colspan="3"><input type="text" value="<?php echo $itemDetails['item_barcode']; ?>" name="item_barcode" id="item_barcode"></td>
    </tr>
    <tr>
        <td><label for="item_existing_barcode">Existing Barcode:&nbsp;</label></td>
        <td><input type="text" value="<?php echo $itemDetails['existing_barcode']; ?>" name="item_existing_barcode" id="item_existing_barcode"></td>
        <td><label for="same_as_barcode">Same as above?</label></td>
        <td><input type="checkbox" name="same_as_barcode" id="same_as_barcode" onclick="autoFillExistingBarcode(this.form)"></td>
    </tr>
    <tr>
        <td><label for="item_uom">Item UOM:&nbsp;</label></td>
        <td colspan="3"><select name="item_uom" id="item_uom">
                <option value="<?php echo $itemDetails['item_uom']; ?>"><?php echo $itemDetails['item_uom']; ?></option>
                <option value="Each">Each</option>
                <option value="Box of 10">Box of 10</option>
                <option value="Box of 20">Box of 20</option>
                <option value="Box of 25">Box of 25</option>
                <option value="Box of 50">Box of 50</option>
                <option value="Box of 100">Box of 100</option>
                <option value="Box of 250">Box of 250</option>
                <option value="Box of 500">Box of 500</option>
                <option value="Box of 1000">Box of 1000</option>
            </select></td>
    </tr>
    <tr>
        <td><label for="item_cost_price">Cost Price per UOM:&nbsp;</label></td>
        <td><input type="number" value="<?php echo $itemDetails['item_cost_price']; ?>" min="0" step="any" name="item_cost_price" id="item_cost_price"></td>
        <td><label for="item_cost_with_vat">Cost Price with VAT:&nbsp;</label></td>
        <td><input type="number"  min="0" step="any" name="item_cost_with_vat" id="item_cost_with_vat" value="<?php echo $costPriceWithVAT; ?>" disabled="disabled"></td>
    </tr>
    <tr>
        <td><label for="item_sell_with_vat">Selling Price with VAT:&nbsp;</label></td>
        <td><input type="number" min="0" step="any" name="item_sell_with_vat" id="item_sell_with_vat" value="<?php echo $sellPriceWithVAT; ?>"></td>
        <td><label for="item_sell_price">Selling Price per UOM:&nbsp;</label></td>
        <td colspan="3"><input type="number" value="<?php echo $itemDetails['item_sell_price']; ?>" min="0" step="any" name="item_sell_price" id="item_sell_price"></td>
    </tr>
    <tr>
        <td><label for="item_markup">Markup %:&nbsp;</label></td>
        <td><input type="number" min="0" step="any" name="item_markup" id="item_markup" value="<?php echo $markup; ?>"></td>
        <td><label for="item_profit">Profit per UOM:&nbsp;</label></td>
        <td><input type="number"  min="0" step="any" name="item_profit" id="item_profit" value="<?php echo $profit; ?>" disabled="disabled"></td>
    </tr>
    <tr>
        <td><label for="item_quantity">Item Quantity in Stock:&nbsp;</label></td>
        <td colspan="3"><input type="number" value="<?php echo $itemDetails['item_quantity']; ?>" min="0" step="any" name="item_quantity" id="item_quantity"></td>
    </tr>
    <tr>
        <td><label for="item_category">Item Category:&nbsp;</label></td>
        <td colspan="3"><select name="item_category" id="item_category"><?php foreach ($categoryNames as $categoryName) { ?>
                    <option value="<?php echo $categoryName['category_key'] ?>"
                        <?php
                        if ($categoryName['category_key'] == $itemDetails['item_category']) {
                            echo 'Selected';
                        }
                        ?>><?php echo $categoryName['category_name'] ?></option>
                <?php } ?></select>
    </tr>
    <tr>
        <td><label for="item_supplier">Item Supplier:&nbsp;</td>
        <td colspan="3"><select name="item_supplier" id="item_supplier"><?php foreach ($supplierNames as $supplierName) { ?>
                    <option value="<?php echo $supplierName['supplier_key'] ?>"
                        <?php
                        if ($supplierName['supplier_key'] == $itemDetails['item_supplier']) {
                            echo 'Selected';
                        }
                        ?>><?php echo $supplierName['supplier_name'] ?></option>
                <?php } ?></select>
    </tr>
</table>
<input type="submit" class='btn btn-primary' value="Edit Item" id="submit_edit_item">

<script>
    var vatPerc = 0.15;
    document.getElementById("item_cost_price").onkeyup = function(){
        document.getElementById("item_cost_with_vat").value = parseFloat(document.getElementById("item_cost_price").value) * (1.00 + vatPerc)
    }
</script>
<script>
    var vatPerc = 0.15;
    document.getElementById("item_sell_with_vat").onkeyup = function(){
        document.getElementById("item_sell_price").value = (Math.floor((parseFloat(document.getElementById("item_sell_with_vat").value) / (1.00 + vatPerc)) * 100)) / 100;
        var costPrice = document.getElementById("item_cost_price").value;
        var sellPrice = document.getElementById("item_sell_price").value;
        document.getElementById("item_profit").value = (sellPrice - costPrice);
        document.getElementById("item_markup").value = (Math.floor((((sellPrice - costPrice) / (costPrice)) * 100) * 100)) / 100;
    }
</script>
<script>
    document.getElementById("item_markup").onkeyup = function(){
        document.getElementById("item_sell_price").value = (parseFloat(document.getElementById("item_cost_price").value) * (1.00 + (parseFloat(document.getElementById("item_markup").value / 100))));
        var costPrice = document.getElementById("item_cost_price").value;
        var sellPrice = document.getElementById("item_sell_price").value;
        var vatPerc = 0.15;
        document.getElementById("item_profit").value = (sellPrice - costPrice);
        document.getElementById("item_sell_with_vat").value = sellPrice * (1.00 + vatPerc)
    }
</script>

</body>
</html>

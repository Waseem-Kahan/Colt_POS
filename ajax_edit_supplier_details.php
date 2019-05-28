<?php
require_once('../config.inc.php');
//$permissionNeeded = 'm1Sales';
//require_once('../user_session_check.php');
require_once(CLASS_PATH . 'supplier.class.php');

$supplierObj = new Supplier();

// get the q parameter from URL
$supplierName = $_GET["sName"];

$supplierDetails = $supplierObj->getSupplierDetailsFromName($supplierName);

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
<input type="hidden" value="<?php echo $supplierDetails['supplier_key']; ?>" name="supplier_key" id="supplier_key">
<table class="table table-striped">
    <tr>
        <td><label for="supplier_name">Supplier Name:&nbsp;</label></td>
        <td><input type="text" value="<?php echo $supplierDetails['supplier_name']; ?>" maxlength="63" name="supplier_name" id="supplier_name" style="width: 100%"></td>
    </tr>
    <tr>
        <td><label for="supplier_code">Supplier Code:&nbsp;</label></td>
        <td><input type="text" value="<?php echo $supplierDetails['supplier_code']; ?>" maxlength="15" name="supplier_code" id="supplier_code" style="width: 100%"></td>
    </tr>
    <tr>
        <td><label for="balance_owed">Balance Owed:&nbsp;</label></td>
        <td><input type="number" value="<?php echo $supplierDetails['balance_owed']; ?>" min="0" step="any" name="balance_owed" id="balance_owed"></td>
    </tr>
    <tr>
        <td><label for="supplier_address">Supplier Address:&nbsp;</label></td>
        <td><input type="text" value="<?php echo $supplierDetails['supplier_address']; ?>" name="supplier_address" id="supplier_address" maxlength="127" placeholder="Insert Address" style="width: 100%"></td>
    </tr>
    <tr>
        <td><label for="supplier_telephone">Supplier Telephone Number:&nbsp;</label></td>
        <td><input type="text" value="<?php echo $supplierDetails['supplier_telephone']; ?>" name="supplier_telephone" id="supplier_telephone" maxlength="10" placeholder="Insert Telephone Number" style="width: 100%"></td>
    </tr>
    <tr>
        <td><label for="supplier_alt_phone">Supplier Alternative Phone Number:&nbsp;</label></td>
        <td><input type="text" value="<?php echo $supplierDetails['supplier_alt_phone']; ?>" name="supplier_alt_phone" id="supplier_alt_phone" maxlength="10" placeholder="Insert Alternative Number" style="width: 100%"></td>
    </tr>
    <tr>
        <td><label for="supplier_email">Supplier Email:&nbsp;</label></td>
        <td><input type="text" value="<?php echo $supplierDetails['supplier_email']; ?>" name="supplier_email" id="supplier_email" maxlength="63" placeholder="Insert Email" style="width: 100%"></td>
    </tr>
    <tr>
        <td><label for="supplier_contact_person">Supplier Contact Person:&nbsp;</label></td>
        <td><input type="text" value="<?php echo $supplierDetails['supplier_contact_person']; ?>" name="supplier_contact_person" id="supplier_contact_person" maxlength="31" placeholder="Insert Person Name" style="width: 100%"></td>
    </tr>
</table>
<input type="submit" class='btn btn-primary' value="Update Supplier" id="submit_updated_user">
</body>
</html>

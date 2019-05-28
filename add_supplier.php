<?php
require_once('../config.inc.php');
//$permissionNeeded = 'm1Sales';
//require_once('../user_session_check.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Supplier</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include_once(PAGES_PATH . 'styles.php'); ?>
    <?php include_once(PAGES_PATH . 'jsscripts.php');?>

</head>

<body>
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Add Supplier</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form action="<?php echo PROCESS_URL; ?>add_supplier.php" method="post" name="add_supplier" id="add_supplier">
                <table class="table table-striped">
                    <tr>
                        <td><label for="supplier_name">Supplier Name:&nbsp;</label></td>
                        <td><input type="text" name="supplier_name" id="supplier_name" maxlength="63" placeholder="Insert Name" style="width: 100%"></td>
                    </tr>
                    <tr>
                        <td><label for="supplier_code">Supplier Code:&nbsp;</label></td>
                        <td><input type="text" name="supplier_code" id="supplier_code" maxlength="15" placeholder="Insert Code" style="width: 100%"></td>
                    </tr>
                    <tr>
                        <td><label for="balance_owed">Supplier Balance Owed:&nbsp;</label></td>
                        <td><input type="text" name="balance_owed" id="balance_owed" min="0" step="any"></td>
                    </tr>
                    <tr>
                        <td><label for="supplier_address">Supplier Address:&nbsp;</label></td>
                        <td><input type="text" name="supplier_address" id="supplier_address" maxlength="127" placeholder="Insert Address" style="width: 100%"></td>
                    </tr>
                    <tr>
                        <td><label for="supplier_telephone">Supplier Telephone Number:&nbsp;</label></td>
                        <td><input type="text" name="supplier_telephone" id="supplier_telephone" maxlength="10" placeholder="Insert Telephone Number" style="width: 100%"></td>
                    </tr>
                    <tr>
                        <td><label for="supplier_alt_phone">Supplier Alternative Phone Number:&nbsp;</label></td>
                        <td><input type="text" name="supplier_alt_phone" id="supplier_alt_phone" maxlength="10" placeholder="Insert Alternative Number" style="width: 100%"></td>
                    </tr>
                    <tr>
                        <td><label for="supplier_email">Supplier Email:&nbsp;</label></td>
                        <td><input type="text" name="supplier_email" id="supplier_email" maxlength="63" placeholder="Insert Email" style="width: 100%"></td>
                    </tr>
                    <tr>
                        <td><label for="supplier_contact_person">Supplier Contact Person:&nbsp;</label></td>
                        <td><input type="text" name="supplier_contact_person" id="supplier_contact_person" maxlength="31" placeholder="Insert Person Name" style="width: 100%"></td>
                    </tr>
                </table>
                <input type="submit" class='btn btn-primary' value="Add Supplier" id="submit_add_supplier">
            </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>



</body>
</html>

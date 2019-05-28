<?php
require_once('../config.inc.php');
//$permissionNeeded = 'm1Sales';
//require_once('../user_session_check.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Customer</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include_once(PAGES_PATH . 'styles.php'); ?>
    <?php include_once(PAGES_PATH . 'jsscripts.php');?>

</head>

<body>
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Add Customer</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form action="<?php echo PROCESS_URL; ?>add_customer.php" method="post" name="add_customer" id="add_customer">
                <table class="table table-striped">
                    <tr>
                        <td><label for="customer_name">Customer Name:&nbsp;</label></td>
                        <td><input type="text" name="customer_name" id="customer_name" maxlength="63" placeholder="Insert Customer's Name"></td>
                    </tr>
                    <tr>
                        <td><label for="customer_id">Customer I.D.:&nbsp;</label></td>
                        <td><input type="text" name="customer_id" id="customer_id" maxlength="13" placeholder="Insert Customer's I.D. Number"></td>
                    </tr>
                    <tr>
                        <td><label for="customer_cellphone">Customer Cellular Phone Number:&nbsp;</label></td>
                        <td><input type="text" name="customer_cellphone" id="customer_cellphone" maxlength="10" placeholder="Insert Customer's Cellphone Number"></td>
                    </tr>
                    <tr>
                        <td><label for="customer_email">Customer Email:&nbsp;</label></td>
                        <td><input type="text" name="customer_email" id="customer_email" maxlength="63" placeholder="Insert Customer's Email"></td>
                    </tr>
                    <tr>
                        <td><label for="customer_address">Customer Address:&nbsp;</label></td>
                        <td><input type="text" name="customer_address" id="customer_address" maxlength="127" placeholder="Insert Customer's Address"></td>
                    </tr>
                    <tr>
                        <td><label for="customer_balance_owed">Customer Balance Owed:&nbsp;</label></td>
                        <td><input type="text" name="customer_balance_owed" id="customer_balance_owed" min="0" step="any"></td>
                    </tr>
                    <tr>
                        <td><label for="customer_tag">Notes on Customer:&nbsp;</label></td>
                        <td><input type="text" name="customer_tag" id="customer_tag" maxlength="63" placeholder="Insert Notes (if any)"></td>
                    </tr>
                </table>
                <input type="submit" class='btn btn-primary' value="Add Customer" id="submit_add_customer">
            </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>



</body>
</html>

<?php
require_once('../config.inc.php');
//$permissionNeeded = 'm1Sales';
//require_once('../user_session_check.php');

require_once(CLASS_PATH . 'category.class.php');
require_once(CLASS_PATH . 'supplier.class.php');
require_once(CLASS_PATH . 'customer.class.php');


$supplierObj = new Supplier();
$supplierNames = $supplierObj->listSupplierNames();

$categoryObj = new Category();
$categoryNames = $categoryObj->listFirearmCategoryNames();

$customerObj = new Customer();
$customerNames = $customerObj->listCustomerNames();


$timezone = date_default_timezone_get();
$customerID = "";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Firearm</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include_once(PAGES_PATH . 'styles.php'); ?>
    <?php include_once(PAGES_PATH . 'jsscripts.php');?>

</head>

<body>
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Add Firearm</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form action="<?php echo PROCESS_URL; ?>add_firearm.php" method="post" name="add_firearm" id="add_firearm">
                <table class="table table-striped">
                    <tr>
                        <td><label for="firearm_stock_number">Firearm Stock Number:&nbsp;</label></td>
                        <td colspan="3"><input type="text" name="firearm_stock_number" id="firearm_stock_number"></td>
                    </tr>
                    <tr>
                        <td><label for="firearm_date_received">Date received into stock:&nbsp;</label></td>
                        <td colspan="3"><input id="firearm_date_received" class="form-control" type="date" name="firearm_date_received" value="<?php print(date("Y-m-d",time())); ?>"/></td>
                    </tr>
                    <tr>
                        <td><label for="firearm_make">Firearm Make:&nbsp;</label></td>
                        <td colspan="3"><input type="text" name="firearm_make" id="firearm_make" placeholder="Insert Firearm Make" maxlength="31" style="width: 100%"></td>
                    </tr>
                    <tr>
                        <td><label for="firearm_model">Firearm Model:&nbsp;</label></td>
                        <td colspan="3"><input type="text" name="firearm_model" id="firearm_model" placeholder="Insert Firearm Model" maxlength="31" style="width: 100%"></td>
                    </tr>
                    <tr>
                        <td><label for="firearm_caliber">Firearm Caliber:&nbsp;</label></td>
                        <td colspan="3"><input type="text" name="firearm_caliber" id="firearm_caliber" placeholder="Insert Firearm Caliber" maxlength="15" style="width: 100%"></td>
                    </tr>
                    <tr>
                        <td><label for="firearm_action">Firearm Action:&nbsp;</label></td>
                        <td colspan="3"><select name="firearm_action" id="firearm_action" style="width: 100%">
                                <option value="Semi-Automatic">Semi-Automatic</option>
                                <option value="Manual">Manual</option>
                                <option value="Automatic" disabled>Automatic</option></select></td>
                    </tr>
                    <tr>
                        <td><label for="firearm_serial_number">Firearm Serial Number:&nbsp;</label></td>
                        <td colspan="3"><input type="text" name="firearm_serial_number" id="firearm_serial_number" placeholder="Insert Firearm Serial Number" maxlength="31" style="width: 100%" required></td>
                    </tr>
                    <tr>
                        <td><label for="firearm_cost_price">Cost Price:&nbsp;</label></td>
                        <td><input type="number" min="0" step="any" name="firearm_cost_price" id="firearm_cost_price"></td>
                        <td><label for="firearm_cost_with_vat">Cost Price with VAT:&nbsp;</label></td>
                        <td><input type="number"  min="0" step="any" name="firearm_cost_with_vat" id="firearm_cost_with_vat" disabled="disabled"></td>
                    </tr>
                    <tr>
                        <td><label for="firearm_sell_with_vat">Selling Price with VAT:&nbsp;</label></td>
                        <td><input type="number" min="0" step="any" name="firearm_sell_with_vat" id="firearm_sell_with_vat"></td>
                        <td><label for="firearm_sell_price">Selling Price:&nbsp;</label></td>
                        <td><input type="number" min="0" step="any" name="firearm_sell_price" id="firearm_sell_price" readonly="readonly"></td>
                    </tr>
                    <tr>
                        <td><label for="firearm_markup">Markup %:&nbsp;</label></td>
                        <td><input type="number" min="0" step="any" name="firearm_markup" id="firearm_markup"></td>
                        <td><label for="firearm_profit">Profit:&nbsp;</label></td>
                        <td><input type="number"  min="0" step="any" name="firearm_profit" id="firearm_profit" disabled="disabled"></td>
                    </tr>
                    <tr>
                        <td><label for="firearm_category">Firearm Category:&nbsp;</label></td>
                        <td colspan="3"><select name="firearm_category" id="firearm_category"><?php foreach ($categoryNames as $categoryName) { ?>
                                    <option value="<?php echo $categoryName['category_key'] ?>">
                                        <?php echo $categoryName['category_name'] ?></option>
                                <?php } ?></select>
                    </tr>
                    <tr>
                        <td><label for="firearm_supplier">Firearm Supplier:&nbsp;</td>
                        <td colspan="3"><select name="firearm_supplier" id="firearm_supplier"><?php foreach ($supplierNames as $supplierName) { ?>
                                    <option value="<?php echo $supplierName['supplier_key'] ?>">
                                        <?php echo $supplierName['supplier_name'] ?></option>
                                <?php } ?></select>
                    </tr>
                    <tr>
                        <td><label for="is_in_stock">Is the firearm in Stock?&nbsp;</label></td>
                        <td colspan="3"><input type="checkbox" name="is_in_stock" id="is_in_stock"></td>
                    </tr>
                    <tr>
                        <td><label for="is_reserved">Is the firearm reserved?&nbsp;</label></td>
                        <td><input type="checkbox" name="is_reserved" id="is_reserved"></td>
                        <td><label for="reserved_date">Reservation Date:</label></td>
                        <td><input id="reserved_date" class="form-control" type="date" name="reserved_date" value="<?php print(date("Y-m-d",time())); ?>"/></td>
                    </tr>
                    <tr>
                        <td><label for="is_in_storage">Is the firearm in storage?&nbsp;</label></td>
                        <td><input type="checkbox" name="is_in_storage" id="is_in_storage"></td>
                        <td><label for="storage_date">Date of storage:&nbsp;</label></td>
                        <td><input id="storage_date" class="form-control" type="date" name="storage_date" value="<?php print(date("Y-m-d",time())); ?>"/></td>
                    </tr>
                    <tr>
                        <td><label for="customer_key">Firearm Belongs to:&nbsp;</label></td>
                        <td><select name="customer_key" id="customer_key"><?php foreach ($customerNames as $customerName) { ?>
                                    <option value="<?php echo $customerName['customer_key'] ?>">
                                        <?php echo $customerName['customer_name'] ?></option>
                                <?php $customerID = $customerName['customer_id']; } ?></select>
                        <td><label for="customer_id">Customer ID No.:&nbsp;</label></td>
                        <td><input type="text" name="customer_id" id="customer_id" value="<?php echo $customerID; ?>" disabled="disabled"></td>
                    </tr>
                    <tr>
                        <td><label for="firearm_collected_date">Date Firearm Collected:&nbsp;</label></td>
                        <td colspan="3"><input id="firearm_collected_date" class="form-control" type="date" name="firearm_collected_date" value="<?php print(date("Y-m-d",time())); ?>"/></td>
                    </tr>
                </table>
                <input type="submit" class='btn btn-primary' value="Add Firearm" id="submit_add_firearm">
            </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

        <script>
            var vatPerc = 0.15;
            document.getElementById("firearm_cost_price").onkeyup = function(){
                document.getElementById("firearm_cost_with_vat").value = parseFloat(document.getElementById("firearm_cost_price").value) * (1.00 + vatPerc)
            }
        </script>
        <script>
            var vatPerc = 0.15;
            document.getElementById("firearm_sell_with_vat").onkeyup = function(){
                document.getElementById("firearm_sell_price").value = (Math.floor((parseFloat(document.getElementById("firearm_sell_with_vat").value) / (1.00 + vatPerc)) * 100)) / 100;
            var costPrice = document.getElementById("firearm_cost_price").value;
            var sellPrice = document.getElementById("firearm_sell_price").value;
                document.getElementById("firearm_profit").value = (sellPrice - costPrice);
                document.getElementById("firearm_markup").value = (Math.floor((((sellPrice - costPrice) / (costPrice)) * 100) * 100)) / 100;
            }
        </script>
        <script>
            document.getElementById("firearm_markup").onkeyup = function(){
                document.getElementById("firearm_sell_price").value = (parseFloat(document.getElementById("firearm_cost_price").value) * (1.00 + (parseFloat(document.getElementById("firearm_markup").value / 100))));
                var costPrice = document.getElementById("firearm_cost_price").value;
                var sellPrice = document.getElementById("firearm_sell_price").value;
                var vatPerc = 0.15;
                document.getElementById("firearm_profit").value = (sellPrice - costPrice);
                document.getElementById("firearm_sell_with_vat").value = sellPrice * (1.00 + vatPerc)
            }
        </script>
        <script>
            $(function () {
                $('label[for="reserved_date"]').hide();
                $('input[name="reserved_date"]').hide();

                //show it when the checkbox is clicked
                $('input[name="is_reserved"]').on('click', function () {
                    if ($(this).prop('checked')) {
                        $('label[for="reserved_date"]').fadeIn();
                        $('input[name="reserved_date"]').fadeIn();
                    } else {
                        $('label[for="reserved_date"]').hide();
                        $('input[name="reserved_date"]').hide();
                    }
                });
            });
        </script>
        <script>
            $(function () {
                $('label[for="storage_date"]').hide();
                $('input[name="storage_date"]').hide();

                //show it when the checkbox is clicked
                $('input[name="is_in_storage"]').on('click', function () {
                    if ($(this).prop('checked')) {
                        $('label[for="storage_date"]').fadeIn();
                        $('input[name="storage_date"]').fadeIn();
                    } else {
                        $('label[for="storage_date"]').hide();
                        $('input[name="storage_date"]').hide();
                    }
                });
            });
        </script>

</body>
</html>

<?php
require_once('../config.inc.php');
//$permissionNeeded = 'm1Sales';
//require_once('../user_session_check.php');
require_once(CLASS_PATH . 'supplier.class.php');

$supplierObj = new Supplier();
$supplierNames = $supplierObj->listSupplierNames();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Suppliers</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include_once(PAGES_PATH . 'styles.php'); ?>
    <?php include_once(PAGES_PATH . 'jsscripts.php');?>

    <script>
        function supplierDetails(str) {
            if (str.length == 0) {
                document.getElementById("edit_supplier_details").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("edit_supplier_details").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "ajax_edit_supplier_details.php?sName=" + str, true);
                xmlhttp.send();
            }
        }
    </script>

</head>

<body>


        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Edit Supplier</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form action="<?php echo PROCESS_URL; ?>edit_supplier.php" method="post" name="edit_supplier" id="edit_supplier">
                <div id="edit_supplier_details">
                    <table class="table table-striped">
                        <tr>
                            <td><label for="supplier_name">Supplier Name:&nbsp;</label></td>
                            <td><input type="text" name="supplier_name" list="supplier_name" placeholder="Insert Supplier Name" autocomplete="off" onselect="supplierDetails(this.value)">
                                <datalist id="supplier_name" multiple="multiple" style="height:500px;">
                                    <?php foreach ($supplierNames as $supplierName) { ?>
                                        <option value="<?php echo $supplierName['supplier_name'] ?>">
                                            <?php echo $supplierName['supplier_name'] ?></option>
                                    <?php } ?>
                                </datalist></td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>



</body>
</html>

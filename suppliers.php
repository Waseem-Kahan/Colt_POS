<?php
    require_once('../config.inc.php');
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
        function showDetails(str) {
            if (str.length == 0) {
                document.getElementById("supplier_details").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("supplier_details").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "ajax_list_supplier_details.php?q=" + str, true);
                xmlhttp.send();
            }
        }
    </script>

</head>

<body>
    <div class="container-fluid" id="maincontainer">

        <?php require_once(PAGES_PATH . 'header.php'); ?>
        <?php require_once(PAGES_PATH . 'topmenu.php'); ?>


        <div id="contentcontainer" class="contentcontainer" align="center">
            <div>
            <h3>Search Supplier: </h3><input type="text" name="suppliernames" list="suppliernames" placeholder="Insert Supplier Name" onselect="showDetails(this.value)">
            <datalist id="suppliernames" multiple="multiple" style="height:500px;">
                <?php foreach ($supplierNames as $supplierName) { ?>
                    <option value="<?php echo $supplierName['supplier_name'] ?>">
                        <?php echo $supplierName['supplier_name'] ?></option>
                <?php } ?>
            </datalist>
                <br><br>

            </div>

            <div id="supplier_details">

            </div>

            <!-- Link to Open the Modal -->
            <table>
                <tr>
                    <td>
                        <a href="<?php echo PAGES_URL; ?>add_supplier.php" class='li-modal' style="font-weight: bold;font-size: large;color: blue">Add Supplier</a>
                    </td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>
                        <a href="<?php echo PAGES_URL; ?>edit_supplier.php" class='li-modal' style="font-weight: bold;font-size: large;color: red">Edit Supplier</a>
                    </td>
                </tr>
            </table>


            <!-- The Modal -->
            <div class="modal" id="theModal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                    </div>
                </div>
            </div>
            <script>
                $('.li-modal').on('click', function(e){
                    e.preventDefault();
                    $('#theModal').modal('show').find('.modal-content').load($(this).attr('href'));
                });
            </script>

            <?php require_once(PAGES_PATH . 'footer.php'); ?>
        </div>
    </div>
</body>
</html>
<?php
require_once('../config.inc.php');
//$permissionNeeded = 'm1Sales';
//require_once('../user_session_check.php');
//require_once(CLASS_PATH . 'supplier.class.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Item</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include_once(PAGES_PATH . 'styles.php'); ?>
    <?php include_once(PAGES_PATH . 'jsscripts.php');?>

    <script>
        function displayItemDetailsFromBarcode(code) {
            if (code.length == 0) {
                document.getElementById("edit_item_details").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("edit_item_details").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "ajax_edit_item_details.php?barcode=" + code, true);
                xmlhttp.send();
            }
        }
    </script>
    <script>
        function displayItemDetailsFromDescription(str) {
            if (str.length == 0) {
                document.getElementById("edit_item_details").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("edit_item_details").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "ajax_edit_item_details.php?description=" + str, true);
                xmlhttp.send();
            }
        }
    </script>
    <script type="text/javascript">

        function buttonCheck() {
            if (document.getElementById('search_barcode').checked) {
                document.getElementById('barcode_block').style.display = 'block';
                document.getElementById('description_block').style.display = 'none';
            } else if (document.getElementById('search_description').checked) {
                document.getElementById('barcode_block').style.display = 'none';
                document.getElementById('description_block').style.display = 'block';
            }
        }

    </script>

</head>

<body>


        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Edit Item</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form action="<?php echo PROCESS_URL; ?>edit_item.php" method="post" name="edit_item" id="edit_item">
                <div id="edit_item_details">
                    <table class="table table-striped">
                        <tr>
                            <td>
                                <input type="radio" name="searchType" id="search_barcode" onclick="buttonCheck();">&nbsp;Barcode&nbsp;
                                <input type="radio" name="searchType" id="search_description" onclick="buttonCheck();">&nbsp;Description
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div id="barcode_block" style="display: none">
                                    <input type="text" name="itembarcode" id="itembarcode" placeholder="Scan/Insert Barcode" style="width: 100%" onselect="showItemDetailsFromBarcode(this.value)">
                                </div>
                                <div id="description_block" style="display: none">
                                    <input type="text" name="itemdescriptions" list="itemdescriptions" placeholder="Insert Description" style="width: 100%" onselect="showItemDetailsFromDescription(this.value)">
                                    <datalist id="itemdescriptions" multiple="multiple" style="height:500px;">
                                        <?php foreach ($itemDescriptions as $itemDescription) { ?>
                                            <option value="<?php echo $itemDescription['item_description'] ?>">
                                                <?php echo $itemDescription['item_description'] ?></option>
                                        <?php } ?>
                                    </datalist>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>

                <div id="edit_item_details">

                </div>
            </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>



</body>
</html>

<?php
require_once('../config.inc.php');
//$permissionNeeded = 'm1Sales';
//require_once('../user_session_check.php');
//require_once(CLASS_PATH . 'supplier.class.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Firearm</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include_once(PAGES_PATH . 'styles.php'); ?>
    <?php include_once(PAGES_PATH . 'jsscripts.php');?>

    <script>
        function displayFirearmDetailsFromStockNumber(num) {
            if (num.length == 0) {
                document.getElementById("edit_firearm_details").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("edit_firearm_details").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "ajax_edit_firearm_details.php?fStockNumber=" + num, true);
                xmlhttp.send();
            }
        }
    </script>
    <script>
        function displayFirearmDetailsFromSerial(serial) {
            if (serial.length == 0) {
                document.getElementById("edit_firearm_details").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("edit_firearm_details").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "ajax_edit_firearm_details.php?fSerial=" + serial, true);
                xmlhttp.send();
            }
        }
    </script>
    <script type="text/javascript">

        function buttonCheck() {
            if (document.getElementById('search_stock_number').checked) {
                document.getElementById('stock_number_block').style.display = 'block';
                document.getElementById('serial_block').style.display = 'none';
            } else if (document.getElementById('search_serial').checked) {
                document.getElementById('stock_number_block').style.display = 'none';
                document.getElementById('serial_block').style.display = 'block';
            }
        }

    </script>

</head>

<body>


<!-- Modal Header -->
<div class="modal-header">
    <h4 class="modal-title">Edit Firearm</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>

<!-- Modal body -->
<div class="modal-body">
    <form action="<?php echo PROCESS_URL; ?>edit_firearm.php" method="post" name="edit_firearm" id="edit_firearm">
        <div id="edit_firearm_details">
            <table class="table table-striped">
                <tr>
                    <td>
                        <input type="radio" name="searchType" id="search_stock_number" onclick="buttonCheck();">&nbsp;Stock Number&nbsp;
                        <input type="radio" name="searchType" id="search_serial" onclick="buttonCheck();">&nbsp;Serial Number
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div id="stock_number_block" style="display: none">
                            <input type="text" name="firearmstocknumber" id="firearmstocknumber" placeholder="Insert Stock Number" style="width: 100%" onselect="displayFirearmDetailsFromStockNumber(this.value)">
                        </div>
                        <div id="serial_block" style="display: none">
                            <input type="text" name="firearmserial" list="firearmserial" placeholder="Insert Serial Number" style="width: 100%" onselect="displayFirearmDetailsFromSerial(this.value)">
                            <datalist id="firearmserial" multiple="multiple" style="height:500px;">
                                <?php foreach ($firearmDescriptions as $firearmDescription) { ?>
                                    <option value="<?php echo $firearmDescription['firearm_serial_number'] ?>">
                                        <?php echo $firearmDescription['firearm_serial_number'] ?></option>
                                <?php } ?>
                            </datalist>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <div id="edit_firearm_details">

        </div>
    </form>
</div>

<!-- Modal footer -->
<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>



</body>
</html>

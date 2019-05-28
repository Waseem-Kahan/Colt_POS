<?php
    require_once('../config.inc.php');
    require_once(CLASS_PATH . 'firearm.class.php');

    $firearmObj = new Firearm();
    $firearmSerials = $firearmObj->listFirearmSerialNumbers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Firearms</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <?php include_once(PAGES_PATH . 'styles.php'); ?>
    <?php include_once(PAGES_PATH . 'jsscripts.php');?>

    <script>
        function showFirearmDetailsFromStockNumber(num) {
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
                xmlhttp.open("GET", "ajax_list_firearm_details.php?fStockNumber=" + num, true);
                xmlhttp.send();
            }
        }
    </script>
    <script>
        function showFirearmDetailsFromSerial(serial) {
            if (serial.length == 0) {
                document.getElementById("firearm_details").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("firearm_details").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "ajax_list_firearm_details.php?fSerial=" + serial, true);
                xmlhttp.send();
            }
        }
    </script>
    <script type="text/javascript">

        function radioButtonCheck() {
            if (document.getElementById('searchstocknumber').checked) {
                document.getElementById('stock-number-block').style.display = 'block';
                document.getElementById('serial-block').style.display = 'none';
            } else if (document.getElementById('searchserial').checked) {
                document.getElementById('stock-number-block').style.display = 'none';
                document.getElementById('serial-block').style.display = 'block';
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
                <table>
                    <tr>
                        <td>
                            <h3>Search Firearm:&nbsp;</h3>
                        </td>
                        <td>
                            <input type="radio" name="search" id="searchstocknumber" onclick="radioButtonCheck();">&nbsp;Stock Number&nbsp;
                            <input type="radio" name="search" id="searchserial" onclick="radioButtonCheck();">&nbsp;Serial Number
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id="stock-number-block" style="display: none">
                                <input type="text" name="firearmstocknumber" id="firearmstocknumber" placeholder="Insert Stock Number" style="width: 100%" onselect="showFirearmDetailsFromStockNumber(this.value)">
                            </div>
                            <div id="serial-block" style="display: none">
                                <input type="text" name="firearmserials" list="firearmserials" placeholder="Enter Serial Number" style="width: 100%" onselect="showFirearmDetailsFromSerial(this.value)">
                                <datalist id="firearmserials" multiple="multiple" style="height:500px;">
                                    <?php foreach ($firearmSerials as $firearmSerial) { ?>
                                        <option value="<?php echo $firearmSerial['firearm_serial_number'] ?>">
                                            <?php echo $firearmSerial['firearm_serial_number'] ?></option>
                                    <?php } ?>
                                </datalist>
                            </div>
                        </td>
                    </tr>
                </table>
                <br>
                <br>
            </div>

            <div id="firearm_details">

            </div>

            <!-- Link to Open the Modal -->
            <table>
                <tr>
                    <td>
                        <a href="<?php echo PAGES_URL; ?>add_firearm.php" class='li-modal' style="font-weight: bold;font-size: large;color: blue">Add Firearm</a>
                    </td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>
                        <a href="<?php echo PAGES_URL; ?>edit_firearm.php" class='li-modal' style="font-weight: bold;font-size: large;color: red">Edit Firearm</a>
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
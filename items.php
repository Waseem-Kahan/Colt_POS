<?php
    require_once('../config.inc.php');
    require_once(CLASS_PATH . 'item.class.php');

    $itemObj = new Item();
    $itemDescriptions = $itemObj->listItemDescriptions();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Items</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <?php include_once(PAGES_PATH . 'styles.php'); ?>
    <?php include_once(PAGES_PATH . 'jsscripts.php');?>

    <script>
        function showItemDetailsFromBarcode(code) {
            if (code.length == 0) {
                document.getElementById("item_details").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("item_details").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "ajax_list_item_details.php?barcode=" + code, true);
                xmlhttp.send();
            }
        }
    </script>
    <script>
        function showItemDetailsFromDescription(str) {
            if (str.length == 0) {
                document.getElementById("item_details").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("item_details").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "ajax_list_item_details.php?description=" + str, true);
                xmlhttp.send();
            }
        }
    </script>
    <script type="text/javascript">

        function radioButtonCheck() {
            if (document.getElementById('searchbarcode').checked) {
                document.getElementById('barcode-block').style.display = 'block';
                document.getElementById('description-block').style.display = 'none';
            } else if (document.getElementById('searchdescription').checked) {
                document.getElementById('barcode-block').style.display = 'none';
                document.getElementById('description-block').style.display = 'block';
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
                            <h3>Search Item:&nbsp;</h3>
                        </td>
                        <td>
                            <input type="radio" name="search" id="searchbarcode" onclick="radioButtonCheck();">&nbsp;Barcode&nbsp;
                            <input type="radio" name="search" id="searchdescription" onclick="radioButtonCheck();">&nbsp;Description
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id="barcode-block" style="display: none">
                                <input type="text" name="itembarcode" id="itembarcode" placeholder="Scan/Insert Barcode" style="width: 100%" onselect="showItemDetailsFromBarcode(this.value)">
                            </div>
                            <div id="description-block" style="display: none">
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
                <br>
                <br>
            </div>

            <div id="item_details">

            </div>

            <!-- Link to Open the Modal -->
            <table>
                <tr>
                    <td>
                        <a href="<?php echo PAGES_URL; ?>add_item.php" class='li-modal' style="font-weight: bold;font-size: large;color: blue">Add Item</a>
                    </td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>
                        <a href="<?php echo PAGES_URL; ?>edit_item.php" class='li-modal' style="font-weight: bold;font-size: large;color: red">Edit Item</a>
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
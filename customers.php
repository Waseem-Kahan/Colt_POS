<?php
    require_once('../config.inc.php');
    require_once(CLASS_PATH . 'customer.class.php');

    $customerObj = new Customer();
    $customerNames = $customerObj->listCustomerNames();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Customers</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <?php include_once(PAGES_PATH . 'styles.php'); ?>
    <?php include_once(PAGES_PATH . 'jsscripts.php');?>

    <script>
        function showDetails(str) {
            if (str.length == 0) {
                document.getElementById("customer_details").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("customer_details").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "ajax_list_customer_details.php?q=" + str, true);
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
            <h3>Search Customer: </h3><input type="text" name="customernames" list="customernames" placeholder="Insert Customer Name" onselect="showDetails(this.value)">
            <datalist id="customernames" multiple="multiple" style="height:500px;">
                <?php foreach ($customerNames as $customerName) { ?>
                    <option value="<?php echo $customerName['customer_name'] ?>">
                        <?php echo $customerName['customer_name'] ?></option>
                <?php } ?>
            </datalist>
                <br><br>

            </div>

            <div id="customer_details">

            </div>

            <!-- Link to Open the Modal -->
            <table>
                <tr>
                    <td>
                        <a href="<?php echo PAGES_URL; ?>add_customer.php" class='li-modal' style="font-weight: bold;font-size: large;color: blue">Add Customer</a>
                    </td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>
                        <a href="<?php echo PAGES_URL; ?>edit_customer.php" class='li-modal' style="font-weight: bold;font-size: large;color: red">Edit Customer</a>
                    </td>
                </tr>
            </table>


            <!-- The Modal -->
            <div class="modal" id="theModal">
                <div class="modal-dialog">
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
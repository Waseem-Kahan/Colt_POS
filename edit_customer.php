<?php
require_once('../config.inc.php');
//$permissionNeeded = 'm1Sales';
//require_once('../user_session_check.php');
//require_once(CLASS_PATH . 'customer.class.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Customer</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include_once(PAGES_PATH . 'styles.php'); ?>
    <?php include_once(PAGES_PATH . 'jsscripts.php');?>

    <script>
        function customerDetails(str) {
            if (str.length == 0) {
                document.getElementById("edit_customer_details").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("edit_customer_details").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "ajax_edit_customer_details.php?cName=" + str, true);
                xmlhttp.send();
            }
        }
    </script>

</head>

<body>


        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Edit Customer</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form action="<?php echo PROCESS_URL; ?>edit_customer.php" method="post" name="edit_customer" id="edit_customer">
                <div id="edit_customer_details">
                    <table class="table table-striped">
                        <tr>
                            <td><label for="customer_name">Customer Name:&nbsp;</label></td>
                            <td><input type="text" name="customer_name" id="customer_name" onselect="customerDetails(this.value)"></td>
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

<?php
    require_once('../config.inc.php');
//    require_once(CLASS_PATH . 'queries.class.php');
?>

<!DOCTYPE HTML>
<html>

<head>
	
    <?php include_once(PAGES_PATH . 'styles.php'); ?>
    <?php include_once(PAGES_PATH . 'jsscripts.php');?>

</head>

<body>
    <div class="container-fluid" id="maincontainer">

        <?php require_once(PAGES_PATH . 'header.php'); ?>
        <?php require_once(PAGES_PATH . 'topmenu.php'); ?>


        <div id="contentcontainer" class="contentcontainer">

            <?php require_once(PAGES_PATH . 'footer.php'); ?>
        </div>
    </div>
</body>
</html>
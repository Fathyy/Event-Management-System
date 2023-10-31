<?php
// 
if (!defined('WEB_ROOT')) {
    exit;
}

$self = WEB_ROOT . 'index.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.php'?>
</head>
<body class="skin-blue sidebar-mini">
    <div class="wrapper">
        <!-- left aside column that contains logo and sidebar -->
        <aside class="main-sidebar">
            <?php include 'sidebar.php'?>
        </aside>

        <header class="main-header">
            <?php include 'nav.php'?>
            
            <!-- page content -->
            <div class="content-wrapper">
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- include notifications page -->
                            <?php include 'messages.php'?>
                        </div>
                    </div>

                    <div class="row">
                        <?php require_once $content?>
                    </div>
                </section>
            </div>
        </header>
  
    </div>
    <!-- footer -->
    <?php include 'footer.php'?>

</body>
</html>
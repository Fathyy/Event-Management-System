<?php
// 
if (!defined('WEB_ROOT')) {
    exit;
}

$self = WEB_ROOT . '/index.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.php'?>
</head>
<body class="skin-blue sidebar-mini">
    <div class="wrapper">
        <!-- left aside column that contains logo and sidebar -->
        <header class="main-header">
            <!-- Logo -->
            <a href="<?php echo WEB_ROOT; ?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-lg"><b>Event Management</b></span> </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top main-header" role="navigation">
            <?php include('nav.php'); ?>
            </nav>
        </header>
        
        <aside class="main-sidebar">
            <?php include 'sidebar.php'?>
        </aside>
            
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
        
  
    </div>
    <!-- footer -->
    <?php include 'footer.php'?>

</body>
</html>
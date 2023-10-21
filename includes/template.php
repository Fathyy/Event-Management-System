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
        <header class="main-header">
            <a href="<?php echo WEB_ROOT?>" class="logo">
                <span class="logo-lg"><b>Event Management </b></span>
            </a>

            <nav class="navbar navbar-static-top" role="navigation">
                <?php include 'nav.php'?>
            </nav>
        </header>


        <!-- letf aside column that contains logo and sidebar -->
        <aside class="main-sidebar">
            <?php include 'sidebar.php'?>
        </aside>


        <!-- page content -->
        <div class="content-wrapper">
            <section class="section-header">
                <h1>Event Management <small>manage your events easily</small></h1>
                <ol class="breadcrumb">
                    <li><a href=""><i class="fa fa-dashboard"></i>Home</a></li>
                    <li class="active">Calender</li>
                </ol>
            </section>

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

        <!-- footer -->
        <footer class="main-footer">
            <?php include 'footer.php'?>
        </footer>
    </div>
    
</body>
</html>
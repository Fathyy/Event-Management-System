<?php 
require_once './library/config.php';
require_once './library/functions.php';

$errorMessage = '&nbsp;';
// log a person in if they have provided correct credentials
if (isset($_POST['name']) && isset($_POST['pwd'])) {
    $result = doLogin();
    if ($result !== '') {
        $errorMessage = $result;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include './includes/header.php'?>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Event Management System</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group mb-3">
                                <input type="text" name="name" class="form-control" placeholder="Username">
                            </div>

                            <div class="form-group mb-3">
                                <input type="password" name="pwd" class="form-control" placeholder="Password">
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                
                                </div>
                                <div class="col-md-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include './includes/footer.php'?> 
</body>
</html>
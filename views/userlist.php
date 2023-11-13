<?php $records = getUserRecords();
$utype = '';
$type = $_SESSION['calendar_fd_user']['type'];
if($type == 'admin' || $type == 'teacher') {
	$utype = 'on';
}
?>

<div class="col-md-12">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">User Details</h3>
        </div>

        <div class="box-body">
            <table class="table table-bordered">
                <tr>
                    <th style="width:10px">#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>User role</th>
                    <th style="width: 100px">Status</th>
                    <?php
                    if ($utype == 'on') {?>
                        <th>Action</th>
                    <?php } ?>
                </tr>

                <?php
                $idx = 1;
foreach($records as $rec) {
    extract($rec);
    $stat = '';
    if($status == "active") {
        $stat = 'success';
    } elseif($status == "lock") {
        $stat = 'warning';
    } elseif($status == "inactive") {
        $stat = 'warning';
    } elseif($status == "delete") {
        $stat = 'danger';
    }
    ?>

    <tr>
        <td><?php echo $idx++?></td>
        <td><a href="<?php echo WEB_ROOT?>views/?v=USER&ID=<?php echo $user_id?>"><?php echo strtoupper($user_name); ?></a></td>
        <td><?php echo $user_email?></td>
        <td><?php echo $user_phone?></td>

        <td>
            <i class="fa <?php echo $type == 'teacher' ? 'fa-user' : 'fa-users'?>" aria-hidden="true"><?php echo strtoupper($type);?></i>
        </td>
    </tr>

                  <?php }?>
                
            </table>
        </div>
    </div>
</div>
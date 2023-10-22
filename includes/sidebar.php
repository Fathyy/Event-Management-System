<section class="sidebar">
    <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
            <a href="<?php echo WEB_ROOT; ?>views/?v=DB">
            <i class="fa-solid fa-calendar-days"></i>
        <span>Events Calender</span></a>
        </li>

        <li class="treeview">
            <a href="<?php echo WEB_ROOT; ?>views/?v=LIST">
            <i class="fa-solid fa-newspaper"></i>
        <span>Event Booking</span></a>
        </li>

        <li class="treeview">
            <a href="<?php echo WEB_ROOT; ?>views/?v=USERS">
            <i class="fa-solid fa-users"></i>
        <span>User Details</span></a>
        </li>

        <?php
        $type = $_SESSION['calender_fd_user']['type'];
        if ($type == 'admin') {?>
            <li class="treview">
                <a href="<?php echo WEB_ROOT; ?>views/?v=HOLY">
                <i class="fa-solid fa-plane"></i>
                <span>Holidays</span>
            </a>
            </li>
        <?php } ?>
        
        
    </ul>
</section>
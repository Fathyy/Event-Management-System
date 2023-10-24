<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Event Management</h3>
        </div>

        <ul class="list-unstyled components">
            <p>Main Navigation</p>
            <li class="active">
                <a href="<?php echo WEB_ROOT; ?>views/?v=DB">
                <span>Events Calender</span></a>
            </li>

            <li>
                <a href="<?php echo WEB_ROOT; ?>views/?v=LIST">
                <span>Event Booking</span></a>
            </li>
            <li>
                <a href="<?php echo WEB_ROOT; ?>views/?v=USERS">
                <span>User Details</span></a>
            </li>

            <?php
            if (isset($_SESSION['calender_fd_user'])) {
            $type = $_SESSION['calender_fd_user']['type'];
            if ($type == 'admin') {?>
                <li>
                    <a href="<?php echo WEB_ROOT; ?>views/?v=HOLY">
                    <span>Holidays</span>
                </a>
                </li>
            <?php } ?>
            <?php } ?>
        </ul>
    </nav>

</div>
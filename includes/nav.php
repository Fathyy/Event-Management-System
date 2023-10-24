
<div id="content">
    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-align-left"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav d-flex justify-content-between">
                    <li>
                        <a>
                        <span class="hidden-xs">Welcome, <?php 
                        if (isset($_SESSION['calender_fd_user'])) {
                            echo strtoupper($_SESSION['calender_fd_user']['name']);
                        }
                        ?></span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo WEB_ROOT;?>?logout">
                            <span class="hidden-xs"><i class="fa-solid fa-right-from-bracket"></i>&nbsp;Log Out</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
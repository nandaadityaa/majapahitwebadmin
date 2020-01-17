<header class="navbar navbar-default">
    <!-- Left Header Navigation -->
    <ul class="nav navbar-nav-custom">
        <!-- Main Sidebar Toggle Button -->
        <li>
            <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">
                <i class="fa fa-bars fa-fw"></i>
            </a>
        </li>
        <!-- END Main Sidebar Toggle Button -->
    </ul>
    <!-- END Left Header Navigation -->
    <!-- Right Header Navigation -->
    <ul class="nav navbar-nav-custom pull-right">
        <!-- User Dropdown -->
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                <li class="divider"></li>
                <li>
                    <a href="<?php echo base_url('index.php/admin/admin/profil/'.$this->auth_m->data('idx')); ?>">
                        <i class="fa fa-user fa-fw pull-right"></i>
                        Akun
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="<?php echo base_url('index.php/help/tutorial'); ?>"target="_blank">
                        <i class="gi gi-display fa-fw pull-right"></i>
                        Demo
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="<?php echo base_url('index.php/main/logout'); ?>"><i class="fa fa-ban fa-fw pull-right"></i> Keluar</a>
                </li>
            </ul>
        </li>
        <!-- END User Dropdown -->
    </ul>
    <!-- END Right Header Navigation -->
    
</header>
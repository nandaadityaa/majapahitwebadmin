<header class="navbar navbar-default">

    <!-- Navbar Header -->

    <div class="navbar-header">

        <!-- Horizontal Menu Toggle + Alternative Sidebar Toggle Button, Visible only in small screens (< 768px) -->

        <!-- <ul class="nav navbar-nav-custom pull-right visible-xs">

            <li>

                <a href="javascript:void(0)" data-toggle="collapse" data-target="#horizontal-menu-collapse">Menu</a>

            </li>

            <li>

                <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar-alt');">

                    <i class="gi gi-share_alt"></i>

                    <span class="label label-primary label-indicator animation-floating">4</span>

                </a>

            </li>

        </ul> -->

        <!-- END Horizontal Menu Toggle + Alternative Sidebar Toggle Button -->



        <!-- Main Sidebar Toggle Button -->

        <ul class="nav navbar-nav-custom">

            <li>

                <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">

                    <i class="fa fa-bars fa-fw"></i>

                </a>

            </li>

        </ul>

        <!-- END Main Sidebar Toggle Button -->

    </div>

    <!-- END Navbar Header -->



    <!-- Alternative Sidebar Toggle Button, Visible only in large screens (> 767px) -->
    <ul class="nav navbar-nav-custom pull-right">
        <!-- User Dropdown -->
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo base_url();?>assets/img/no_image.png" alt="avatar">
                <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                <!-- <li class="dropdown-header text-center">Account</li> -->
                <li>
                    <a href="<?php echo base_url('index.php/main/logout');?>" data-toggle="tooltip" data-placement="bottom" title="Keluar">Keluar<i class="gi gi-exit pull-right" data-toggle="modal" data-target="#logout"></i></a> 
                </li>
            </ul>
        </li>
        <!-- END User Dropdown -->
    </ul>

</header>


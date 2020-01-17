<div id="sidebar">
    <!-- Wrapper for scrolling functionality -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Brand -->
            <a href="#" class="sidebar-brand">
                <img src="<?php echo base_url();?>assets/jadin.png" style="margin:5px 25px 10px 25px;" alt="avatar">
            </a>
            <!-- END Brand -->

            <!-- User Info -->
            <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
                <div class="sidebar-user-avatar">
                    <a href="<?php echo base_url('index.php/dashboard/dashboard/index')?>">
                        <img src="<?php echo base_url();?>assets/img/placeholders/avatars/avatar2.jpg" alt="avatar">
                    </a>
                </div>
                <div class="sidebar-user-name">
                    <?php echo $_SESSION['username'];?><br><?php echo $_SESSION['adm_area'];?>
                </div>
                <div class="sidebar-user-links">
                    <a href="<?php echo base_url('index.php/admin/admin/profil')?>" data-toggle="tooltip" data-placement="bottom" title="My Account"><i class="gi gi-user"></i></a>
                    <!-- 
                    <a href="page_ready_inbox.html" data-toggle="tooltip" data-placement="bottom" title="Messages"><i class="gi gi-envelope"></i></a>
                    <a href="javascript:void(0)" class="enable-tooltip" data-placement="bottom" title="Settings" onclick="$('#modal-user-settings').modal('show');"><i class="gi gi-cogwheel"></i></a> -->
                    <a href="<?php echo base_url('index.php/main/logout');?>" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="gi gi-exit"></i></a>
                </div>
            </div>
            <!-- END User Info -->

            <!-- Sidebar Navigation -->
                <ul class="sidebar-nav">
                    <!--
                    <li class="sidebar-header">
                        <span class="sidebar-header-options clearfix"><a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings"><i class="gi gi-settings"></i></a><a href="javascript:void(0)" data-toggle="tooltip" title="Create the most amazing pages with the widget kit!"><i class="gi gi-lightbulb"></i></a></span>
                        <span class="sidebar-header-title">Proses</span>
                    </li>
                    -->
                    <li>
                        <a href="<?php echo base_url('index.php/dashboard/dashboard/index'); ?>" <?php echo ($this->uri->segment(2) == 'dashboard')?' class="active"':''?>><i class="fa fa-dashboard sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Dashboard</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('index.php/tracking/tracking/index'); ?>" <?php echo ($this->uri->segment(2) == 'tracking')?' class="active"':''?>><i class="fa fa-map-marker sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Tracking Teknisi</span></a>
                    <li>
                        <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-cubes sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Alokasi Job</span></a>
                        <ul>
                            <li>
                                <a href="page_ecom_dashboard.html">Proaktif</a>
                            </li>
                            <li>
                                <a href="page_ecom_orders.html">Maintenance</a>
                            </li>
                            <li>
                                <a href="page_ecom_order_view.html">Instal</a>
                            </li>
                            <li>
                                <a href="page_ecom_order_view.html">Init</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-exchange sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Mutasi Job</span></a>
                        <ul>
                            <li>
                                <a href="page_ecom_dashboard.html">Proaktif</a>
                            </li>
                            <li>
                                <a href="page_ecom_orders.html">Maintenance</a>
                            </li>
                            <li>
                                <a href="page_ecom_order_view.html">Instal</a>
                            </li>
                            <li>
                                <a href="page_ecom_order_view.html">Init</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-envelope sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Push Notifikasi</span></a>
                        <ul>
                            <li>
                                <a href="page_ecom_dashboard.html">Broadcast</a>
                            </li>
                            <li>
                                <a href="page_ecom_orders.html">Teknisi</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="page_widgets_stats.html"><i class="fa fa-paper-plane sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Job Order</span></a>
                    </li>
                    <li>
                        <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-database sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Report</span></a>
                        <ul>
                            <li>
                                <a href="page_ecom_dashboard.html">Attendance</a>
                            </li>
                            <li>
                                <a href="page_ecom_orders.html">Status Job Sementara</a>
                            </li>
                            <li>
                                <a href="page_ecom_order_view.html">Commision</a>
                            </li>
                            <li>
                                <a href="page_ecom_order_view.html">Histori Job</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            <!-- END Sidebar Navigation -->
        </div>
        <!-- END Sidebar Content -->
    </div>
    <!-- END Wrapper for scrolling functionality -->
</div>
                
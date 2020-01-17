<!-- <script>
    $('#logout').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        
        $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
    });
</script> -->
<!-- awalnya di index bentrok sama grafik-->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/vendor/jquery.min.js"></script> 
<!-- awalnya di index bentrok sama grafik-->
<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Konfirmasi Keluar</h4>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin keluar?</p>
            </div> 
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
                <a href="<?php echo base_url('index.php/main/logout');?>" class="btn btn-danger">YES</a> 
                <!-- <button type="button" class="btn btn-danger btn-ok">YES</button> -->
            </div>
        </div>
    </div>
</div>
<div id="sidebar">
    <!-- Wrapper for scrolling functionality -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Brand -->
            <a href="<?php echo base_url('index.php/dashboard/dashboard/index')?>" class="sidebar-brand text-center">
               <!--  <img src="<?php echo base_url();?>assets/logo.png" style="margin:5px 25px 10px 25px;" alt="avatar">  -->
                <b>Website Penjualan</b>
            </a>
            <!-- END Brand -->
            <!-- User Info -->
            <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
                <div class="sidebar-user-avatar">
                    <?php
                        $id_admin =$this->auth_m->data('id_admin');
                        $data=$this->db->query("select * from tb_admin where id_admin='$id_admin'");
                        #var_dump("select * from tb_admin where id_admin='$id_admin'");exit();
                        foreach ($data->result() as $sess) {   
                            $nama       = $sess->nama_admin; 
                            $alamat   = $sess->alamat; 
                            $no_hp  = $sess->no_hp; 
                            $id_admin      = $sess->id_admin; 
                        }
                        #var_dump($id_admin);exit();
                        #nanda.adityaa@gmail.com
                    ?>
                    <a href="<?php echo base_url('index.php/dashboard/dashboard/index')?>">
                        
                        <img src="<?php echo base_url();?>assets/img/no_image.png" alt="avatar">
                    </a>
                </div>
                <div class="sidebar" style="font-size: 12px;">
                    <?php echo strtoupper($nama)?><br>  <br>
                </div>
                <div class="sidebar-user-links">
                    <a href="#" data-href="<?php echo base_url('index.php/main/logout');?>" data-toggle="tooltip" data-placement="bottom" title="Keluar"><i class="gi gi-exit" data-toggle="modal" data-target="#logout"></i></a> 
                </div>
            </div>
            <!-- END User Info -->
            <!-- Sidebar Navigation -->
                <ul class="sidebar-nav">
                    <li>
                        <a href="<?php echo base_url('/dashboard/dashboard')?>"<?php echo ($this->uri->segment(1) == 'dashboard')?' class="active"':''?>><i class="fa fa-dashboard sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Dashboard</span></a>
                    </li> 
                    <li>
                        <a href="<?php echo base_url('/user/user/list_user')?>"<?php echo ($this->uri->segment(2) == 'user')?' class="active"':''?>><i class="fa fa-list-alt sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">List User</span></a>
                    </li>
                    <li> 
                        <a href="<?php echo base_url('/hadiah/hadiah/list_hadiah')?>"<?php echo ($this->uri->segment(2) == 'hadiah')?' class="active"':''?>><i class="fa fa-list-alt sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">List Hadiah</span></a>
                    </li> 
                    <li>
                        <a href="<?php echo base_url('/barang/barang/list_barang')?>"<?php echo ($this->uri->segment(2) == 'barang')?' class="active"':''?>><i class="fa fa-list-alt sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">List Barang</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('/transaksi/transaksi/list_transaksi')?>"<?php echo ($this->uri->segment(2) == 'transaksi' and ($this->uri->segment(3) != 'report' and $this->uri->segment(3) != 'lihat_report'))?' class="active"':''?>><i class="gi gi-riflescope sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Transaksi</span></a>
                    </li>
                    <div class="sidebar-header sidebar-nav-mini-hide">
                        <span class="sidebar-header-options clearfix">
                            <i class="gi gi-settings"></i>
                        </span>
                        <span class="sidebar-header-title">General</span>
                    </div>
                    <li>
                        <a href="<?php echo base_url('/admin/admin/list_admin')?>"<?php echo ($this->uri->segment(2) == 'admin')?' class="active"':''?>><i class="fa fa-list-alt sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">List Admin</span></a>
                    </li>
                </ul>
            <!-- END Sidebar Navigation -->
        </div>

        <!-- END Sidebar Content -->
    </div>
    <div id="sidebar" style="margin-bottom: 10%">
    </div>
    <!-- END Wrapper for scrolling functionality -->
</div>

                
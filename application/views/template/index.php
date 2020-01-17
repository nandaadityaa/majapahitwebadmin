<?php 
   $cek_session=$this->auth_m->data('id_admin'); 
    if($cek_session == ""){
    redirect(base_url('index.php/main/login'));
}else{ 
?>
    <!DOCTYPE html>
        <head>
            <meta charset="utf-8">
            <title>Website Admin</title>
            <meta name="description" content="Key Performance Indicators">
            <meta name="author" content="pixelcave">
            <meta name="robots" content="noindex, nofollow">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
            <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/download.png">
            <script type='text/javascript' src='<?php echo base_url();?>assets/js/jquery-1.8.2.min.js'></script>
            <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="<?php echo base_url();?>assets/css/plugins.css">
            <link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css">
            <link rel="stylesheet" href="<?php echo base_url();?>assets/css/themes.css">
            <script src="<?php echo base_url();?>assets/js/vendor/modernizr.min.js"></script>  
        </head>
        <body>
            <div id="page-wrapper">
                <div class="preloader themed-background">
                    <h1 class="push-top-bottom text-light text-center"><strong>Pro</strong>UI</h1>
                    <div class="inner">
                        <h3 class="text-light visible-lt-ie10"><strong>Loading..</strong></h3>
                        <div class="preloader-spinner hidden-lt-ie10"></div>
                    </div>
                </div>
                <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations"  style="background-color:#313854">
                    <?php echo $sidebar;?>
                    <div id="main-container">
                        <?php echo $header_menu;?>
                        <?php echo $conten;?> 
                        <?php echo $footer;?>
                    </div>
                </div>
            </div>
            <a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>
            <div id="modal-user-settings" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h2 class="modal-title"><i class="fa fa-pencil"></i> Settings</h2>
                        </div>
                        <div class="modal-body">
                            <form action="index.html" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onsubmit="return false;">
                                <fieldset>
                                    <legend>Vital Info</legend>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Username</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static">Admin</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="user-settings-email">Email</label>
                                        <div class="col-md-8">
                                            <input type="email" id="user-settings-email" name="user-settings-email" class="form-control" value="admin@example.com">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="user-settings-notifications">Email Notifications</label>
                                        <div class="col-md-8">
                                            <label class="switch switch-primary">
                                                <input type="checkbox" id="user-settings-notifications" name="user-settings-notifications" value="1" checked>
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Password Update</legend>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="user-settings-password">New Password</label>
                                        <div class="col-md-8">
                                            <input type="password" id="user-settings-password" name="user-settings-password" class="form-control" placeholder="Please choose a complex one..">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="user-settings-repassword">Confirm New Password</label>
                                        <div class="col-md-8">
                                            <input type="password" id="user-settings-repassword" name="user-settings-repassword" class="form-control" placeholder="..and confirm it!">
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="form-group form-actions">
                                    <div class="col-xs-12 text-right">
                                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php if($this->uri->segment(1) != 'dashboard'){ ?>
            <script src="<?php echo base_url();?>assets/js/vendor/jquery.min.js"></script>
            <?php } ?>
            <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-ui.js"></script>
            <script src="<?php echo base_url();?>assets/js/vendor/bootstrap.min.js"></script>
            <script src="<?php echo base_url();?>assets/js/plugins.js"></script>
            <script src="<?php echo base_url();?>assets/js/app.js"></script>
            <script src="<?php echo base_url();?>assets/js/pages/formsValidation.js"></script>
            <script>$(function() { FormsValidation.init(); });</script>
            <?php if($this->uri->segment(3) != 'report'){ ?>
                <script src="<?php echo base_url();?>assets/js/pages/tablesDatatables.js"></script>
                <script>$(function(){ TablesDatatables.init(); });</script>
            <?php } ?>
        </body>
    </html>
<?php  } ?>
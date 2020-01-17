<!DOCTYPE html> 
 <html class="no-js" lang="en"> 
    <head>
        <meta charset="utf-8">
        <title>Website Penjualan</title>
        <meta name="description" content="Key Performance Indicators">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/download.png">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/plugins.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/themes.css">
        <script src="<?php echo base_url();?>assets/js/vendor/modernizr.min.js"></script>
    </head>
    <img src="<?php echo base_url();?>assets/img/logos.png" alt="Login Full Background" class="full-bg" sytle='color:#D2D6DE'>
    <body style="background-color: #D2D6DE">
        <div id="login-container" class="animation-fadeIn">
            <div class="login-title text-center" style="background-color: #D2D6DE">
                <b><h1 style="color:black;">Website Penjualan</h1></b>
            </div>                        
            <div class="col-xs-12">
                <?php echo view_errors();?>
            </div>
            <div class="block push-bit"> 
				<?php echo form_open('main/login','class="form-horizontal" method="post" id="form-login" class="form-horizontal form-bordered form-control-borderless"');?>  
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"  style="background-color: #e2dcdc;"><i class="gi gi-envelope"></i></span>
                                <input type="text" id="username" name="username" class="form-control input-lg" placeholder="Email" autocomplete="off" style="background-color: #f3f3f3;">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"  style="background-color: #e2dcdc;"><i class="gi gi-asterisk"></i></span>
                                <input type="password" id="password" name="password" class="form-control input-lg" placeholder="Password" style="background-color: #f3f3f3;">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-xs-12 text-right">
                            <button name="submit" type="submit" value="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Sign in</button>
                        </div>
                    </div><!-- 
                    <div class="form-group">
                        <div class="col-xs-12 text-center">
                            <a href="javascript:void(0)" id="link-reminder-login"><small>Forgot password?</small></a>
                        </div>
                    </div> -->
                    <div class="form-group">
                        <div class="col-xs-12 text-center" style="padding:10px">
                            <a href="http://www.jadinmedianet.com/" target="_blank"  style="color:#b9b0b0;text-decoration:none"> Copyrights 2019 </a>
                        </div>
                    </div>
				<?php echo form_close();?>
              <!--   <?php //echo site_url('/main/reset_email'); ?> -->
                <form action="#" method="#" id="form-reminder" class="form-horizontal form-bordered form-control-borderless display-none"> 
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon" style="background-color: #e2dcdc;"><i class="gi gi-envelope"></i></span>
                                <input type="text" id="reminder-email" name="reminder-email" class="form-control input-lg" placeholder="Email" style="background-color: #f3f3f3;" autocomplete="off">
                            </div>
                        </div>
                        <!-- <div class="col-xs-12"> 
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                                <input type="text" id="reminder-email" name="reminder-email" class="form-control input-lg" placeholder="Email">
                            </div> 
                        </div> -->
                    </div>

                    <div class="form-group form-actions">
                        <div class="col-xs-12 text-right">
                            <button name="submit" type="submit" value="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Reset Password</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12 text-center">
                            <small>Did you remember your password?</small> <a href="javascript:void(0)" id="link-reminder"><small>Login</small></a>
                        </div>
                    </div>
                </form>

                <form action="login_full.html#register" method="post" id="form-register" class="form-horizontal form-bordered form-control-borderless display-none">
                    <div class="form-group">
                        <div class="col-xs-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                <input type="text" id="register-firstname" name="register-firstname" class="form-control input-lg" placeholder="Firstname">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <input type="text" id="register-lastname" name="register-lastname" class="form-control input-lg" placeholder="Lastname">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                                <input type="text" id="register-email" name="register-email" class="form-control input-lg" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                <input type="password" id="register-password" name="register-password" class="form-control input-lg" placeholder="Password">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                <input type="password" id="register-password-verify" name="register-password-verify" class="form-control input-lg" placeholder="Verify Password">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-xs-6">
                            <a href="#modal-terms" data-toggle="modal" class="register-terms">Terms</a>
                            <label class="switch switch-primary" data-toggle="tooltip" title="Agree to the terms">
                                <input type="checkbox" id="register-terms" name="register-terms">
                                <span></span>
                            </label>
                        </div>
                        <div class="col-xs-6 text-right">
                            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Register Account</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12 text-center">
                            <small>Do you have an account?</small> <a href="javascript:void(0)" id="link-register"><small>Login</small></a>
                        </div>
                    </div>
                </form>
            </div>
        <br><br><br><br>
        <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
        <script src="<?php echo base_url();?>assets/js/vendor/jquery.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/vendor/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/plugins.js"></script>
        <script src="<?php echo base_url();?>assets/js/app.js"></script>
        <!-- Load and execute javascript code used only in this page -->
        <script src="<?php echo base_url();?>assets/js/pages/login.js"></script>
        <script>$(function(){ Login.init(); });</script>
    </body>
</html>
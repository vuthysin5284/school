<!DOCTYPE html>
<html>
<head>
    
    <!-- Title -->
    <title>EDS | Login - Sign in</title>
    
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta charset="UTF-8">
    <meta name="description" content="school management" />
    <meta name="keywords" content="school,dashboard" />
    <meta name="author" content="sin,vuthy" />
    
    <!-- Styles -->
    <!--link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'-->
    <link href="assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!--link href="assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
    <link href="assets/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/-->
    
    <!-- Theme Styles -->
    <link href="assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>

    <!--script src="assets/plugins/3d-bold-navigation/js/modernizr.js"></script-->

    
    
</head>
<body class="page-login">
    <main class="page-content">
        <div class="page-inner">
            <div id="main-wrapper">
                <div class="row">
                    <div class="col-md-3 center" style="margin-top: 10%">
                        <div class="login-box">
                            <a href="<?php echo base_url();?>" class="logo-name text-lg text-center">If you are user's in system</a>
                            <p class="text-center m-t-md">Please login into your account.</p> 
                            <?php echo form_open(base_url() . 'login/ajax_login' , array('class' => 'form-horizontal form-groups-bordered validate ajax-submit m-t-md','enctype' => 'multipart/form-data'));?>
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                </div>
                                <button type="submit" class="btn btn-info btn-block">Login</button>
                                <a href="forgot.html" class="display-block text-center m-t-md text-sm">Forgot Password?</a>
                                <!--p class="text-center m-t-xs text-sm">Do not have an account?</p>
                               <a href="<?php echo base_url();?>register" class="btn btn-default btn-block m-t-md">Create an account</a-->
                            </form>
                            <p class="text-center m-t-xs text-sm">2015 &copy; EDS by Vuthy Teams.</p>
                        </div>
                    </div>
                </div><!-- Row -->
            </div><!-- Main Wrapper -->
        </div><!-- Page Inner -->
    </main><!-- Page Content -->


    <!-- Javascripts-->
    <script src="assets/plugins/pace-master/pace.min.js"></script>
    <!--script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
    <script src="assets/plugins/jquery/jquery-2.1.4.min.js"></script>
    <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/plugins/switchery/switchery.min.js"></script>
    <script src="assets/plugins/uniform/jquery.uniform.min.js"></script>
    <script src="assets/plugins/classie/classie.js"></script>
    <script src="assets/plugins/waves/waves.min.js"></script>
    <script src="assets/js/modern.min.js"></script>-->

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
    <link href="<?php echo base_url();?>assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>

    <!-- Styles -->
    <!--link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'-->
    <link href="assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- Theme Styles -->

    <link href="assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="assets/css/neon-core.css">
    <link rel="stylesheet" href="assets/css/neon-forms.css">
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>

    <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>
        var baseurl = '<?php echo base_url();?>';
    </script>

</head>
<body class="page-body login-page login-form-fall" data-url="http://neon.dev">


<!-- This is needed when you send requests via Ajax -->
<script type="text/javascript">
    var baseurl = '<?php echo base_url();?>';
</script>

<div class="login-container">

    <div class="login-header login-caret">

        <div class="login-content" style="width:100%;">

            <a href="<?php echo base_url();?>" class="logo">
                <img src="uploads/logo.png" height="60" alt="" />
            </a>

            <h2 style="color:#cacaca; font-weight:100;">
                <a href="<?php echo base_url();?>" class="logo-name text-lg text-center">If you are user's in system</a>
                <p class="text-center m-t-md" style="color: #0a6aa1">Please login into your account.</p>
            </h2>

            <!-- progress bar indicator -->
            <div class="login-progressbar-indicator">
                <h3>43%</h3>
                <span>logging in...</span>
            </div>
        </div>

    </div>

    <div class="login-progressbar">
        <div></div>
    </div>

    <div class="login-form">

        <div class="login-content">

            <div class="form-login-error">
                <h3>Invalid login</h3>
                <p>Please enter correct username and password!</p>
            </div>

            <form method="post" role="form" id="form_login">

                <div class="form-group">

                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </div>

                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" autocomplete="off" data-mask="username" />
                    </div>

                </div>

                <div class="form-group">

                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-key"></i>
                        </div>

                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" />
                    </div>

                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-home"></i>
                        </div>
                        <select class="form-control" id="running_sesion" name="running_sesion" required>
                            <option value="">Running session</option>
                            <option value="1">2016 - 2017</option>
                            <option value="2">2017 - 2018</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-info btn-block">
                        <i class="fa fa-sign-in"></i>
                        Login
                    </button>
                </div>


            </form>
            <a href="forgot.html" style="color: #0a6aa1" class="display-block text-center m-t-md text-sm">Forgot Password?</a>


            <p style="color: #0a6aa1" class="text-center m-t-xs text-sm">2015 &copy; EDS by Vuthy Teams.</p>

        </div>

    </div>

</div>


<!-- Javascripts-->
<script src="assets/plugins/pace-master/pace.min.js"></script>
<script src="assets/js/gsap/main-gsap.js"></script>
<script language="JavaScript"  src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/jquery-validation/jquery.validate.js"></script>
<script src="assets/js/login.js"></script>


</body>
</html>
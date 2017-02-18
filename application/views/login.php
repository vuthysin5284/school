  
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap3.3.2.min.css" /> 
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-icons/font-awesome/css/font-awesome.min.css"> 
    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootsnipp.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/forms.css" />
    <style type="text/css">
	
	 
	.form-signin input[type="text"] {
	  margin-bottom: -1px;
	  border-bottom-left-radius: 0;
	  border-bottom-right-radius: 0;
	}
	.form-signin input[type="password"] { 
	  border-top-left-radius: 0;
	  border-top-right-radius: 0;
	}
	.form-signin .form-control {
	  position: relative;
	  font-size: 16px;
	  height: auto;
	  padding: 10px;
	  -webkit-box-sizing: border-box;
	     -moz-box-sizing: border-box;
	          box-sizing: border-box;
	}
	.row { 
		    margin-right: 0px; 
    		margin-left: -15px;
	}
</style>
<body class="page-body login-page login-form-fall" >
<div class="login-container"> 
                    
    <div class="login-content" style="width:100%; text-align:center;"> 
        <!-- progress bar indicator -->
        <div class="login-progressbar-indicator">
            <h3 style="color:red">43%</h3>
            <span>logging in...</span>
        </div>
    </div> 
    <div class="login-progressbar">
        <div></div>
    </div>
 
 
	<div class="row" style="margin-top:60px;"> 
     
        
        <div class="login-form">
            <div class="col-md-4 col-md-offset-4">
                     
                    <div class="form-login-error" style="display: none;">
                        <h3>Invalid login</h3>
                        <p>Please enter correct username and password!</p>
                    </div>
    
    
                    <form method="POST" accept-charset="UTF-8" role="form" id="form_login" class="form-signin">
                        <input name="_token" type="hidden" value="TCta3gBWIjO2A0TOk4UGGbfwfAiD2nBe9R8deX6Z">
                        <fieldset>
                            <h3 class="sign-up-title" style="color:dimgray; text-align:left">Welcome! Please sign in</h3>
                                
                            <hr class="colorgraph">  
                            
                            <div class="form-group">
                            	<div class="input-group" style="width:100%">
                                <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                                    <input class="form-control email-title" placeholder="User ID" name="username" autofocus 
                                        id="username" type="text" utocomplete="off" data-mask="username" style="color:black"/> 
                                </div>
                            </div>
                            <div class="form-group">
                            	<div class="input-group" style="width:100%">
                                <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" 
                                        autocomplete="off" style="color:black"/> 
                                </div>
                            </div>
                            
                            <a class="pull-right" href="#">Forgot password?</a>
                            <div class="checkbox" style="width:140px;">
                                <label><input name="remember" type="checkbox" value="Remember Me"> Remember Me</label>
                            </div>
                            <input class="btn btn-lg btn-primary btn-block" type="submit" value="Login"> 
                        </fieldset>
                </form> 
  			</div>
    
    	</div>
  	</div>
</div>  
</body>
<script type="text/javascript">
var baseurl = '<?php echo base_url();?>';
</script>

<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>
<script src='<?php echo base_url()?>assets/js/jquery-1.12.2.min.js'></script>  
<script src='<?php echo base_url()?>assets/js/bootstrap3.3.2.min.js'></script>  
<script src="<?php echo base_url()?>assets/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url()?>assets/js/login.js"></script>
      

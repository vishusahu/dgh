<style>
 .error.valid {
margin-left: 456px !important; margin-top: -54px !important;
}
</style>
<script>
$('error.valid').removeAttr('margin')
</script>
<link rel="stylesheet" href="<?php echo $this->config->item("base_url_images");?>css/layout.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->config->item("base_url_images");?>css/animate-custom.css" type="text/css" />



<body id="Dashboard">
</div>
<!-- header ends here -->

<!-- login starts here -->
<div class="LoginBody">
	<h5>Login</h5>
   <div style="color:red;"> <?php 
    echo $this->session->userdata('msg');$this->session->unset_userdata('msg');
    ?> </div>
            
    <form action="<?php echo $this->config->base_url();?>index.php/user_login" method="POST" id="loginForm">
	<label>Username</label>
    <input type="text" name="username" id="username" />
    <label class="error_msg"><?php echo form_error('username');?></label><br />
	<br /><label>Password</label>
    <input type="password" name="userpassword" id="userpassword" />
	<label class="error_msg"><?php echo form_error('userpassword');?></label> 
    <br /><br /><input type="submit" name="signIn" id="signIn" value="Sign In" />
    </form>
    
    <div class="clear"></div>
</div>
<!-- login ends here -->
<script>
// just for the demos, avoids form submit
jQuery.validator.setDefaults({
  debug: false,
  success: "valid"
});
$( "#loginForm" ).validate({
  rules: {
    username: {
      required: true     
    },
     userpassword: {
      required: true
    }
  }
});
</script>

</body>

</html>

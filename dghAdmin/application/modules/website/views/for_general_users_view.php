<!-- Section-->
<p class="line">&nbsp;</p>
<div class="container">
    <div class="breadtext"></div>   
    <div class="heading"> For General Users</div>
    <p >&nbsp;</p><div style="padding:20px;">
<p ><?php
    echo $this->session->flashdata('success_msg');
    ?></p>
  <p >&nbsp;</p>
    <form id="contact" name="contact" action="<?php echo base_url(); ?>index.php/for_general_users" method="post">
        <label for="email">Your E-mail</label>
        <input type="email" id="email" name="user_name" class="txt" required="true" email="true" >
          <label for="submit"></label>
        <input id="send" type="submit" name="postFeedback" value="submit" onclick="validateEmail()"  />
    </form>
    </div>
    
</div>


<p >&nbsp;</p>
<div id="inline">
    
</div>

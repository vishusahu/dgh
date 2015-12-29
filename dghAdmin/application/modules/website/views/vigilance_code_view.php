<!-- Section-->
<p class="line">&nbsp;</p>
<div class="container">
    <div class="breadtext"></div>   
    <div class="heading"> For General Users</div>
    <p >&nbsp;</p><div style="padding:20px;">
<p ><?php
    echo $this->session->flashdata('msg');
    ?></p>
  <p >&nbsp;</p>
    <form id="contact" name="contact" action="<?php echo base_url(); ?>index.php/for_public_users" method="post">
        <label for="email">Enter Code</label>
        <input type="text" id="code" name="code" class="txt" required="true" >
          <label for="submit"></label>
        <input id="send" type="submit" name="postCode" value="submit" />
    </form>
    </div>
    
</div>


<p >&nbsp;</p>
<div id="inline">
    
</div>

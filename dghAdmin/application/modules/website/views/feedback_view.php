<!-- Section-->
<p class="line">&nbsp;</p>
<div class="container">
    <div class="breadtext">Home/Feedback</div>   
    <div class="heading"> Feedback</div>
    <p ><?php
    echo $this->session->flashdata('success_msg');
    ?></p>

    <p class="about_heading"><strong>Send us a Message</strong></p>
    <p><form id="contact" name="contact" action="<?php echo base_url(); ?>index.php/feedback" method="post">
        <label for="email">Your E-mail</label>
        <input type="email" id="email" name="user_name" class="txt" required="true" >
        <br>
        <label for="msg">Enter a Message</label>
        <textarea id="msg" name="content" class="txtarea" required="true"></textarea>
        <input id="send" type="submit" name="postFeedback" value="submit" onclick="validateEmail()" />
    </form>
    </p>
    <p></p>
    <p></p>
   
</div>

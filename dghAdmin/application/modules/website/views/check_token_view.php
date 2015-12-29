<div id="inline">
    <?php
    echo $this->session->flashdata('success_msg');
    ?>
    <form id="contact" name="contact" action="<?php echo base_url(); ?>index.php/check_token_page" method="post">
        <label for="email">Your E-mail</label>
        <input type="email" id="email" name="user_name" class="txt" required="true" email="true" >
        <label for="email">Your Token</label>
        <input type="text" id="email" name="token" class="txt" required="true" >
        <input id="send" type="submit" name="postFeedback" value="submit" onclick="validateEmail()" />
    </form>
</div>
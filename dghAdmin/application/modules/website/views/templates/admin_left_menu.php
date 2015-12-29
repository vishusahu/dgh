<?php


?>
<!-- left One Starts here -->
<div class="MainLinksRow">
    <ul>
        <?php
		//echo "<pre>";print_r($this->session->userdata);die;
        if ($this->session->userdata('ADMIN_ID') != '') {
            ?>
        
            <li class="fadeInLeft animated"><a href="<?php echo $this->config->base_url(); ?>index.php/admin/static-pages"><span class="ReportsIcon"></span>Static pages</a></li>
			<li class="fadeInLeft animated"><a href="<?php echo $this->config->base_url(); ?>index.php/admin-dgmsg"><span class="ReportsIcon"></span>DG Message</a></li>

            
            <?php }
            ?>
    </ul>
</div>
<!-- left One Ends here -->

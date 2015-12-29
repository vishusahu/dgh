<?php


?>
<!-- left One Starts here -->
<div class="MainLinksRow">
    <ul>
        <?php
		//echo "<pre>";print_r($this->session->userdata);die;
        if ($this->session->userdata('ADMIN_ID') != '') {
            ?>
            <li class="fadeInLeft animated"><a href="<?php echo $this->config->base_url(); ?>index.php/admin/categories"><span class="ReportsIcon"></span>Static pages Category</a></li>
            <li class="fadeInLeft animated"><a href="<?php echo $this->config->base_url(); ?>index.php/admin/static-pages"><span class="ReportsIcon"></span>Static pages</a></li>
            <li class="fadeInLeft animated"><a href="<?php echo $this->config->base_url(); ?>index.php/admin-dgmsg"><span class="ReportsIcon"></span>DG Message</a></li>
            <li class="fadeInLeft animated"><a href="<?php echo $this->config->base_url(); ?>index.php/admin/tender"><span class="ReportsIcon"></span>Tender</a></li>
            <li class="fadeInLeft animated"><a href="<?php echo $this->config->base_url(); ?>index.php/admin/pepdata"><span class="ReportsIcon"></span>Purchases E&P Data</a></li>
            <li class="fadeInLeft animated"><a href="<?php echo $this->config->base_url(); ?>index.php/photo/categories"><span class="ReportsIcon"></span>Gallery Category</a></li>
            <li class="fadeInLeft animated"><a href="<?php echo $this->config->base_url(); ?>index.php/admin/gallery"><span class="ReportsIcon"></span>Picture Gallery</a></li>
            <li class="fadeInLeft animated"><a href="<?php echo $this->config->base_url(); ?>index.php/admin/stories"><span class="ReportsIcon"></span>Top Stories</a></li>
            <li class="fadeInLeft animated"><a href="<?php echo $this->config->base_url(); ?>index.php/admin/upload"><span class="ReportsIcon"></span>Uploads</a></li>
            

            
            <?php }
            ?>
    </ul>
</div>
<!-- left One Ends here -->

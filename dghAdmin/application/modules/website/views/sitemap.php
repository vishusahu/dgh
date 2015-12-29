<div class="menu_container">
    <div class="menu_row">
 <div class="menu_col1">
     
     <?php 
     $objStaticPageModel=  $this->load->model('static_page_model');
        $objStaticPageModel= new static_page_model();
        $pageContent=$objStaticPageModel->getAllStaticPages();
     ?>
<p class="menu_heading"><?php echo $this->lang->line("About_DGH"); ?></p>
    		<ul class="menu1">
                    <?php 
                    //echo "<pre>";print_r($pageContent['ABOUT DGH']['pages']);die;
                    foreach ($pageContent['ABOUT DGH']['pages'] as $pc){?>
                        <li><a href="<?php echo base_url(); ?>index.php/page?pageId=<?php echo $pc['id'] ?>"><?php echo $pc['page'] ?></a></li>
                    <?php }
                    ?>
            </ul>
<p class="menu_heading"><?php echo $this->lang->line("INDIAN_HYDROCARBON_SCENARIO"); ?></p>
 <ul class="menu1">

<?php
//echo "<pre>";print_r($pageContent['ABOUT DGH']['pages']);die;
foreach ($pageContent['INDIAN HYDROCARBON SCENARIO IN LAST 5 YEARS']['pages'] as $pc) {
    ?>
                                <li><a href="<?php echo base_url(); ?>index.php/page?pageId=<?php echo $pc['id'] ?>"><?php echo $pc['page'] ?></a></li>
<?php }
?>
                        </ul></div>
						<div class="menu_col2">
                        <!--<p class="menu_heading"><a href="<?php echo base_url(); ?>index.php/discovery"><?php echo $this->lang->line("Discovery"); ?></a></p>-->
                        <p class="menu_heading"><?php echo $this->lang->line("DGH_ACTIVITIES"); ?></p>
                        <ul class="menu1">

<?php
//echo "<pre>";print_r($pageContent['ABOUT DGH']['pages']);die;
foreach ($pageContent['DGH’S ACTIVITIES']['pages'] as $pc) {
    ?>
                                <li><a href="<?php echo base_url(); ?>index.php/page?pageId=<?php echo $pc['id'] ?>"><?php echo $pc['page'] ?></a></li>
<?php }
?>


                        </ul>


                    </div>
				 


        <div class="menu_col2">
           
        </div>

 
 
 <div class="menu_col3">
 	<p class="menu_heading"> INDIA’S E&P REGIME</p>
    		<ul class="menu1">
            	<?php 
                    //echo "<pre>";print_r($pageContent['ABOUT DGH']['pages']);die;
                    foreach ($pageContent['INDIA’S E&P REGIME']['pages'] as $pc){?>
                        <li><a href="<?php echo base_url(); ?>index.php/page?pageId=<?php echo $pc['id'] ?>"><?php echo $pc['page'] ?></a></li>
                    <?php }
                    ?>
            </ul>
    
 <p class="menu_heading"> <?php echo $this->lang->line("IMPORTANT_DATA_STATISTICS_Updates"); ?></p>
    		<ul class="menu1">
            	<?php
//echo "<pre>";print_r($pageContent['ABOUT DGH']['pages']);die;
foreach ($pageContent['IMPORTANT DATA/STATISTICS/Updates']['pages'] as $pc) {
    ?>
                                <li><a href="<?php echo base_url(); ?>index.php/page?pageId=<?php echo $pc['id'] ?>"><?php echo $pc['page'] ?></a></li>
<?php }
?>
            </ul>
 </div>
<div class="menu_col4">

 	<p class="menu_heading">DOWNLOADS</p>
    		<ul class="menu1">
            	<?php 
                    //echo "<pre>";print_r($pageContent['ABOUT DGH']['pages']);die;
                    foreach ($pageContent['DOWNLOADS']['pages'] as $pc){?>
                        <li><a href="<?php echo base_url(); ?>index.php/page?pageId=<?php echo $pc['id'] ?>"><?php echo $pc['page'] ?></a></li>
                    <?php }
                    ?>
            </ul>
    
 <p class="menu_heading"> OTHERS</p>
    		<ul class="menu1">
            	<?php 
                    //echo "<pre>";print_r($pageContent['ABOUT DGH']['pages']);die;
                    foreach ($pageContent['OTHERS']['pages'] as $pc){?>
                        <li><a href="<?php echo base_url(); ?>index.php/page?pageId=<?php echo $pc['id'] ?>"><?php echo $pc['page'] ?></a></li>
                    <?php }
                    ?>
            </ul>
 
           
 </div>
 </div> 
 </div>

 
 

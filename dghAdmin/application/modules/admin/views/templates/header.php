<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Directorate General of Hydrocarbons (DGH) Admin</title>
<meta name="viewport" content="width=device-width" />

<link rel="stylesheet" href="<?php echo $this->config->base_url();?>css/layout.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->config->base_url();?>css/animate-custom.css" type="text/css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script type="text/javascript" src="<?php echo $this->config->base_url();?>js/layoutdashboard.js"></script>
<script src="<?php echo $this->config->base_url(); ?>css/validation/jquery.validate.js"></script>
<script src="<?php echo $this->config->base_url(); ?>css/validation/additional-methods.js"></script>   
                  <script src="<?php echo base_url(); ?>js/ckeditor/ckeditor.js"></script> 
<!--<script src="<?php echo $this->config->base_url();?>js/tablesorter/jquery.metadata.js"></script>
<script src="<?php echo $this->config->base_url();?>js/tablesorter/jquery.tablesorter.js"></script>
 <script src="<?php echo $this->config->base_url();?>js/tablesorter/jquery.tablesorter.min.js"></script> 
<script src="<?php echo $this->config->base_url();?>js/tablesorter/jquery.tablesorter.pager.js"></script>	-->

<div class="Header">
<!--    <img src="<?php echo $this->config->base_url();?>images/logoFooter.png"  style="margin-left: 22px; height: 44px; width: 100px; border-top-width: 0px; margin-top: -4px; margin-bottom: 0px; padding-right: 0px;"></img>-->
<div class="HeaderItems">

<?php 
if($this->session->userdata('ADMIN_ID')!='' || $this->session->userdata('managerUserID')!='' || $this->session->userdata('employeeUserID')!='' || $this->session->userdata('hrUserID')!='')
{ 
?>
    <div class="headerText">
        
    </div> 
<a class="LogoutIcon"><?php echo $this->session->userdata('email').''.$this->session->userdata('managerEmail').''.$this->session->userdata('employeeEmail').''.$this->session->userdata('hrEmail');?></a>
<a class="LogoutIcon" href="<?php echo $this->config->base_url();?>index.php/user-logout">Logout</a>
<?php 
}else{?>
  <div class="headerText">
         DGH ADMIN PANEL
    </div>  
<?php }

?>
</div>
</div>
</head>

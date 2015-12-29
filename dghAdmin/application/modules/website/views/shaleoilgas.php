<!-- Section-->
<p class="line">&nbsp;</p>
<div class="container">
    <div class="breadtext">Home/Shale Oil Gas</div>   
    <div class="heading"> Shale Oil/Gas</div>
    <p >BLock Identified for Shale Gas and Oil exploration and exploitation in phase-1</p>


    <table class="zui-table zui-table-zebra zui-table-horizontal">
        <tr>
            <td><b>Company</b></td>
            <td><b>No. of blocks</b></td>
        </tr>
        <?php $tmp = 0; ?>
        <?php foreach ($content as $con){ ?>
	<?php $tmp += $con['COUNT']; ?>
        <tr>
            <td>
                <?php echo $con['STATUS'] ?>
            </td>
            <td>
                <?php echo $con['COUNT'] ?>
            </td>
        </tr>
        <?php } ?>
        <tr><td>Total</td><td><?php echo $tmp; ?></td></tr>
        <tr>
            <td>
<!--                <a href="<?php echo base_url(); ?>index.php/view_progress_details" >View Progress Details</a>-->
            </td>
            <td>
                <a href="<?php echo base_url(); ?>index.php/view_block_details" >View Block Details</a>
            </td>
        </tr>
    </table>
    
    <p></p>
    <p></p>
    
</div>
<script>
    function showDivDetails(){
        $('#details').show();
    }
</script>



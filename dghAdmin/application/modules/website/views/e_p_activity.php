<!-- Section-->
<p class="line">&nbsp;</p>
<div class="container">
    <div class="breadtext">Home/Discovery</div>   
    <div class="heading"> PSC Blocks</div>
    <p >&nbsp;</p>


    <table class="zui-table zui-table-zebra zui-table-horizontal">
        <tr>
            <td><b>Current Status</b></td>
            <td><b>Total Numbers</b></td>
        </tr>
        
        <?php $count=0; foreach ($content as $con){ 
            $count=$count+$con['COUNT'];
            ?>
        <tr>
            <td>
                <?php echo $con['STATUS'] ?>
            </td>
            <td>
                <?php echo $con['COUNT'] ?>
            </td>
        </tr>
        <?php } ?>
        <tr><td>Total</td><td><?php echo $count; ?></td></tr>
        <tr><td></td><td><a href="<?php echo base_url() ?>index.php/psc_fields_view_details"  >View Details</a></td></tr>
    </table>
    <div id="details">
<!--        Effective Operational Exploration Blocks(<?php echo ($content['operational']['operational']-$content['fields']['fields']-$content['fieldConverted']['fieldConverted']) ?>)=operational(<?php echo $content['operational']['operational'] ?>)-Fields(<?php echo $content['fields']['fields'] ?>)-Blocks Fully Converted to Fields(<?php echo $content['fieldConverted']['fieldConverted'] ?>)-->
        Effective Operational Exploration Blocks(85)=operational(128)-Fields(27)-Blocks Fully Converted to Fields(16)
    </div>
    <p></p>
    <p></p>
    
</div>



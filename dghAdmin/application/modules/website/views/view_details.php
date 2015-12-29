<!-- Section-->
<p class="line">&nbsp;</p>
<div class="container">
    <div class="breadtext">Home/Discovery</div>   
    <div class="heading"> PSC Blocks</div>
    <p >&nbsp;</p>


    <table class="zui-table zui-table-zebra zui-table-horizontal">
        <tr>
            <td style="padding:5px;"><b>Round Name</b></td>
            <td style="padding:5px;"><b>Operational</b></td>
            <td style="padding:5px;"><b>Relinquished</b></td>
            <td style="padding:5px;"><b>PEL Awaited</b></td>
            <td style="padding:5px;"><b>Proposed for Relinquishment</b></td>
            <td style="padding:5px;"><b>PSC Total</b></td>
        </tr>
        
        <?php 
	    $total = 0;
	    $tmp_array = array();
	    foreach ($content as $con){ 
            $total = $con['ACTIVE'] + $con['RELINQUISHED'] + $con['PELAWAITED'] + $con['PRSRELINQUISH'];
        ?>
        <tr>
            <td style="padding:5px;">
                <?php echo $con['ROUND_NAME'] ?>
	    </td>
            <td style="padding:5px;">
                
		<a href="show_block_lists?st_id=<?php echo $con['STATUS_ID']?>&rd_id=<?php echo $con['ROUND_ID']?>"><?php echo $con['ACTIVE'] ?></a>
		<?php $tmp_array['active'] += $con['ACTIVE']; ?>
            </td>
            <td style="padding:5px;">
                <a href="show_block_lists?st_id=<?php echo $con['STATUS_ID']?>&rd_id=<?php echo $con['ROUND_ID']?>"><?php echo $con['RELINQUISHED'] ?></a>
		<?php $tmp_array['relinquished'] += $con['RELINQUISHED']; ?>
            </td>
            <td style="padding:5px;">
                <a href="show_block_lists?st_id=<?php echo $con['STATUS_ID']?>&rd_id=<?php echo $con['ROUND_ID']?>"><?php echo $con['PELAWAITED'] ?></a>
		<?php $tmp_array['pelawaited'] += $con['PELAWAITED']; ?>
            </td>
            <td style="padding:5px;">
                <a href="show_block_lists?st_id=<?php echo $con['STATUS_ID']?>&rd_id=<?php echo $con['ROUND_ID']?>"><?php echo $con['PRSRELINQUISH'] ?></a>
		<?php $tmp_array['prsrelinquish'] += $con['PRSRELINQUISH']; ?>
            </td>
            <td style="padding:5px;">
                <?php echo $total; ?>
		<?php $tmp_array['total'] += $total; ?>
            </td>
        </tr>
        <?php } ?>
        <tr>
            <td style="padding:5px;">
		&nbsp;
            </td>
            <td style="padding:5px;">
                <?php echo $tmp_array['active']; ?>
	    </td>
            <td style="padding:5px;">
                <?php echo $tmp_array['relinquished']; ?>
            </td>
            <td style="padding:5px;">
		<?php echo $tmp_array['pelawaited']; ?>
            </td>
            <td style="padding:5px;">
                <?php echo $tmp_array['prsrelinquish']; ?>
            </td>
            <td style="padding:5px;">
                <?php echo $tmp_array['total']; ?>
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


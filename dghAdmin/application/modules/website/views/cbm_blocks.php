<!-- Section-->
<p class="line">&nbsp;</p>
<div class="container">
    <div class="breadtext">Home/Discovery</div>   
    <div class="heading"> CBM Blocks</div>
    <p >&nbsp;</p>


    <table class="zui-table zui-table-zebra zui-table-horizontal">
        <tr>
            <td><b>Status</b></td>
            <td><b>Nomination</b></td>
            <td><b>CBM-1</b></td>
            <td><b>CBM-2</b></td>
            <td><b>CBM-3</b></td>
            <td><b>CBM-4</b></td>
            
        </tr>
        <?php $tmp = array(); ?>
	<?php foreach ($content as $con){ ?>
		<?php $tmp['nom_total'] += $con['Nomination']; 
		      $tmp['r1_total'] += $con['ROUNDONE']; 
		      $tmp['r2_total'] += $con['ROUNDTWO']; 
		      $tmp['r3_total'] += $con['ROUNDTHREE']; 
		      $tmp['r4_total'] += $con['ROUNDFOUR']; 
		?>
        <tr>
            <td>
                <?php echo $con['STATUS_DESC']."(".$con['STATUS'].")"; ?>
            </td>
            <td>
                <a href="show_round_list?rd_nm=Nomination&st_id=<?php echo $con['STATUS']; ?>"><?php echo $con['Nomination'] ?></a>
            </td>
	    <td>
                <a href="show_round_list?rd_nm=I&st_id=<?php echo $con['STATUS']; ?>"><?php echo $con['ROUNDONE'] ?></a>
            </td>
            <td>
                <a href="show_round_list?rd_nm=II&st_id=<?php echo $con['STATUS']; ?>"><?php echo $con['ROUNDTWO'] ?></a>
            </td>
	    <td>
                <a href="show_round_list?rd_nm=III&st_id=<?php echo $con['STATUS']; ?>"><?php echo $con['ROUNDTHREE'] ?></a>
            </td>
            <td>
                <a href="show_round_list?rd_nm=IV&st_id=<?php echo $con['STATUS']; ?>"><?php echo $con['ROUNDFOUR'] ?></a>
            </td>
        </tr>
        <?php } ?>
        <tr>
            <td><b>Total</b></td>
            <td>
                <?php echo $tmp['nom_total'] ?>
            </td>
	    <td>
                <?php echo $tmp['r1_total'] ?>
            </td>
            <td>
                <?php echo $tmp['r2_total'] ?>
            </td>
	    <td>
                <?php echo $tmp['r3_total'] ?>
            </td>
            <td>
                <?php echo $tmp['r4_total'] ?>
            </td>
        </tr>
    </table>

    <p></p>
    <p></p>
    
</div>





<!-- Section-->
<p class="line">&nbsp;</p>
<div class="container">
    <div class="breadtext">Home/Production</div>   
    <div class="heading">Yearly Summary of Production Data </div>
    <p >Pre NELP Discovered Field Binding</p>


    <table class="zui-table zui-table-zebra zui-table-horizontal">
        <tr>
            <td><b>Field/Block</b></td>
            <td><b>Year</b></td>
            <td><b>Total Crude Oil Production(TMT)</b></td>
            <td><b>Oil Production(TMT)</b></td>
            <td><b>Condensate(TMT)</b></td>
            <td><b>Total Gas Production(MM SCM)</b></td>
            <td><b>Associated Gas Production(MM SCM)</b></td>
            <td><b>NonAssociatedGas Production(MM SCM)</b></td>
            
        </tr>
        <?php $tmp = array(); ?>
	<?php //echo '<pre>'; print_r($content); die;?>
	<?php foreach ($content as $con){ ?>
		
        <tr>
            <td>
                <?php echo $con['STATUS_DESC']."(".$con['STATUS'].")"; ?>
            </td>
            <td>
                <?php echo $con['Nomination'] ?>
            </td>
	    <td>
                <?php echo $con['ROUNDONE'] ?>
            </td>
            <td>
                <?php echo $con['ROUNDTWO'] ?>
            </td>
	    <td>
                <?php echo $con['ROUNDTHREE'] ?>
            </td>
            <td>
                <?php echo $con['ROUNDFOUR'] ?>
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





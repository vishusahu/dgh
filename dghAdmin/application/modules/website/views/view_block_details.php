<!-- Section-->
<p class="line">&nbsp;</p>
<div class="container">
    <div class="breadtext">Home/Discovery</div>   
    <div class="heading"> Shale Oil/Gas</div>
    <p>BLock Identified for Shale Gas and Oil exploration and exploitation in phase-1</p>


    <table class="zui-table zui-table-zebra zui-table-horizontal">
        <tr>
            <td style="padding:5px;"><b>Company</b></td>
            <td style="padding:5px;"><b>Basin</b></td>
            <td style="padding:5px;"><b>PEL/PML Name</b></td>
            <td style="padding:5px;"><b>Area(sq km)</b></td>
            <td style="padding:5px;"><b>Validity of License upto</b></td>
            <td style="padding:5px;"><b>Work Carried Out</b></td>
        </tr>
        
        <?php //echo'<pre>'; print_r($content); die;
	    //$total = 0;
	    foreach ($content as $con){ 
            //$total = $con['ACTIVE'] + $con['RELINQUISHED'] + $con['PELAWAITED'] + $con['PRSRELINQUISH'];
        ?>
        <tr>
            <td style="padding:5px;">
                <?php echo $con['COMP'] ?>
            </td>
            <td style="padding:5px;">
                <?php echo $con['BASIN'] ?>
            </td>
            <td style="padding:5px;">
                <?php echo $con['PEL_PML'] ?>
            </td>
            <td style="padding:5px;">
                <?php echo $con['AREA'] ?>
            </td>
            <td style="padding:5px;">
                <?php echo $con['VALID_UPTO'] ?>
            </td>
            <td style="padding:5px;">
                <?php echo ($con['WORK']) ? $con['WORK'] : 'N/A'; ?>
            </td>
        </tr>
        <?php } ?>
        
        
    </table>
    
    <p></p>
    <p></p>
    
</div>
<script>
    function showDivDetails(){
        $('#details').show();
    }
</script>



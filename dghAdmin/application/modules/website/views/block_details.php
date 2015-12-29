<!-- Section-->
<p class="line">&nbsp;</p>
<div class="container">
    <div class="breadtext">Home/Discovery</div>   
    <div class="heading"> PSC Blocks</div>
    <p >&nbsp;</p>


    <table>
        <tr>
            <td><b>Round Name</b></td>
            <td><b>Operational</b></td>
            <td><b>Relinquished</b></td>
            <td><b>PEL Awaited</b></td>
            <td><b>Proposed for Relinquishment</b></td> 
        </tr>
        
        <?php $count=0; foreach ($content as $con){ 
            $count=$count+$con['COUNT'];
            ?>
        <tr>
            <td>
                <?php echo $con['ROUND_NAME'] ?>
            </td>
            <td>
                <a href="<?php echo base_url(); ?>index.php/block_name?round=<?php echo $con['ROUND_ID'] ?>&status=<?php echo $con['STATUS_ID'] ?>"><?php echo $con['ACTIVE'] ?></a>
            </td>
            <td>
                <?php echo $con['RELINQUISHED'] ?>
            </td>
            <td>
                <?php echo $con['PELAWAITED'] ?>
            </td>
            <td>
                <?php echo $con['PRSRELINQUISH'] ?>
            </td>
            <td>
                <?php echo $con['RELINQUISHED'] ?>
            </td>
        </tr>
        <?php } ?>
        <tr><td>Total</td><td><?php echo $count; ?></td></tr>
        
    </table>
    
    <p></p>
    <p></p>
    
</div>
<script>
    function showDivDetails(){
        $('#details').show();
    }
</script>



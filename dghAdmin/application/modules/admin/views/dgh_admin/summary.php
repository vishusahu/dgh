<!-- Section-->
<p class="line">&nbsp;</p>
<div class="container">
    <div class="breadtext">Home/Discovery</div>   
    <div class="heading"> Overall E & P Activity</div>
    <p >&nbsp;</p>


    <table>
        <tr>
            <td><b>Name</b></td>
            <td><b>Count</b></td>
        </tr>
        
        <tr>
            <td>
                Total PSC
            </td>
            <td>
	    <?php //echo '<pre>'; print_r($content); die; ?>
                <?php echo $content['BLOCKSCOUNT']['BLOCKSCOUNT'] ?>
            </td>
        </tr>
        <tr>
            <td>
                PSC Fields
            </td>
            <td>
                <?php echo $content['PRODUCTIONFIELDS']['PRODUCTIONFIELDS'] ?>
            </td>
        </tr>
        <tr>
            <td>
                Total Discoveries
            </td>
            <td>
                <?php echo $content['DISCOVERIES']['DISCOVERIES'] ?>
            </td>
        </tr>
        
        <tr>
            <td>
                Total CBM Blocks
            </td>
            <td>
                <?php echo $content['CBMCOUNT']['CBMCOUNT'] ?>
            </td>
        </tr>
        
    </table>

    <p></p>
    <p></p>
    
</div>


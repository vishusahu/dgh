<!-- Section-->
<p class="line">&nbsp;</p>
<div class="container">
    <div class="breadtext">Home/Discovery</div>   
    <div class="heading"> PSC Blocks</div>
    <p >&nbsp;</p>


    <table class="zui-table zui-table-zebra zui-table-horizontal">
        <tr>
            <td style="padding:5px;" align="center"><b>Block Name</b></td>
        </tr>
        
        <?php 
	    //echo '<pre>'; print_r($content); die;
	    foreach ($content as $con){ 
            
        ?>
        <tr>
            <td style="padding:5px;">
                <a href="show_block_details?block_id=<?php echo $con['BLOCK_ID']?>"><?php echo $con['BLOCK_NAME'] ?></a>
            </td>
            
        </tr>
        <?php } ?>
    </table>
    <p></p>
    
</div>
<script>
    function showDivDetails(){
        $('#details').show();
    }
</script>



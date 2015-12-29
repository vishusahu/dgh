<!-- Section-->
<p class="line">&nbsp;</p>
<div class="container">
    <div class="breadtext">Home/CBM Blocks</div>   
    <div class="heading"> CBM Blocks</div>
    <p >&nbsp;</p>


    <table class="zui-table zui-table-zebra zui-table-horizontal">
        <tr>
            <td style="padding:5px;" align="center"><b>Block Name</b></td>
        </tr>
        
        <?php 
	   
	   foreach ($content as $con){ 
        ?>
        <tr>
            <td style="padding:5px;">
                <a href="show_round_details?block_nm=<?php echo $con['BLOCK_NAME']?>"><?php echo $con['BLOCK_NAME'] ?></a>
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



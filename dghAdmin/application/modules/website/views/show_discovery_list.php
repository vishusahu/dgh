<!-- Section-->
<p class="line">&nbsp;</p>
<div class="container">
    <div class="breadtext">Home/Discovery</div>   
    <div class="heading"> Discovery</div>
    <p >&nbsp;</p>


    <table  class="zui-table zui-table-zebra zui-table-horizontal">
        <tr>
            <td style="padding:5px;" align="center"><b>Discovery Name</b></td>
        </tr>
        
        <?php //echo '<pre>'; print_r($content); die;  
	   foreach ($content as $con){ 
        ?>
        <tr>
            <td style="padding:5px;">
                <a href="show_discovery_details?dsc_name=<?php echo $con['DISCOVERY']?>"><?php echo $con['DISCOVERY'] ?></a>
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



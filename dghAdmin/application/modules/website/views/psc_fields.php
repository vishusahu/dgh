<!-- Section-->
<p class="line">&nbsp;</p>
<div class="container">
    <div class="breadtext">Home/PSC Blocks</div>   
    <div class="heading"> PSC Blocks</div>
    <p >&nbsp;</p>


    <table class="zui-table zui-table-zebra zui-table-horizontal">
        <tr>
            <td width="40%"><b>Round Name</b></td>
            <td width="40%"><b>Total</b></td>
        </tr>
        <?php //echo '<pre>'; print_r($content); die; ?>
	<?php foreach ($content as $con){ ?>
        <tr>
            <td>
                <?php echo $con['ROUND'] ?>
            </td>
            <td>
                <a href="#"><?php echo $con['NUM'] ?></a>
            </td>
        </tr>
        <?php } ?>
        
    </table>

    <p></p>
    <p></p>
    
</div>



<!-- Section-->
<p class="line">&nbsp;</p>
<div class="container">
    <div class="breadtext">Home/Discovery</div>   
    <div class="heading"> Discovery</div>
    <p >&nbsp;</p>


    <table class="zui-table zui-table-zebra zui-table-horizontal">
        <tr>
            <td><b>Round Name</b></td>
            <td><b>Total</b></td>
        </tr>
	<?php //echo '<pre>'; print_r($content); die; ?>
        <?php foreach ($content as $con){ ?>
        <tr>
            <td>
                <?php echo $con['ROUND'] ?>
            </td>
            <td>
                <a href="show_discovery_list?rd_nm=<?php echo $con['ROUND'] ?>"><?php echo $con['NUM'] ?></a>
            </td>
        </tr>
        <?php }?>
    </table>

    <p></p>
    <p></p>
    
</div>



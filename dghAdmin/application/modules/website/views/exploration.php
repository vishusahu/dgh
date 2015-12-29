<!-- Section-->
<p class="line">&nbsp;</p>
<div class="container">
    <div class="breadtext">Home/Exploration</div>   
    <div class="heading"> Exploration</div>
    <p >&nbsp;</p>


    <table>
        <tr>
            <th>Block Name</th>
            <th>Round</th>
            <th>Status</th>
        </tr>
        <?php foreach ($content as $con){ ?>
        <tr>
            <td>
                <?php echo $con['BLOCK'] ?>
            </td>
            <td>
                <?php echo $con['ROUND'] ?>
            </td>
            <td>
                <?php echo $con['CURRENT_STATUS'] ?>
            </td>
        </tr>
        <?php }?>
    </table>

    <p></p>
    <p></p>
    
</div>
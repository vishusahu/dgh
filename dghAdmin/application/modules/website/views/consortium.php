<!-- Section-->
<p class="line">&nbsp;</p>
<div class="container">
    <div class="breadtext">Home/Companies</div>   
    <div class="heading"> Companies</div>
    <p >&nbsp;</p>


    <table>
        <tr>
            <td><b>Consortium Name</b></td>
            <td><b>Operator</b></td>
        </tr>
        <?php foreach ($content as $con){ ?>
        <tr>
            <td>
                <?php echo $con['CONSORTIUM_NAME'] ?>
            </td>
            <td>
                <?php echo $con['OPERATOR_ID'] ?>
            </td>
        </tr>
        <?php }?>
    </table>

    <p></p>
    <p></p>
    
</div>



<!-- Section-->
<p class="line">&nbsp;</p>
<div class="container">
    <div class="breadtext">Home/Companies</div>   
    <div class="heading"> Companies</div>
    <p >&nbsp;</p>


    <table>
        <tr>
            <td><b>Company Name</b></td>
            <td><b>Tag</b></td>
        </tr>
        <?php foreach ($content as $con){ ?>
        <tr>
            <td>
                <?php echo $con['COMPANY_NAME'] ?>
            </td>
            <td>
                <?php echo $con['TAG'] ?>
            </td>
        </tr>
        <?php }?>
    </table>

    <p></p>
    <p></p>
    
</div>

<!-- Section-->
<p class="line">&nbsp;</p>
<div class="container">
    <div class="breadtext">Home/Purchase E&P Data</div>   
    <div class="heading"> Purchase E&P Data</div>
    <p >&nbsp;</p>

    
    <p>
    <?php $i=1; foreach ($purchase as $ten){ ?>
    <p>
     <?php 
     echo '<b>.</b> <a href="'.base_url().'index.php/show_content?id='.$ten['id'].'">'.$ten['link']."</a>";
     ?>   
    </p>
    
    <?php 
    $i++;}
    //echo "<pre>";print_r($tender);die;
    ?>
    <p></p>
    <p></p>
    
</div>
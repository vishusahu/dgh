<!-- Section-->
<p class="line">&nbsp;</p>
<div class="container">
    <div class="breadtext">Home/<?php if($_GET['type'] == "1") { ?>   Notices / Top Stories<?php }else{?>News <?php }?> </div>   
    <div class="heading"><?php if($_GET['type'] == "1") { ?>   Notices / Top Stories<?php }else{?>News <?php }?> </div>
    <p >&nbsp;</p><div style="padding:20px;">
        <ul>
            <?php foreach ($stories as $st) { ?>
                <li><a href="<?php echo base_url(); ?>index.php/story_details?story=<?php echo $st['id'] ?>&heading=<?php echo $st['title'];?>"><?php echo $st['title']; ?></a></li>
            <?php }
            ?>
        </ul>
    </div>

</div>

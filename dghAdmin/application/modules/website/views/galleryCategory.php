<!-- Section-->
<style>
.zoom  {
    list-style:none;
}

.zoom a {
    background-color: #6f7479;
    border: 2px solid red;
    border-radius: 3px;
    color: #fff;
    display: block;
    float: left;
    font-size: 16px;
    opacity: 1;
    padding: 15px;
    text-decoration: none;
    transform: scale(1, 1);
    transition-duration: 250ms;
    transition-timing-function: ease-out;
    width: 27%;
margin:15px;

}
.zoom a:hover {
    opacity: 1;
    position: relative;
    transform: scale(1.05, 1.07);
    transition-duration: 250ms;
    transition-timing-function: ease-out;
    z-index: 99;
}
.responsive-tabs__list {
    font-size: 15px;
    font-weight: bold;
    margin: 0;
    padding: 0 0 12px;
    text-transform: uppercase;
 list-style: outside none none;
text-decoration:none;
}
.responsive-tabs__list__item {
    background: #e9eaeb none repeat scroll 0 0;
    color: #333;
    margin-left: 3px;
    padding: 10px 20px;
 list-style: outside none none;
width: 30%;
}
.responsive-tabs__list__item a {
    background: #e9eaeb none repeat scroll 0 0;
    color: #333;
    margin-left: 3px;
    padding: 10px 20px;
 list-style: outside none none;
width: 30%;
}
.responsive-tabs__list__item:hover {
    background: #9b0054 none repeat scroll 0 0;
    border: 0 none;
    color: #ffffff;
}
.responsive-tabs__list__item--active, .responsive-tabs__list__item--active:hover {
    background: #9b0054 none repeat scroll 0 0;
    border: 0 none;
    color: #ffffff;
}
.responsive-tabs__panel {
    margin-bottom: 0;
}
</style>
<p class="line">&nbsp;</p>
<div class="container">
    <div class="breadtext">Home/Gallery</div>   
    <div class="heading"> Gallery </div>
    <p >&nbsp;</p>

   
    <p><ul class="zoomli">
                        <?php
                        foreach ($category as $cat){
                        ?>
                        <li class="zoom" >
                            <a href="<?php echo base_url(); ?>index.php/gallery?catId=<?php echo $cat['id'] ?>"><?php echo $cat['category'] ?></a>
                        </li>
                        <?php } ?>
                    </ul>
    </p>
   
    <p></p>
  
</div>

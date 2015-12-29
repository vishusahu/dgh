<!-- Section-->
<style>
ul.portfolio_img {
    background: #d6d6d6 none repeat scroll 0 0;
    border-bottom: 1px solid #cccccc;
    float: left;
    list-style: outside none none;
    margin: 0 0 20px;
    padding: 10px 0 40px 1%;
    width: 99%;
}
ul.portfolio_img li {
    background: #ffffff none repeat scroll 0 0;
    border: 1px solid red;
    float: left;
    margin: 1%;
    padding: 0;
    text-align: center;
    width: 22.5%;
height:200px;
}
ul.portfolio_img li:hover {
    border: 1px solid #fff;
}
ul.portfolio_img li img {
    height: auto;
    width: 100%;
height:200px
}
.zoom a {
    display: block;
    float: left;
    opacity: 1;
    text-decoration: none;
    transform: scale(1, 1);
    transition-duration: 250ms;
    transition-timing-function: ease-out;
    width: 100%;
}
.zoom a:hover {
    opacity: 1;
    position: relative;
    transform: scale(1.05, 1.07);
    transition-duration: 250ms;
    transition-timing-function: ease-out;
    z-index: 99;
}


</style>

<p class="line">&nbsp;</p>
<div class="container">
    <div class="breadtext">Home/Gallery</div>   
    <div class="heading"> Gallery</div>
    <p >&nbsp;</p>

    <ul  class="portfolio_img">
    
        <?php foreach ($gallery as $gal){ ?>
       <li><div class="zoom">
      <a class="example-image-link" href="<?php echo base_url().'/'.$gal['image']; ?>" data-lightbox="example-set"><img class="example-image" src="<?php echo base_url().'/'.$gal['image']; ?>" alt=""/></a></div>
       </li>
       
        <?php }?>
    </ul>
    <p></p>
    <p></p>
    
</div>
<script src="<?php echo base_url(); ?>js/lightbox-plus-jquery.min.js"></script>

<!-- banner-->
<div class="full_container">
    <div id="slider">
 
 <a href="#" class="control_next">></a>
  
<a href="#" class="control_prev"><</a>
 
 <ul>
  
 <li><img src="images/2.jpg" alt="" ></li>
 
<li><img src="images/3.JPG" alt="" ></li>
 
 <li><img src="images/5.jpg" alt="" ></li>
 
<li><img src="images/6.jpg" alt="" ></li>
 
<li><img src="images/7.JPG" alt="" ></li>

</ul>  
</div>

</div>



<!-- Section-->

<div class="container">
    <div class="col1">

        <p class="about_heading"><strong><?php echo $this->lang->line("About_DGH"); ?></strong></p>
        <p><img src="images/image.png" width="94" height="105" align="left" style="padding:0 10px 0 0;"> 
           <p style="margin:30px 0 30px 0;">
           <?php echo $aboutUs['content']; ?> 
           </p>
    </p>


        

        <div class="stories_area">
            <div class="statics_area">
                <p class="heading">  <?php echo $this->lang->line("News"); ?> </p> 
                <div class="txt_box" style="padding-bottom: 10px;">
				
  <ul class="list"><marquee style="height: 189px;" scrollamount="2" direction="up" onmouseover="this.setAttribute('scrollamount', 0, 0);" onmouseout="this.setAttribute('scrollamount', 1, 0);">              <?php 
                        foreach ($news as $st){?>
                        <li><a href="<?php echo base_url(); ?>index.php/story_details?story=<?php echo $st['id'] ?>&heading=<?php echo stripslashes(str_replace("<!--","",$st['title']));?>"><?php echo stripslashes(str_replace("<!--","",$st['title']));?></a></li>
                        <?php }
                        ?></marquee>
						</ul>
						<p style="text-align: right; padding: 5px 10px 0px;"><a  href="<?php echo base_url(); ?>index.php/all_story?type=2">View All</a></p>
						</div>

            </div>
			
            <div class="stories_col">
                <p class="heading"> <?php echo $this->lang->line("Notices");?> /  
				<?php echo $this->lang->line("Top_Stories"); ?> 
				</p>
                <div class="txt_box" style="padding-bottom: 10px;"> 
                    <ul class="list">
                        <marquee style="height: 189px;" scrollamount="2" direction="up" onmouseover="this.setAttribute('scrollamount', 0, 0);" onmouseout="this.setAttribute('scrollamount', 1, 0);"> 
                        <?php 
                        foreach ($stories as $st){?>
                            <li><a href="<?php echo base_url(); ?>index.php/story_details?story=<?php echo $st['id'] ?>&heading=<?php echo $st['title'];?>"><?php echo stripslashes(str_replace("<!--","",$st['title']));?></a></li>
                        <?php }
                        ?>
                        </marquee> 
<!--                        <li><a href="#">Quarterly Review meeting schedule for Fields/NELP Blocks/CBM Blocks</a></li>
                        <li><a href="#">Guidelines for E&P Operators for MoD Clearances in respect </a></li>
                        <li><a href="#">Subject 2 : Data/Information required for evaluation of DoC and FDP</a></li>
                        <li><a href="#">Comments on Consultation Paper prepared by Kelkar Committee</a></li>-->

                    </ul>
                     <p style="text-align: right; padding: 5px 10px 0px;"><a  href="<?php echo base_url(); ?>index.php/all_story?type=1">View All</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col2">

        <div class="messge_col">
            <p class="heading"> <?php echo $this->lang->line("DG_Messages"); ?> <img src="images/arrow_down.png" width="22" height="21" align="right"> </p> 
            <div class="txt_box" style="height: 191px; padding: 8px 8px 20px;">
			 
			<p >
			<img src="images/image.png" width="60" height="60" align="right" style="padding:5px 0px 0px 8px;">  
                    <?php echo $dgMessage['dgh_message']; ?>
					
                    <a href="<?php echo base_url(); ?>index.php/story_details?dgMsgId=<?php echo $dgMessage['id']; ?>&heading=<?php echo $this->lang->line("DG_Messages"); ?>">more.</a></p></p>
            </div>
            <ul class="list2">
                <li><a href="<?php echo base_url(); ?>index.php/tender"> <?php echo $this->lang->line("Tenders"); ?> <img src="images/arrow.png" width="22" height="21" align="right" style="padding:10px 10px 0 0;" ></a> </li>
                <li><a href="<?php echo base_url(); ?>index.php/purchases"> <?php echo $this->lang->line("Purchaes_Data"); ?> <img src="images/arrow.png" width="22" height="21" align="right" style="padding:10px 10px 0 0;"></a>  </li>
                <li><a href="<?php echo base_url(); ?>index.php/destination"> <?php echo $this->lang->line("Destination_India"); ?> <img src="images/arrow.png" width="22" height="21" align="right" style="padding:10px 10px 0 0;"></a> </li>

<li><a href="#"><?php echo $this->lang->line("NATIONAL_DATA_REPOSITORY"); ?><img src="images/arrow.png" width="22" height="21" align="right" style="padding:10px 10px 0 0;"></a> </li>
<!--                <li><a href="#"> <?php echo $this->lang->line("RTI"); ?> <img src="images/arrow.png" width="22" height="21" align="right" style="padding:10px 10px 0 0;"></a>  </li>-->
            </ul>

        </div>

    </div>


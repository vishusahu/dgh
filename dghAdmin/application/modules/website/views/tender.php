<!-- Section-->
<p class="line">&nbsp;</p>
<div class="container">
    <div class="breadtext">Home/Tender</div>   
    <div class="heading">Latest Tenders</div>
    <p style="height: 10px;">&nbsp;</p>
    <table class="zui-table zui-table-zebra zui-table-horizontal">
         <thead><tr>
		 <th>Sr. No.</th>
        <th>Tender Details</th>
        <th>Dates</th>
        <th>Tender Type</th>
        </tr>
		</thead>
         <tbody>
            <?php $i=1; foreach ($latestTender as $ten){
                if($i<6){
                ?>
           <tr>
		   <td><?php echo $i; ?></td>
                <td>
                    <?php 
     echo $ten['title']."</b><br>";
     echo $ten['details']."<br>";
     ?>   
                    <a href="<?php echo base_url().$ten['pdf']; ?>">Download Tender</a><br>
                    <?php 
     foreach ($ten['docs'] as $tdoc){?>
         
                    <a href="<?php echo base_url()."/".$tdoc['pdf']; ?>"><?php echo $tdoc['title'] ?></a>(Published On <?php echo $tdoc['created_on'] ?>)<br>
                    
     <?php }
                    ?>
                </td>
                <td>
                    Bid Opening: <?php echo date("d-m-Y H:i:s",strtotime($ten['bid_start_date'])); ?><br>
                    Bid Closing: <?php echo date("d-m-Y H:i:s",strtotime($ten['bid_end_date'])) ?><br>
                    Download End: <?php echo date("d-m-Y H:i:s",strtotime($ten['download_end_date'])) ?><br>
                </td>
                <td>
                    <?php 
                    
                    echo $ten['stage']." ".$ten['scope']." ".$ten['type'];
                    
                    ?>
                </td>
             </tr>
             
                <?php }$i++; }?>
				</tbody>
       
    </table>   
    <p  style="height: 30px;">&nbsp;</p>
    <div class="heading">Main Tenders</div>
   <p style="height: 10px;">&nbsp;</p>
    
    <table class="zui-table zui-table-zebra zui-table-horizontal">
	<thead>
        <tr>
		<th>Sr. No.</th>
        <th>Tender Details</th>
        <th>Dates</th>
        <th>Tender Type</th>
        </tr></thead>
		<tbody>
        
            <?php $i=1; foreach ($tender as $ten){

                ?>
            <tr>
			<td><?php echo $i; ?></td>
                <td>
                    <?php 
     echo $ten['title']."</b><br>";
     echo $ten['details']."<br>";
     ?>   
                    <a href="<?php echo base_url().$ten['pdf']; ?>">Download Tender</a><br>
                    <?php 
     foreach ($ten['docs'] as $tdoc){?>
         
                    <a href="<?php echo base_url()."/".$tdoc['pdf']; ?>"><?php echo $tdoc['title'] ?></a>(Published On <?php echo $tdoc['created_on'] ?>)<br>
                    
     <?php }
                    ?>
                </td>
                <td>
                    Bid Opening: <?php echo date("d-m-Y H:i:s",strtotime($ten['bid_start_date'])) ?><br>
                    Bid Closing: <?php echo date("d-m-Y H:i:s",strtotime($ten['bid_end_date'])) ?><br>
                    Download End: <?php echo date("d-m-Y H:i:s",strtotime($ten['download_end_date'])) ?><br>
                </td>
               <td>
                    <?php 
                    
                    echo $ten['stage']." ".$ten['scope']." ".$ten['type'];
                    
                    ?>
                </td>
             </tr>
             
                <?php $i++;}?>
				</tbody>
       
    </table>    
   
    <p  style="height: 30px;">&nbsp;</p>
    <div style="float: right;"><a href="<?php echo base_url(); ?>index.php/archive_tender">Archived Tenders</a></div>
   <p style="height: 10px;">&nbsp;</p>
    
    
   
</div>

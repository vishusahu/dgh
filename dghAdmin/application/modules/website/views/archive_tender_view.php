<!-- Section-->
<p class="line">&nbsp;</p>
<div class="container">
    <div class="breadtext">Home/Tender</div>   
    
    <p  style="height: 30px;">&nbsp;</p>
    <div class="heading">Archived Tenders</div>
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
        
            <?php $i=1; foreach ($archivedTender as $ten){

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
   
</div>

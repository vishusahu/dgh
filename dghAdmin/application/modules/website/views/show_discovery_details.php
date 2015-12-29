<!-- Section-->
<p class="line">&nbsp;</p>
<div class="container">
    <div class="breadtext">Home/Discovery</div>   
    <div class="heading"> Discovery</div>
    <p >&nbsp;</p>


    <table  class="zui-table zui-table-zebra zui-table-horizontal">
        <tr>
            
		<td style="padding:5px;"><b>Block Name</b></td>
		<td style="padding:5px;" align="center"><?php echo ($content[0]['BLOCK']) ? $content[0]['BLOCK'] : 'N/A' ?></td>
	</tr>
	<tr>
		<td style="padding:5px;" ><b>Round</b></td>
		<td style="padding:5px;" align="center"><?php echo ($content[0]['ROUND']) ? $content[0]['ROUND'] : 'N/A' ?></td>
	</tr>
	<tr>
		<td style="padding:5px;" ><b>Operator</b></td>
		<td style="padding:5px;" align="center"><?php echo ($content[0]['OPERATOR']) ? $content[0]['OPERATOR'] : 'N/A' ?></td>
	</tr>
	<tr>
		<td style="padding:5px;" ><b>Discovery Date</b></td>
		<td style="padding:5px;" align="center"><?php echo ($content[0]['DISCOVERY_DATE']) ? $content[0]['DISCOVERY_DATE'] : 'N/A' ?></td>
	</tr>
	<tr>
		<td style="padding:5px;" ><b>Discovery Type</b></td>
		<td style="padding:5px;" align="center"><?php echo ($content[0]['DISCOVERY_TYPE']) ? $content[0]['DISCOVERY_TYPE'] : 'N/A' ?></td>
	</tr>
	<tr>
		<td style="padding:5px;" ><b>Current Status</b></td>
		<td style="padding:5px;" align="center"><?php echo ($content[0]['CURRENT_STATUS']) ? $content[0]['CURRENT_STATUS'] : 'N/A' ?></td>
	</tr>
    </table>
		
    
    <p></p>
    <p></p>
    
</div>
<script>
    function showDivDetails(){
        $('#details').show();
    }
</script>



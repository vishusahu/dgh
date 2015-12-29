<!-- Section-->
<p class="line">&nbsp;</p>
<div class="container">
    <div class="breadtext">Home/Discovery</div>   
    <div class="heading"> PSC Blocks</div>
    <p >&nbsp;</p>


    <table  class="zui-table zui-table-zebra zui-table-horizontal">
        <tr>
            <td style="padding:5px;" width="45%">
		<table style="padding:10px; width:100%">
			<tr>
				<td style="padding:5px;" align="center"><b>Block</b></td>
				<td style="padding:5px;" align="center"><?php echo ($content[0]['BLOCK_NAME']) ? $content[0]['BLOCK_NAME'] : 'N/A' ?></td>
			</tr>
			<tr>
				<td style="padding:5px;" align="center"><b>Round</b></td>
				<td style="padding:5px;" align="center"><?php echo ($content[0]['ROUND_NAME']) ? $content[0]['ROUND_NAME'] : 'N/A' ?></td>
			</tr>
			<tr>
				<td style="padding:5px;" align="center"><b>Basin</b></td>
				<td style="padding:5px;" align="center"><?php echo ($content[0]['BASIN_NAME']) ? $content[0]['BASIN_NAME'] : 'N/A' ?></td>
			</tr>
			<tr>
				<td style="padding:5px;" align="center"><b>Area(SKM)</b></td>
				<td style="padding:5px;" align="center"><?php echo ($content[0]['PRESENT_AREA']) ? $content[0]['PRESENT_AREA'] : 'N/A' ?></td>
			</tr>
			<tr>
				<td style="padding:5px;" align="center"><b>Consortium %</b></td>
				<td style="padding:5px;" align="center"><?php echo ($content[0]['CONSORTIUM_NAME']) ? $content[0]['CONSORTIUM_NAME'] : 'N/A' ?></td>
			</tr>
		</table>
		</td>
		<td style="padding:5px;" width="45%">
		<table style="padding:10px; width:100%">
			<tr>
				<td style="padding:5px;" align="center"><b>Operator</b></td>
				<td style="padding:5px;" align="center"><?php echo ($content[0]['COMPANY_NAME']) ? $content[0]['COMPANY_NAME'] : 'N/A' ?></td>
			</tr>
			<tr>
				<td style="padding:5px;" align="center"><b>Location</b></td>
				<td style="padding:5px;" align="center"><?php echo ($content[0]['STATE_NAME']) ? $content[0]['STATE_NAME'] : 'N/A' ?></td>
			</tr>
			<tr>
				<td style="padding:5px;" align="center"><b>Signing Date</b></td>
				<td style="padding:5px;" align="center"><?php echo ($content[0]['DATE_OF_SIGNING']) ? $content[0]['DATE_OF_SIGNING'] : 'N/A' ?></td>
			</tr>
			<tr>
				<td style="padding:5px;" align="center"><b>Effective Date</b></td>
				<td style="padding:5px;" align="center"><?php echo ($content[0]['EFFECTIVE_DATE']) ? $content[0]['EFFECTIVE_DATE'] : 'N/A' ?></td>
			</tr>
			<tr>
				<td style="padding:5px;" align="center"><b>Status</b></td>
				<td style="padding:5px;" align="center"><?php echo ($content[0]['STATUS']) ? $content[0]['STATUS'] : 'N/A' ?></td>
			</tr>
		</table>
	    </td>
            
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



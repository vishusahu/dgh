<!-- Section-->
<p class="line">&nbsp;</p>
<div class="container">
    <div class="breadtext">Home/CBM Blocks</div>   
    <div class="heading"> CBM Blocks</div>
    <p >&nbsp;</p>


    <table class="zui-table zui-table-zebra zui-table-horizontal">
        <tr>
            <td style="padding:5px;" width="45%">
		<table style="padding:10px; width:100%">
			<tr>
				<td style="padding:5px;" align="center"><b>Round Name</b></td>
				<td style="padding:5px;" align="center"><?php echo ($content[0]['ROUND']) ? $content[0]['ROUND'] : 'N/A' ?></td>
			</tr>
			<tr>
				<td style="padding:5px;" align="center"><b>Consortium</b></td>
				<td style="padding:5px;" align="center"><?php echo ($content[0]['CONSORTIUM_NAME']) ? $content[0]['CONSORTIUM_NAME'] : 'N/A' ?></td>
			</tr>
			<tr>
				<td style="padding:5px;" align="center"><b>Effective Date</b></td>
				<td style="padding:5px;" align="center"><?php echo ($content[0]['EFFECTIVE_DATE']) ? $content[0]['EFFECTIVE_DATE'] : 'N/A' ?></td>
			</tr>
			<tr>
				<td style="padding:5px;" align="center"><b>Coal Field</b></td>
				<td style="padding:5px;" align="center"><?php echo ($content[0]['COALFIELD']) ? $content[0]['COALFIELD'] : 'N/A' ?></td>
			</tr>
			<tr>
				<td style="padding:5px;" align="center"><b>Status </b></td>
				<td style="padding:5px;" align="center"><?php echo ($content[0]['STATUS']) ? $content[0]['STATUS'] : 'N/A' ?></td>
			</tr>
		</table>
		</td>
		<td style="padding:5px;" width="45%">
		<table style="padding:10px; width:100%">
			<tr>
				<td style="padding:5px;" align="center"><b>Operator</b></td>
				<td style="padding:5px;" align="center"><?php echo ($content[0]['OPERATOR']) ? $content[0]['OPERATOR'] : 'N/A' ?></td>
			</tr>
			<tr>
				<td style="padding:5px;" align="center"><b>Sign in Date</b></td>
				<td style="padding:5px;" align="center"><?php echo ($content[0]['DATE_OF_SIGNING']) ? $content[0]['DATE_OF_SIGNING'] : 'N/A' ?></td>
			</tr>
			<tr>
				<td style="padding:5px;" align="center"><b>Area</b></td>
				<td style="padding:5px;" align="center"><?php echo ($content[0]['AREA']) ? $content[0]['AREA'] : 'N/A' ?></td>
			</tr>
			
			<tr>
				<td style="padding:5px;" align="center"><b>State</b></td>
				<td style="padding:5px;" align="center"><?php echo ($content[0]['STATE_NAME']) ? $content[0]['STATE_NAME'] : 'N/A' ?></td>
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



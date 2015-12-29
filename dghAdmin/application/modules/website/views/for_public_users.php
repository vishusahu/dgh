<!-- Section-->

<p class="line">&nbsp;</p>
<div class="container">
    <div class="breadtext"></div>   
    <div class="heading"> Users from DGH Network</div>
    <p >&nbsp;</p><div style="padding:20px;">
<p ><?php
    echo $this->session->flashdata('success_msg');
    ?></p>
  
<table>
    <form id="contact" name="contact" action="<?php echo base_url(); ?>index.php/for_public_users" method="post">
        <tr><td >
        <label for="email">Name</label></td><td>
        <input type="text" id="email" name="name" class="txt" required="true"  ></td></tr><tr><td>
        <label for="email">House/Flat No</label></td><td>
        <input type="text" id="email" name="house_flat" class="txt" required="true"  ></td></tr><tr><td>
        <label for="email">Building/Street Name</label></td><td>
        <input type="text" id="email" name="building_street" class="txt" required="true"  ></td></tr><tr><td>
        <label for="email">Area name</label></td><td>
        <input type="text" id="email" name="area_name" class="txt" required="true"  ></td></tr><tr><td>
        <label for="email">City</label></td><td>
        <input type="text" id="email" name="city" class="txt" required="true"  ></td></tr><tr><td>
        <label for="email">State</label></td><td>
        <input type="text" id="email" name="state" class="txt" required="true"  ></td></tr><tr><td>
        <label for="email">Pin Code</label></td><td>
        <input type="text" id="email" name="pincode" class="txt" required="true"  ></td></tr><tr><td>
        <label for="email">Country</label></td><td>
        <input type="text" id="email" name="country" class="txt" required="true"  ></td></tr><tr><td>
        <label for="email">Telephone No.</label></td><td>
        <input type="text" id="email" name="telephone_no" class="txt" required="true"  ></td></tr><tr><td>
        <label for="email">Email</label></td><td>
        <input type="text" id="email" name="email" class="txt" required="true" email="true"  ></td></tr><tr><td>
        <label for="email">Subject</label></td><td>
        <input type="text" id="email" name="subject" class="txt" required="true"  ></td></tr><tr><td>
        <label for="email">Details</label></td><td>
        <input type="text" id="email" name="details" class="txt" required="true"  ></td></tr><tr><td>
        <label for="email">Attachment1</label></td><td>
        <input type="file" id="email" name="attachment1" class="txt"  ></td></tr><tr><td>
        <label for="email">Attachment2</label></td><td>
        <input type="file" id="email" name="attachment2" class="txt"  ></td></tr><tr><td>
        <input id="send" type="submit" name="postFeedback" value="submit" onclick="validateEmail()" />
</td></tr>
    </form>
</table>
    </div>
    
</div>



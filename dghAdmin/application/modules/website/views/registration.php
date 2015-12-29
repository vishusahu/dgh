<!-- Section-->
<p class="line">&nbsp;</p>
<div class="container">
    <div class="breadtext">Home/Registration</div>   
    <div class="heading"> Registration</div>
    <p >&nbsp;</p>

    <p class="about_heading"><strong>Register Yourself</strong></p>
    <form method="POST" action="<?php echo base_url(); ?>index.php/user/registration">
    <p>
        <b>First Name:</b>
        <input type="text" name="first_name" />
    </p>    
    <br />
    <p>
        <b>Last Name:</b>
        <input type="text" name="last_name" />
    </p>    
    <br />
    <p>
        <b>Email:   </b>
        <input type="text" name="email" />
    </p>    
    <br />
    <p>
        <b>Address:</b>
        <textarea type="text" name="address" ></textarea>
    </p>    
    <br />
    <p>
        <b>Country:</b>
        
        <select name="country">
            <option value="">Select</option>
            <?php foreach ($country as $con){ ?>
            <option value="<?php echo $con['COUNTRY_ID'] ?>"><?php echo $con['COUNTRY_NAME'] ?></option>
            <?php } ?>
        </select>
    </p>    
    <br />
    
    <p>
        <b>Company:</b>
        <input type="text" name="company" />
    </p>    
    <br />
    
    <p>
        <b>Phone:</b>
        <input type="text" name="phone" />
    </p>    
    <br />
    
    <p>
        <b>Mobile:</b>
        <input type="text" name="mobile" />
    </p>    
    <br />
    
    <p>
        <b>Organization:</b>
        <select name="organization">
		<option value="0">--- Select Type ---</option>
		<option value="1">Government Agency</option>
		<option value="2">Private E&amp;P Company</option>
		<option value="21">National Oil Company</option>
		<option value="6">University/Academia</option>
		<option value="5">E&amp;P Service Company</option>
		<option value="22">Other </option>

	</select>
    </p>    
    <br />
    
    <p>
        <b>Domain:</b>
        <select name="domain">
		<option value="0">--- Select Domain ---</option>
		<option value="1">IT</option>
		<option value="2">G&amp;G</option>
		<option value="3">Production</option>
		<option value="4">Reservoir</option>
		<option value="5">Finance</option>
		<option value="6">Legal</option>
		<option value="7">Petrophysics</option>
		<option value="8">Geochemistry</option>
		<option value="9">Drilling</option>
		<option value="10">Data Management</option>
		<option value="11">Others....</option>

	</select>
    </p>    
    <br />
    
    <p>
        <b>Others:</b>
        <input type="text" name="others" />
    </p>    
    <br />
    
    <p>
        <input type="hidden" name="postForm" value="submit" />
        <input type="submit" name="submit" value="Submit" />
    </p>    
    <br />
    </form>
    
    <p></p>
    <p></p>
    
</div>
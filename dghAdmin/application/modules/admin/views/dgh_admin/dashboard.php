<style>
    .DividerSpan {
        margin-left: 27%;
    }input[type="search"] {
        border: 1px solid;
    }
</style>

<script class="jsbin" src="http://datatables.net/download/build/jquery.dataTables.nightly.js"></script>

<script>
    $(document).ready(function() {
        
      
        $('#userTable').dataTable({"bStateSave": true});
             
          
    });
    
</script>
<script>
    function deleteUser(data) {
        var decision = confirm('are you sure you want to delete');
        if (decision == true)
        {
            window.location.href = "<?php echo $this->config->base_url(); ?>index.php/activeCollab-rating/?deleteId=" + data;
        }
    }</script>
<div class="Wrapper">
    <?php $this->load->view("templates/admin_left_menu", array('data' => $select)); ?>
    <!-- Content side starts here -->
    <div class="ContentWrapper">

        <!-- Top Line starts here -->
        <div class="ContentTopLine">

            
        </div>    
        <!-- Top Line ends here -->
        <div class="clear space30"></div>
        <?php if ($editResult != NULL) { ?>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#addNewForm').slideToggle();
                });</script>
        <?php } ?>
        <div class="formWrapper smallWrapper" id="addNewForm">
            <div class="HeadingTop">

                <h5>Add Group Information</h5>
                <div class="SearchTable">
                    <a href="<?php echo $this->config->base_url(); ?>index.php/activeCollab-rating"><button id="addNewFormToggle" style="font-size: 20px;">×</button></a>
                </div>
            </div>
            <link rel="stylesheet" href="http://jquery.bassistance.de/validate/demo/site-demos.css">
            <script src="http://jquery.bassistance.de/validate/jquery.validate.js"></script>
            <script src="http://jquery.bassistance.de/validate/additional-methods.js"></script>
            <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

            <form action="<?php echo $this->config->base_url(); ?>index.php/activeCollab-rating" method="POST" enctype="multipart/form-data" id="groupForm">     

                <div class="clearfix">
                    <div class="two-third">
                        <label>First Name:</label>

                        <input type="text" name="firstName" value="<?php echo $editResult['first_name']; ?>" />
                        <label>Last Name:</label>

                        <input type="text" name="lastName" value="<?php echo $editResult['last_name']; ?>" />


                        <label>Email:</label>

                        <input type="text" name="email" value="<?php echo $editResult['email']; ?>" />
                        </select>




                    </div>


                    <input type="hidden" name="editId" value="<?php echo $editResult['id']; ?>" />


                    <input type="submit" name="submitPass" value="Save" />

                </div>
            </form>
        </div>

        <script>
                // just for the demos, avoids form submit
                jQuery.validator.setDefaults({
                    debug: false,
                    success: "valid"
                });
                $("#groupForm").validate({
                    rules: {
                        groupName: {
                            required: true

                        }
                    }
                });</script>
        <div class="clear space30"></div>
        
        <?php
        echo $this->session->userdata('msg');
        $this->session->unset_userdata('msg');
        ?>

        <div class="TableWrapper">

            <span class="HeadingTop">
                <h5>Add Points & Ratings</h5>    
            </span>
<?php
if ($employees != '') {
    ?>
                <table cellpadding="0" cellspacing="0" border="0" id="userTable">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Avg Rating</th>
                            <th>Rating</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($employees as $emp) {
                             //echo "<pre>";print_r($emp);die;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php
                                if($emp['is_rated']['approve_status']==NULL && $emp['is_rated']['hr_rating_status']=='1'){?>
                                    <span style="color:green;"><?php echo $emp['first_name'] . " " . $emp['last_name']; ?></span>
                                <?php }else if($emp['is_rated']['approve_status']=='1'){?>
                                    <?php echo $emp['first_name'] . " " . $emp['last_name']; ?>
                                <?php }else if($emp['is_rated']['approve_status']=='0' && $emp['is_rated']['hr_rating_status']=='0'){?>
                                    <span style="color:blue;"><?php echo $emp['first_name'] . " " . $emp['last_name']; ?></span>
                                <?php }else if($emp['is_rated']['approve_status']=='0' && $emp['is_rated']['hr_rating_status']=='1'){?>
                                    <span style="color:blueviolet;"><?php echo $emp['first_name'] . " " . $emp['last_name']; ?></span>
                                <?php }else if($emp['is_rated']['approve_status']=='' && $emp['is_rated']['hr_rating_status']==''){?>
                                   <?php echo $emp['first_name'] . " " . $emp['last_name']; ?>
                                <?php }?></td>
                                <td><?php echo $emp['email']; ?></td>
                                <td><?php echo $emp['department']; ?></td>
                                <td><?php
                            if(($emp['is_rated']['approve_status']=='0' || $emp['is_rated']['approve_status']=='1') && ($emp['is_rated']['hr_rating_status']=='1')){
                            if ($emp['rating_avg']['avg'] != '') {
                                echo number_format($emp['rating_avg']['avg'], 2, '.', '');
                            }} else {
                                echo "0";
                            };
                            ?></td>

                                <td><?php if($emp['is_rated']['approve_status']=='0' && $emp['is_rated']['hr_rating_status']=='1' && date('j') >= 1 && date('j') <= 31){?>
                                    <a class="payBtn" href="<?php $this->config->base_url(); ?>employee-rating?rate=<?php echo $emp['is_rated']['id']; ?>">Approve</a>
                                <?php }else if($emp['is_rated']['approve_status']=='1'){?>
                                    <a class="payBtnDisable">Approved</a></td>
                                <?php }?>

                                <td style="width: 13%;"><a  href="<?php echo $this->config->base_url(); ?>index.php/activeCollab-rating/?rowId=<?php echo $emp['id']; ?>" ><button type="button" name="" value="" class="Editbtn"  title="Edit"></button></a>
                                    <a  class="payBtn" href="<?php echo $this->config->base_url(); ?>index.php/admin-add-comments/?empID=<?php echo $emp['id']; ?>" >Comment</a>
                                    <a  href="#" onclick="deleteUser(<?php echo $emp['id']; ?>);"><button type="button" name="" value="" class="DeleteIcon"  title="Delete"></button></a></td>
                                </td>
                            </tr>
        <?php
        $i++;
    }
    ?></tbody>
                </table>
               
    <?php
} else {
    ?>
                <span class="noRecordFound">No Record Found</span>
<?php }
?>
        </div>    
        <!-- Table ends here -->

        <div class="space50"></div>    
    </div>
    <!-- Content side ends here -->



</div>

</body>
<script type="text/javascript">
                                        $(document).ready(function(){

                                        $('.MenuIcon').click(function() {
                                        $('.MainLinksRow').slideToggle("fast"); // Side bar toggle
                                                $('.ContentWrapper').toggleClass("ContentWrapperNew"); // Content Wrapper Toggle
                                                $('.scroll-pane').jScrollPane();
                                                });
                                        $('.SecondaryLinkRow h5').click(function () {
                                                $('.SecondaryLinkRow ul').toggleClass("DisplayList");
                                                });
                                                // To do list toggle
                                        $('.ArrowToggle').click(function() {
                                                $(this).toggleClass("ArrowToggleTwo");
                                                $(this).parent().find('.TodolistContent').toggleClass("displayblock");
                                                $('.scroll-pane').jScrollPane();
                                        });<!-- message notification begins -->
        $('.NotificationSlide').hide();
        $('.AlertsIcon').click(function(e){ // <----you missed the '.' here in your selector.
            e.stopPropagation();
            $('.NotificationSlide').slideToggle(0);
            $('.AlertPopup').slideUp(0);
            $('.GuestPop').slideUp(0);
        });
        $('.NotificationSlide').click(function(e){
            e.stopPropagation();
        });
	
        $(document).click(function(){
            $('.NotificationSlide').slideUp(0);		 
    });
    <!-- message notification ends here -->
			
});
</script>

<script type="text/javascript">
                                                        var heightR = $(".ContentWrapper").height();
                                                        var heightL = $(".SecondaryLinkRow").height();
                                                        if (heightL > heightR){
                                                $(".ContentWrapper").css({ height: heightL});
                                                } else {
                                                $(".SecondaryLinkRow").css({ height: heightR});
                                                }
</script>

</html>
<style>
    .DividerSpan {
        margin-left: 27%;
    }input[type="search"] {
        border: 1px solid;
    }
</style>

<script src="<?php echo base_url(); ?>js/ckeditor/ckeditor.js"></script>

<div class="Wrapper">
    <?php $this->load->view("templates/admin_left_menu", array('data' => $select)); ?>
    <!-- Content side starts here -->
    <div class="ContentWrapper">

        <!-- Top Line starts here -->
        <div class="ContentTopLine">

            
        </div>    
        <!-- Top Line ends here -->



        <div class="clear space30"></div>
        <?php if ($_GET['editRowId'] != '') { ?>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#addNewForm').slideToggle();
                });
            </script>
        <?php } ?>
        <div class="formWrapper smallWrapper" id="addNewForm">
            <div class="HeadingTop">

                <h5>Edit Message</h5>
                <div class="SearchTable">
                    <a href="<?php echo $this->config->base_url(); ?>index.php/admin-dgmsg"><button id="addNewFormToggle" style="font-size: 20px;">Add New</button></a>
                </div>
            </div>
            <link rel="stylesheet" href="http://jquery.bassistance.de/validate/demo/site-demos.css">
            <script src="http://jquery.bassistance.de/validate/jquery.validate.js"></script>
            <script src="http://jquery.bassistance.de/validate/additional-methods.js"></script>
            <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

            <form action="<?php echo $this->config->base_url(); ?>index.php/admin-dgmsg" method="POST" enctype="multipart/form-data" id="groupForm">     

                <div class="clearfix">
                    <div class="two-third">
                        <label>Title:</label>

                        <input type="text" name="pageName" value="<?php echo $editDetails['dgh_message']; ?>" />
                        <label>Message:</label>

                        <textarea name="content"><?php echo $editDetails['message']; ?></textarea>




                    </div>
                    <div class="two-third">
                        <label>Title Hindi:</label>

                        <input type="text" name="pageName_hindi" value="<?php echo $editDetails['dgh_message_hindi']; ?>" />
                        <label>Message Hindi:</label>

                        <textarea name="content_hindi"><?php echo $editDetails['message_hindi']; ?></textarea>




                    </div>
                    <script type="text/javascript">
                                        var editor = CKEDITOR.replace('content');
                                        var editor1 = CKEDITOR.replace('content_hindi');
                                    </script> 
                    <div class="one-third">
                        <ul class="devList">
                                <?php
                                if($editResult!=''){
                                    foreach ($employees as $empList) {
                                    ?>
                                <li>
                                    <input type="checkbox" name="employees[]" value="<?php echo $empList['id']; ?>"
                                    <?php
                                    foreach ($editResult['employees'] as $key => $value) {
                                        if ($value['id'] == $empList['id']) {
                                            echo "checked=checked";
                                        }
                                    }
                                    ?>
                                           /><?php echo $empList['email']; ?> 
                                </li>
                                <?php }
                                }else{
                                foreach ($employees as $empList) {
                                    ?>
                                <li>
                                    <input type="checkbox" name="employees[]" value="<?php echo $empList['id']; ?>" /><?php echo $empList['email']; ?> 
                                </li>
                                <?php }} ?>
                        </ul>
                    </div>
                    <?php
                    if ($editDetails != '') {
                        ?>
						<input type="hidden" name="submitPass" value="Save" />
                        <input type="hidden" name="editId" value="<?php echo $editDetails['id']; ?>" />
                        <input type="submit" name="submitUpdate" value="Update" />
                        <?php
                    } else {
                        ?>

                        <input type="submit" name="submitPass" value="Save" />
<?php }
?>
                </div>
            </form>
        </div>

        <script>
            jQuery.validator.setDefaults({
                debug: false,
                success: "valid"
            });
            $("#groupForm").validate({
                rules: {
                    groupName: {
                        required: true
                    },
                    groupHead: {
                        required: true
                    }
                }
            });
        </script>
        <!-- Table starts here -->
<?php
echo $this->session->userdata('msg');
$this->session->unset_userdata('msg');
?>
        <div class="TableWrapper">

            <span class="HeadingTop">
                <h5>Manage Pages</h5>

                <div class="SearchTable">
                    <button id="addNewFormToggle">Add New</button>
                </div>

            </span>
<?php
if (count($staticPage) > 0) {
    ?>
                <table cellpadding="0" cellspacing="0" border="0" id="userTable">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Dg Message Title</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($staticPage as $GI) {
                            print_r($GI);die;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo strip_tags($GI['dgh_message']); ?></td>
                                <td class=""><?php echo strip_tags($GI['message']); ?></td>
                                <td class="actionRow">
                                    <a  href="<?php echo $this->config->base_url(); ?>index.php/admin-dgmsg/?editRowId=<?php echo $GI['id']; ?>" ><button type="button" name="" value="" class="Editbtn"  title="Edit"></button></a>
                                    <a  href="<?php echo $this->config->base_url(); ?>index.php/admin-dgmsg/?deleteId=<?php echo $GI['id']; ?>" ><button type="button" name="" value="" class="DeleteIcon"  title="Delete"></button></a>
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
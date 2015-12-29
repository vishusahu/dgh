<style>
    .DividerSpan {
        margin-left: 27%;
    }input[type="search"] {
        border: 1px solid;
    }
</style>

<script src="<?php echo base_url(); ?>js/ckeditor/ckeditor.js"></script>
<script class="jsbin" src="http://datatables.net/download/build/jquery.dataTables.nightly.js"></script>
<script>

</script>
<script>
    $(document).ready(function() {
        $('#userTable').dataTable();
    });
</script>
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

                <h5>Add New Page</h5>
                <div class="SearchTable">
                    <a href="<?php echo $this->config->base_url(); ?>index.php/admin/static-pages"><button id="addNewFormToggle" style="font-size: 20px;">×</button></a>
                </div>
            </div>
            <link rel="stylesheet" href="http://jquery.bassistance.de/validate/demo/site-demos.css">
            <script src="http://jquery.bassistance.de/validate/jquery.validate.js"></script>
            <script src="http://jquery.bassistance.de/validate/additional-methods.js"></script>
            <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

            <form action="<?php echo $this->config->base_url(); ?>index.php/admin/static-pages" method="POST" enctype="multipart/form-data" id="groupForm">     

                <div class="clearfix">
                    <div class="two-third">
                        <label>Page Name:</label>

                        <input type="text" name="pageName" value="<?php echo $editDetails['page']; ?>" />
                        <label>Page Content(English):</label>

                        <textarea name="content"><?php echo $editDetails['content']; ?></textarea>
                        
                        <label>Page Content(Hindi):</label>

                        <textarea name="contentHindi"><?php echo $editDetails['content_hindi']; ?></textarea>




                    </div>
                    <script type="text/javascript">
                                        var editor = CKEDITOR.replace('content');
                                        var editor1 = CKEDITOR.replace('contentHindi');
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
                            <th>Page Name</th>
                            <th>Page Content</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($staticPage as $GI) {
                            
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $GI['page']; ?></td>
                                <td class=""><?php echo $GI['content']; ?></td>
                                <td class="actionRow">
                                    <a  href="<?php echo $this->config->base_url(); ?>index.php/admin/static-pages/?editRowId=<?php echo $GI['id']; ?>" ><button type="button" name="" value="" class="Editbtn"  title="Edit"></button></a>
                                    <a  href="<?php echo $this->config->base_url(); ?>index.php/admin/static-pages/?deleteId=<?php echo $GI['id']; ?>" ><button type="button" name="" value="" class="DeleteIcon"  title="Delete"></button></a>
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

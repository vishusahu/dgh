<style>
    .DividerSpan {
        margin-left: 27%;
    }input[type="search"] {
        border: 1px solid;
    }
</style>

<script class="jsbin" src="http://datatables.net/download/build/jquery.dataTables.nightly.js"></script>
<a href="tender_view.php"></a>

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
                    <a href="#"><button id="addNewFormToggle" style="font-size: 20px;">×</button></a>
                </div>
            </div>
            
            <form action="<?php echo $this->config->base_url(); ?>index.php/admin/pepdata" method="POST" enctype="multipart/form-data" id="groupForm">     

                <div class="clearfix">
                    <div class="one-third">
                        <label>Link Text(English):</label>
                        <input type="text" name="link_eng" value="<?php echo $editDetails['link']; ?>" />
                        
                        <label>Page Content(English):</label>

                        <textarea name="content"><?php echo $editDetails['content']; ?></textarea>
                        </div>
                    <div class="one-third">
                        <label>Link Text(Hindi):</label>
                        <input type="text" name="link_hin" value="<?php echo $editDetails['link_hindi']; ?>" />
                        
                        
                        
                        
                        <label>Page Content(Hindi):</label>

                        <textarea name="contentHindi"><?php echo $editDetails['content_hindi']; ?></textarea>
                        

                    </div>
                    <script type="text/javascript">
                                        var editor = CKEDITOR.replace('content');
                                        var editor1 = CKEDITOR.replace('contentHindi');
                                    </script> 
                    
                    
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
                    link_eng: {
                        required: true
                    },
                    link_hin: {
                        required: true
                    },
                    content: {
                        required: true
                    },
                    contentHindi: {
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
if (count($purchase) > 0) {
   
    ?>
                <table cellpadding="0" cellspacing="0" border="0" id="userTable">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Link English</th>
                            <th>Content English</th>
                            <th>Link Hindi</th>
                            <th>Content Hindi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($purchase as $GI) {
                            
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $GI['link']; ?></td>
                                <td class=""><?php echo $GI['content']; ?></td>
                                <td><?php echo $GI['link_hindi'];   ?></td>
                                <td class=""><?php echo $GI['content_hindi']; ?></td>
                                <td class="actionRow">
                                    <a  href="<?php echo $this->config->base_url(); ?>index.php/admin/pepdata?editRowId=<?php echo $GI['id']; ?>" ><button type="button" name="" value="" class="Editbtn"  title="Edit"></button></a>
                                    <a  href="<?php echo $this->config->base_url(); ?>index.php/admin/pepdata?deleteId=<?php echo $GI['id']; ?>" ><button type="button" name="" value="" class="DeleteIcon"  title="Delete"></button></a>
                                </td>
                            </tr>
                            <?php
                            die('test');
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
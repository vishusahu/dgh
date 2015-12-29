<style>
    .DividerSpan {
        margin-left: 27%;
    }input[type="search"] {
        border: 1px solid;
    }
</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/jquery.datetimepicker.css"/>
<script src="<?php echo base_url() ?>js/jquery.datetimepicker.js"></script>
<script class="jsbin" src="http://datatables.net/download/build/jquery.dataTables.nightly.js"></script>
<a href="tender_view.php"></a>
<script>
    $(document).ready(function() {
        $('#userTable').dataTable();
        $('#bidOpenDate').datetimepicker({
        dayOfWeekStart: 1,
        lang: 'en',
        disabledDates: ['1986/01/08', '1986/01/09', '1986/01/10'],
        startDate: new Date()
    });
    
    $('#bidCloseDate').datetimepicker({
        dayOfWeekStart: 1,
        lang: 'en',
        disabledDates: ['1986/01/08', '1986/01/09', '1986/01/10'],
        startDate: new Date()
    });
    
    $('#downloadEndDate').datetimepicker({
        dayOfWeekStart: 1,
        lang: 'en',
        disabledDates: ['1986/01/08', '1986/01/09', '1986/01/10'],
        startDate: new Date()
    });
    
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
            
            <form action="<?php echo $this->config->base_url(); ?>index.php/admin/gallery" method="POST" enctype="multipart/form-data" id="groupForm">     

                <div class="clearfix">
                    
                    <div class="one-third">
                        
                        <select name="category">
                            <option value="">Select</option>
                            <?php 
                            foreach ($category as $cat){?>
                            <option value="<?php echo $cat['id'] ?>" <?php if($cat['id']==$editDetails['category_id']){ ?>selected="selected"<?php } ?> ><?php echo $cat['category'] ?></option>
                            <?php }
                            ?>
                        </select>
                        
                        <label>Upload Image:</label>

                        <input type="file" name="upload_forum" id="upload_forum" value="<?php echo $editDetails['uploadPdf']; ?>" />


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
                    tenderTitle: {
                        required: true
                    },
                    tenderDetails: {
                        required: true
                    },
                    bidOpenDate: {
                        required: true
                    },
                    bidCloseDate: {
                        required: true
                    },
                    downloadEndDate: {
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
if (count($tender) > 0) {
    ?>
                <table cellpadding="0" cellspacing="0" border="0" id="userTable">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($tender as $GI) {
                            
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><img src="<?php echo base_url()."/".$GI['image']; ?>" style="width: 100px;" /></td>
                                <td class="actionRow">
                                    <a  href="<?php echo $this->config->base_url(); ?>index.php/admin/gallery?editRowId=<?php echo $GI['id']; ?>" ><button type="button" name="" value="" class="Editbtn"  title="Edit"></button></a>
                                    <a  href="<?php echo $this->config->base_url(); ?>index.php/admin/gallery?deleteId=<?php echo $GI['id']; ?>" onclick="return confirm('Are you sure?');" ><button type="button" name="" value="" class="DeleteIcon"  title="Delete"></button></a>
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
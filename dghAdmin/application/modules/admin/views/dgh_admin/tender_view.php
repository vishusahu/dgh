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
        <?php if ($_GET['editRowId'] != '' || $_GET['add_more']=='1') {  ?>
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
            
            <?php if($_GET['add_more']=='1'){?>
            
            <form action="<?php echo $this->config->base_url(); ?>index.php/admin/tender" method="POST" enctype="multipart/form-data" id="groupForm">     

                <div class="clearfix">
                    <div class="one-third">
                        <label>Title:</label>

                        <input type="text" name="tenderTitle" value="<?php echo $editDetails['title']; ?>" />
                       
                    </div>
                    <div class="one-third">
                        <label>Upload PDF:</label>

                        <input type="file" name="upload_forum" id="upload_forum" value="<?php echo $editDetails['uploadPdf']; ?>" />


                    </div>
                    
                    <input type="hidden" name="tenderId" value="<?php echo $_GET['tenderId'] ?>" />

                        <input type="submit" name="submitPass" value="Save" />
                </div>
            </form>
            
            <?php }else{ ?>
            
            <form action="<?php echo $this->config->base_url(); ?>index.php/admin/tender" method="POST" enctype="multipart/form-data" id="groupForm">     

                <div class="clearfix">
                    <div class="one-third">
                        <label>Tender Title:</label>

                        <input type="text" name="tenderTitle" value="<?php echo $editDetails['title']; ?>" />
                        <label>Tender Details:</label>

                        <input type="text" name="tenderDetails" value="<?php echo $editDetails['details']; ?>" />

                        <label>Bid Opening Date:</label>

                        <input type="text" name="bidOpenDate" id="bidOpenDate" value="<?php echo $editDetails['bid_start_date']; ?>" />


                    </div>
                    <div class="one-third">
                        <label>Bid Closing Date:</label>

                        <input type="text" name="bidCloseDate" id="bidCloseDate" value="<?php echo $editDetails['bid_end_date']; ?>" />
                        <label>Download End Date:</label>

                        <input type="text" name="downloadEndDate" id="downloadEndDate" value="<?php echo $editDetails['download_end_date']; ?>" />

                        <label>Upload PDF:</label>

                        <input type="file" name="upload_forum" id="upload_forum" value="<?php echo $editDetails['uploadPdf']; ?>" />


                    </div>
                    <div class="one-third">
                        <label>Type:</label>
                        <select name="tenderType">
                            <option value="">Select</option>
                            <option value="Open" <?php if($editDetails['type']=='Open'){ ?>selected="selected"<?php } ?>>Open</option>
                            <option value="Limited" <?php if($editDetails['type']=='Limited'){ ?>selected="selected"<?php } ?>>Limited</option>
                            <option value="Others"  <?php if($editDetails['type']=='Others'){ ?>selected="selected"<?php } ?>>Others</option>
                        </select>
                        
                        <label>Scope:</label>
                        <select name="scope">
                            <option value="">Select</option>
                            <option value="National" <?php if($editDetails['scope']=='National'){ ?>selected="selected"<?php } ?>>National</option>
                            <option value="Global" <?php if($editDetails['scope']=='Global'){ ?>selected="selected"<?php } ?>>Global</option>
                        </select>
                        
                        <label>Stage:</label>
                        <select name="stage">
                            <option value="">Select</option>
                            <option value="Single Bid" <?php if($editDetails['stage']=='Single Bid'){ ?>selected="selected"<?php } ?>>Single Bid</option>
                            <option value="Two Bid" <?php if($editDetails['stage']=='Two Bid'){ ?>selected="selected"<?php } ?>>Two Bid</option>
                        </select>
                        
                        <label>Activities:</label>
                        <select name="activities">
                            <option value="">Select</option>
                            <option value="1" <?php if($editDetails['activities']=='1'){ ?>selected="selected"<?php } ?>>Fresh Tender</option>
                            <option value="2" <?php if($editDetails['activities']=='2'){ ?>selected="selected"<?php } ?>>Corrigendum</option>
                            <option value="3" <?php if($editDetails['activities']=='3'){ ?>selected="selected"<?php } ?>>Addendum</option>
                            <option value="4" <?php if($editDetails['activities']=='4'){ ?>selected="selected"<?php } ?>>Bid Closing date Extension</option>
                            <option value="5" <?php if($editDetails['activities']=='5'){ ?>selected="selected"<?php } ?>>Bidder's Query Response</option>
                            <option value="6" <?php if($editDetails['activities']=='6'){ ?>selected="selected"<?php } ?>>Other Information</option>
                            
                        </select>
                        
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
            
            <?php } ?>
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
                            <th>Details</th>
                            <th>Bid Start Date</th>
                            <th>Bid End Date</th>
                            <th>Download End Date</th>
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
                                <td><?php echo $GI['title']; ?></td>
                                <td class=""><?php echo $GI['details']; ?></td>
                                <td class=""><?php echo $GI['bid_start_date']; ?></td>
                                <td class=""><?php echo $GI['bid_end_date']; ?></td>
                                <td class=""><?php echo $GI['download_end_date']; ?></td>
                                <td class="actionRow">
                                    <a  href="<?php echo $this->config->base_url(); ?>index.php/admin/tender?editRowId=<?php echo $GI['id']; ?>" ><button type="button" name="" value="" class="Editbtn"  title="Edit"></button></a>
                                    <a  href="<?php echo $this->config->base_url(); ?>index.php/admin/tender?deleteId=<?php echo $GI['id']; ?>" ><button type="button" name="" value="" class="DeleteIcon"  title="Delete"></button></a>
                                    <a  href="<?php echo $this->config->base_url(); ?>index.php/admin/tender?add_more=1&tenderId=<?php echo $GI['id']; ?>" style="color: black;" >add more</button></a>
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
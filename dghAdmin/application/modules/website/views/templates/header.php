<!doctype html>
<head>
    <meta charset="utf-8">
    <title>Directorate General of Hydrocarbons (DGH), Noida, India</title>
    <link href="<?php echo base_url(); ?>css/main.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>css/res_layout.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>css/styles.css" rel="stylesheet" type="text/css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>css/lightbox.css">
    <script src="http://code.jquery.com/jquery-latest.min.js"
    type="text/javascript"></script>

    <script type="text/javascript">
        function MM_swapImgRestore() { //v3.0
            var i, x, a = document.MM_sr;
            for (i = 0; a && i < a.length && (x = a[i]) && x.oSrc; i++)
                x.src = x.oSrc;
        }
        function MM_preloadImages() { //v3.0
            var d = document;
            if (d.images) {
                if (!d.MM_p)
                    d.MM_p = new Array();
                var i, j = d.MM_p.length, a = MM_preloadImages.arguments;
                for (i = 0; i < a.length; i++)
                    if (a[i].indexOf("#") != 0) {
                        d.MM_p[j] = new Image;
                        d.MM_p[j++].src = a[i];
                    }
            }
        }

        function MM_findObj(n, d) { //v4.01
            var p, i, x;
            if (!d)
                d = document;
            if ((p = n.indexOf("?")) > 0 && parent.frames.length) {
                d = parent.frames[n.substring(p + 1)].document;
                n = n.substring(0, p);
            }
            if (!(x = d[n]) && d.all)
                x = d.all[n];
            for (i = 0; !x && i < d.forms.length; i++)
                x = d.forms[i][n];
            for (i = 0; !x && d.layers && i < d.layers.length; i++)
                x = MM_findObj(n, d.layers[i].document);
            if (!x && d.getElementById)
                x = d.getElementById(n);
            return x;
        }

        function MM_swapImage() { //v3.0
            var i, j = 0, x, a = MM_swapImage.arguments;
            document.MM_sr = new Array;
            for (i = 0; i < (a.length - 2); i += 3)
                if ((x = MM_findObj(a[i])) != null) {
                    document.MM_sr[j++] = x;
                    if (!x.oSrc)
                        x.oSrc = x.src;
                    x.src = a[i + 2];
                }
        }

        $(document).ready(function () {
            $('.toggle').click(function () {
                //$('.menu_container').toggle();
                $('.menu_container').slideToggle();
            });
        
            

        });

        jQuery(document).ready(function ($) {

            $('#checkbox').change(function () {
                setInterval(function () {
                    moveRight();
                }, 5000);
            });
            setInterval(function () {
                moveRight();
            }, 8000);
            var slideCount = $('#slider ul li').length;
            var slideWidth = $('#slider ul li').width();
            var slideHeight = $('#slider ul li').height();
            var sliderUlWidth = slideCount * slideWidth;

            $('#slider').css({width: slideWidth, height: slideHeight});

            $('#slider ul').css({width: sliderUlWidth, marginLeft: -slideWidth});

            $('#slider ul li:last-child').prependTo('#slider ul');
            // Can also be used with $(document).ready()



            function moveLeft() {
                $('#slider ul').animate({
                    left: +slideWidth
                }, 800, function () {
                    $('#slider ul li:last-child').prependTo('#slider ul');
                    $('#slider ul').css('left', '');
                });
            }
            ;

            function moveRight() {
                $('#slider ul').animate({
                    left: -slideWidth
                }, 800, function () {
                    $('#slider ul li:first-child').appendTo('#slider ul');
                    $('#slider ul').css('left', '');
                });
            }
            ;

            $('a.control_prev').click(function () {
                moveLeft();
            });

            $('a.control_next').click(function () {
                moveRight();
            });

        });


        function changecolors(objDivID) {
            if (document.getElementById(objDivID).style.color == 'black') {
                document.getElementById(objDivID).style.color = 'yellow';
                document.getElementById(objDivID).style.backgroundColor = 'black';
            }

            else if (document.getElementById(objDivID).style.color == 'yellow') {
                document.getElementById(objDivID).style.color = 'black';
                document.getElementById(objDivID).style.backgroundColor = 'white';
            }

            else {
                document.getElementById(objDivID).style.color = 'black';
                document.getElementById(objDivID).style.backgroundColor = 'yellow';
            }
        }

        function changecolorswhite(objDivID) {
            if (document.getElementById(objDivID).style.color == 'black') {
               
                document.getElementById(objDivID).style.backgroundColor = 'white';
            }

            else if (document.getElementById(objDivID).style.color == 'black') {
                document.getElementById(objDivID).style.color = 'black';
                document.getElementById(objDivID).style.backgroundColor = 'white';
            }

            else {
                document.getElementById(objDivID).style.color = 'black';
                document.getElementById(objDivID).style.backgroundColor = 'white';
            }
        }

    </script>


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="http://responsiveslides.com/responsiveslides.min.js"></script>

    <style type="text/css">
       
     
    


    </style>
</head>

<body onLoad="MM_preloadImages('images/submitr.png', 'images/facebookr.png', 'images/twitterr.png', 'images/blogr.png')">
    
        <div class="full_container">
            <div class="topbg">

                <div class="menu"><a href="<?php echo base_url() ?>">
<img src="<?php echo base_url(); ?>images/HomeIcon.png" width="26" height="26"></a>&nbsp;
 <a href="javascript:void(0)" class="toggle" style="text-decoration: none;"> <span style="font-size: 140%;font-weight: 600; color:white;"><?php echo $this->lang->line("Manu"); ?></span>&nbsp;<img src="<?php echo base_url(); ?>images/menu.png" width="25" height="15"></a>



                </div>



<?php

if(isset($_GET['pageId']) && $_GET['pageId']>0){

$uri = 'page?pageId='.$_GET['pageId']."/";

}
//
//echo $uri;
//die;
?>

                <div class="languge_area"> 
   
                    <p class="top_link"><a href="#skip_to_main">Skip to main content</a>  <a href="<?php echo base_url() ?>index.php/screen_reader_access">Screen reader access</a>      
<?php
$url=explode("index.php",$_SERVER['REQUEST_URI']);
	//echo "<pre>";print_r($url);die;
if ($this->session->userdata('pageLanguage') == 'en') {
    
    ?>
<a href="<?php echo base_url() ?>index.php/language?language=hin&lastUrl=<?php echo base64_encode($url[1]); ?>">हिन्दी</a> 
<?php }else if ($this->session->userdata('pageLanguage') == 'hin') {?>
<a href="<?php echo base_url() ?>index.php/language?language=en&lastUrl=<?php echo base64_encode($url[1]); ?>">English</a> 
<?php }else {?>
<a href="<?php echo base_url() ?>index.php/language?language=hin&lastUrl=<?php echo base64_encode($url[1]); ?>">हिन्दी</a> 
<?php }
?>

                        <!--      <a href="#">A-</a><a href="#" >A</a> <a href="#" style="padding-right:0px !important;">A+</a> -->
                        <a href="javascript:void(0)" class="font-button minus">A-</a><a href="javascript:void(0)" class="font-button normal">A</a><a href="javascript:void(0)" class="font-button plus">A+</a> 

                        <a href="#" onclick="document.getElementsByTagName('html')[0].className='contrast'"><img src="<?php echo base_url(); ?>images/change_contrast.png" title="Change Text/Backgroud Colors" style="vertical-align: middle;"></a>
<a href="#" onclick="document.getElementsByTagName('html')[0].className='contrast1'"><img src="<?php echo base_url(); ?>images/contrblack_on_cream.png" title="Change Text/Backgroud Colors" style="vertical-align: middle;"></a>

                        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
                        <script type="text/javascript">
        $(function () {
            $(".font-button").bind("click", function () {
                var size = parseInt($('body').css("font-size"));
                if ($(this).hasClass("plus")) {
                    size = size + 2;
                    if (size >= 30) {
                        size = 30;
                    }
                } else if ($(this).hasClass("normal")) {
                    size = 13;
                } else {
                    size = size - 2;
                    if (size <= 10) {
                        size = 10;
                    }
                }
                $('body').css("font-size", size);
            });
        });
                        </script>

                    </p>



                </div> </div>
            <div class="menu_container" style="display:none;">
            <span style="height: 24px; float: right; width: 36px; cursor: pointer;" class="toggle"><img src="<?php echo base_url(); ?>images/cloimages.png"></span>
                <div class="menu_row">
                    <div class="menu_col1">
                       <!-- <p class="menu_heading"><a href="<?php echo base_url() ?>">Home</a></p>-->
<?php
$objStaticPageModel = $this->load->model('static_page_model');
$objStaticPageModel = new static_page_model();
$pageContent = $objStaticPageModel->getAllStaticPages();
//echo "<pre>";print_r($pageContent);die;
?>
                        <p class="menu_heading"><?php echo $this->lang->line("About_DGH"); ?></p>
                        <ul class="menu1">
                            <?php
                            
                            foreach ($pageContent['ABOUT DGH']['pages'] as $pc) {
                                ?>
                                <li><a href="<?php echo base_url(); ?>index.php/page?pageId=<?php echo $pc['id'] ?>"><?php echo $pc['page'] ?></a></li>
<?php }
?>
   

                        </ul>

<p class="menu_heading"><?php echo $this->lang->line("INDIAN_HYDROCARBON_SCENARIO"); ?></p>
                        <ul class="menu1">

<?php
//echo "<pre>";print_r($pageContent['ABOUT DGH']['pages']);die;
foreach ($pageContent['INDIAN HYDROCARBON SCENARIO IN LAST 5 YEARS']['pages'] as $pc) {
    ?>
                                <li><a href="<?php echo base_url(); ?>index.php/page?pageId=<?php echo $pc['id'] ?>"><?php echo $pc['page'] ?></a></li>
<?php }
?>
                        </ul>


                    </div>



                    <div class="menu_col2">
                        <!--<p class="menu_heading"><a href="<?php echo base_url(); ?>index.php/discovery"><?php echo $this->lang->line("Discovery"); ?></a></p>-->
                        <p class="menu_heading"><?php echo $this->lang->line("DGH_ACTIVITIES"); ?></p>
                        <ul class="menu1">

<?php
//echo "<pre>";print_r($pageContent['ABOUT DGH']['pages']);die;
foreach ($pageContent['DGH’S ACTIVITIES']['pages'] as $pc) {
    ?>
                                <li><a href="<?php echo base_url(); ?>index.php/page?pageId=<?php echo $pc['id'] ?>"><?php echo strip_tags(stripslashes($pc['page'])); ?></a></li>
<?php }
?>


                        </ul>


                    </div>


                    <div class="menu_col3">

                        <p class="menu_heading"><?php echo $this->lang->line("INDIA_E_P_REGIME"); ?></p>
                        <ul class="menu1">
                           <!-- <li><a href="<?php echo base_url(); ?>index.php/exploration"><?php echo $this->lang->line("Exploration"); ?></a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/companies"><?php echo $this->lang->line("Companies"); ?></a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/consortium"><?php echo $this->lang->line("Consortium"); ?></a></li>-->
                            <?php
                            //echo "<pre>";print_r($pageContent['ABOUT DGH']['pages']);die;

                            foreach ($pageContent['INDIA’S E&P REGIME']['pages'] as $pc) {
                                ?>
                                <li><a href="<?php echo base_url(); ?>index.php/page?pageId=<?php echo $pc['id'] ?>"><?php echo $pc['page'] ?></a></li>
<?php }
?>
                            <!--            	<li><a href="#">Nomination Regime</a></li>
                                            <li><a href="#">Pre NELP Producing PSC</a></li>
                                            <li><a href="#">Pre NELP Exploration SC</a></li>
                                            <li><a href="#">NELP PSC </a></li>
                                            <li><a href="#">CBM Regime</a></li>
                                            <li><a href="#">OALP</a></li>
                                            <li><a href="#">ULP</a></li>-->
                        </ul>
   
                           
                            <p class="menu_heading"><?php echo $this->lang->line("INDIA_GEOLOGICAL_INSIGHTS"); ?></p>
                        <ul class="menu1">

<?php
//echo "<pre>";print_r($pageContent['ABOUT DGH']['pages']);die;
foreach ($pageContent['INDIA’S GEOLOGICAL INSIGHTS']['pages'] as $pc) {
    ?>
                                <li><a href="<?php echo base_url(); ?>index.php/page?pageId=<?php echo $pc['id'] ?>"><?php echo $pc['page'] ?></a></li>
<?php }
?>
                        </ul>
                      
                    </div>
                    <div class="menu_col4">
  <p class="menu_heading"> <?php echo $this->lang->line("IMPORTANT_DATA_STATISTICS_Updates"); ?></p>
  
                   
 

      <ul class="menu1">

<?php
//echo "<pre>";print_r($pageContent['ABOUT DGH']['pages']);die;


foreach ($pageContent['IMPORTANT DATA/STATISTICS/UPDATES']['pages'] as $pc) {
    ?>
 <li><a href="<?php echo base_url(); ?>index.php/page?pageId=<?php echo $pc['id'] ?>"><?php echo $pc['page'] ?></a></li>
<?php }
?>
       


                 </ul> 
                        <!--<p class="menu_heading"> <?php echo $this->lang->line("NATIONAL_DATA_REPOSITORY"); ?></p>-->
                        <p class="menu_heading"> <?php echo $this->lang->line("DOWNLOADS"); ?></p>
                        <ul class="menu1">
<?php
//echo "<pre>";print_r($pageContent['ABOUT DGH']['pages']);die;
foreach ($pageContent['DOWNLOADS']['pages'] as $pc) {
    ?>
                                <li><a href="<?php echo base_url(); ?>index.php/page?pageId=<?php echo $pc['id'] ?>"><?php echo $pc['page'] ?></a></li>
<?php }
?>
                        </ul>

                        <p class="menu_heading"> <?php echo $this->lang->line("OTHERS"); ?></p>
                        <ul class="menu1">

<?php
//echo "<pre>";print_r($pageContent['ABOUT DGH']['pages']);die;
foreach ($pageContent['OTHERS']['pages'] as $pc) {
    ?>
                                <li><a href="<?php echo base_url(); ?>index.php/page?pageId=<?php echo $pc['id'] ?>"><?php echo $pc['page'] ?></a></li>
<?php }
?>
                        </ul>
                        
                        
                        
                        
               <p class="menu_heading"> <?php echo $this->lang->line("Statistics"); ?></p>
    		<ul class="menu1">
                <li><a href="<?php echo base_url(); ?>index.php/static_page?pageId=Summary"><?php echo $this->lang->line("Summary"); ?></a></li>
            	<li><a href="<?php echo base_url(); ?>index.php/static_page?pageId=EPActivity"><?php echo $this->lang->line("Overall_E_P_Activity_Summary"); ?></a></li>
                <li><a href="<?php echo base_url(); ?>index.php/static_page?pageId=PSC Blocks"><?php echo $this->lang->line("PSC_Blocks"); ?></a></li>
                <li><a href="<?php echo base_url(); ?>index.php/static_page?pageId=PSC Fields"><?php echo $this->lang->line("PSC_Fields"); ?></a></li>
                <li><a href="<?php echo base_url(); ?>index.php/static_page?pageId=Discoviries"><?php echo $this->lang->line("Discoveries"); ?></a></li>
                <li><a href="<?php echo base_url(); ?>index.php/static_page?pageId=CBM Blocks"><?php echo $this->lang->line("CBM_Blocks"); ?></a></li>
                <!--<li><a href="<?php echo base_url(); ?>index.php/static_page?pageId=Expenditure/Revenue">Expenditure/Revenue</a></li>-->
                <li><a href="<?php echo base_url(); ?>index.php/static_page?pageId=Production">Production</a></li>
                <!--<li><a href="<?php echo base_url(); ?>index.php/static_page?pageId=EC">EC</a></li>-->
                <li><a href="<?php echo base_url(); ?>index.php/static_page?pageId=Shale Oil/Gas">Shale Oil/Gas</a></li>
            </ul> 

                    </div>




                </div>



            </div>
        </div>

        <!-- Top Area-->
        <!-- Header-->
        <div class="container">
            <div class="logo">
                <div class="allimage"> <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>images/logo.png" width="530" height="106"></a></div>
            </div>
            <div class="search_area">
                <div style="float:right"><form method="get" action="http://www.google.com/search">

                        <div >
                            <table border="0" cellpadding="0">
                                <tr><td>
                                        <input type="text"   name="q" size="25"
                                               maxlength="255" value="" />
                                        <input type="submit" value="Go" /></td></tr>
                                <tr><td align="center" style="font-size:75%">
                                        <input type="checkbox"  name="sitesearch"
                                               value="http://dghindia.org/" checked /> only search for DGH<br />
                                    </td></tr></table>
                        </div>

                    </form></div>
                <!-- <?php if ($this->session->userdata('id') != '') { ?>
                          <a href="<?php echo base_url(); ?>index.php/logout">Logout</a>
                          <p>Welcome <?php echo $this->session->userdata('name'); ?></p>
<?php } else { ?>
                     <p >
                         <input type="text" name="username" class="inputbox" id="username"> 
                         <input type="password" name="text" class="inputbox" id="password"> 
                         <a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image3','','images/submitr.png',1)" onclick="submitForm();" >
                           <img src="<?php echo base_url(); ?>images/submit.png" width="94" height="30" id="Image3" align="absmiddle">
                       </a></p>
                        <p class="reg_link">
                            <a href="<?php echo base_url(); ?>index.php/user/registration">Registration</a> | <a href="<?php echo base_url(); ?>index.php/forget_password">Forgot Password</a></p>
<?php } ?>-->
            </div>

        </div> 
<div id="skip_to_main"></div>
        <script>

            function submitForm() {
                var username = $('#username').val();
                var password = $('#password').val();
                window.location.href = "<?php echo base_url(); ?>index.php/login?username=" + username + "&password=" + password;
            }

        </script>

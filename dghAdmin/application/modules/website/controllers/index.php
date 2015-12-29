<?php

class index extends MX_Controller {

    function __construct() {
        //echo $this->config->uri;die;
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('email');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('encrypt');
        $this->load->helper('date');
        if($this->session->userdata('pageLanguage') == 'en'){
            $this->lang->load('en');
        }elseif ($this->session->userdata('pageLanguage') == 'hin') {
            $this->lang->load('hi');
        }else {
            $this->lang->load('en');
        }
        
//        $objStaticPageModel=  $this->load->model('static_page_model');
//        $objStaticPageModel= new static_page_model();
//        $data['pageContent']=$objStaticPageModel->getAllStaticPages();
        //echo "<pre>";print_r($data['pageContent']['ABOUT DGH']);die;
    }

    public function index() {
        //$data['header'] = array('view' => 'templates/header', 'data' => $data);
        //$data['main_content'] = array('view' => 'home', 'data' => $data);
        //echo "<pre>";print_r($data);die;
        $addGroupModel = $this->load->model('admin/add_group_model');
        $addGroupModel = new add_group_model();
        $data['dgMessage'] = $addGroupModel->getLastDgMessage();
        //echo "<pre>";print_r($data);die;
        $objStaticPageModel = $this->load->model('static_page_model');
        $objStaticPageModel = new static_page_model();
        $data['aboutUs'] = $objStaticPageModel->aboutUs('1');
        //echo "<pre>";print_r($data['aboutUs']);die;
        
        $objStoryModel = $this->load->model('admin/category_model');
        $objStoryModel = new category_model();
        $data['stories'] = $objStoryModel->getAllStories('1');
        $data['news'] = $objStoryModel->getAllStories('2');
        //echo $this->db->last_query();die;
        //echo "<pre>";print_r($data['stories']);die;

        //$this->load->view('home',$data);
        $data['header'] = array('view' => 'templates/header', 'data' => array());
        $data['main_content'] = array('view' => 'home.php', 'data' => array());
        $data['footer'] = array('view' => 'templates/footer', 'data' => array());
        $this->load->view('templates/common_template', $data);
    }

    public function aboutUs() {
        $data['header'] = array('view' => 'templates/header', 'data' => array());
        $data['main_content'] = array('view' => 'about.php', 'data' => array());
        $data['footer'] = array('view' => 'templates/footer', 'data' => array());
        $this->load->view('templates/common_template', $data);
    }

    public function tender() {
        $objTenderModel = $this->load->model('admin/tender_model');
        $objTenderModel = new tender_model();
        $data['tender'] = $objTenderModel->getAllTender();
        $data['latestTender'] = $objTenderModel->getAllTender('latest');
        $data['archivedTender'] = $objTenderModel->getAllTender('archived');
        $data['header'] = array('view' => 'templates/header', 'data' => array());
        $data['main_content'] = array('view' => 'tender.php', 'data' => array());
        $data['footer'] = array('view' => 'templates/footer', 'data' => array());
        $this->load->view('templates/common_template', $data);
    }

    public function purchases() {
        $objPurchaseModel = $this->load->model('admin/purchases_model');
        $objPurchaseModel = new purchases_model();
        $data['purchase'] = $objPurchaseModel->getAllData();
        $data['header'] = array('view' => 'templates/header', 'data' => array());
        $data['main_content'] = array('view' => 'purchase.php', 'data' => array());
        $data['footer'] = array('view' => 'templates/footer', 'data' => array());
        $this->load->view('templates/common_template', $data);
    }

    public function showContent() {
        $objPurchaseModel = $this->load->model('admin/purchases_model');
        $objPurchaseModel = new purchases_model();
        $objPurchaseModel->setId($_GET['id']);
        $data['purchase'] = $objPurchaseModel->getAllData();
        //print_r($data);die;
        $data['header'] = array('view' => 'templates/header', 'data' => array());
        $data['main_content'] = array('view' => 'purchase_content.php', 'data' => array());
        $data['footer'] = array('view' => 'templates/footer', 'data' => array());
        $this->load->view('templates/common_template', $data);
    }

    public function showHeaderPages() {

        $catId = $_GET['category'];
        $pageId = $_GET['pageId'];
        $objStaticPageModel = $this->load->model('static_page_model');
        $objStaticPageModel = new static_page_model();
        $content = $objStaticPageModel->getPageContent($catId, $pageId);
        $data['content'] = $content;
        $data['header'] = array('view' => 'templates/header', 'data' => array());
        $data['main_content'] = array('view' => 'page_content.php', 'data' => array());
        $data['footer'] = array('view' => 'templates/footer', 'data' => array());
        $this->load->view('templates/common_template', $data);
    }

    public function pcsexploration() {

        $objStaticPageModel = $this->load->model('static_page_model');
        $objStaticPageModel = new static_page_model();
        $content = $objStaticPageModel->getExploration();
        //echo "<pre>";print_r($content);die;
        $data['content'] = $content;
        $data['header'] = array('view' => 'templates/header', 'data' => array());
        $data['main_content'] = array('view' => 'exploration.php', 'data' => array());
        $data['footer'] = array('view' => 'templates/footer', 'data' => array());
        $this->load->view('templates/common_template', $data);
    }

    public function companies() {

        $objStaticPageModel = $this->load->model('static_page_model');
        $objStaticPageModel = new static_page_model();
        $content = $objStaticPageModel->getCompanies();
        //echo "<pre>";print_r($content);die;
        $data['content'] = $content;
        $data['header'] = array('view' => 'templates/header', 'data' => array());
        $data['main_content'] = array('view' => 'companies.php', 'data' => array());
        $data['footer'] = array('view' => 'templates/footer', 'data' => array());
        $this->load->view('templates/common_template', $data);
    }

    public function consortium() {

        $objStaticPageModel = $this->load->model('static_page_model');
        $objStaticPageModel = new static_page_model();
        $content = $objStaticPageModel->getConsortium();
        //echo "<pre>";print_r($content);die;
        $data['content'] = $content;
        $data['header'] = array('view' => 'templates/header', 'data' => array());
        $data['main_content'] = array('view' => 'consortium.php', 'data' => array());
        $data['footer'] = array('view' => 'templates/footer', 'data' => array());
        $this->load->view('templates/common_template', $data);
    }

    public function discovery() {

        $objStaticPageModel = $this->load->model('static_page_model');
        $objStaticPageModel = new static_page_model();
        $content = $objStaticPageModel->getDiscovery();
        //echo "<pre>";print_r($content);die;
        $data['content'] = $content;
        $data['header'] = array('view' => 'templates/header', 'data' => array());
        $data['main_content'] = array('view' => 'discovery.php', 'data' => array());
        $data['footer'] = array('view' => 'templates/footer', 'data' => array());
        $this->load->view('templates/common_template', $data);
    }

    public function screenReaderAccess() {

        $objStaticPageModel = $this->load->model('static_page_model');
        $objStaticPageModel = new static_page_model();
        $content = $objStaticPageModel->getDiscovery();
        //echo "<pre>";print_r($content);die;
        $data['content'] = $content;
        $data['header'] = array('view' => 'templates/header', 'data' => array());
        $data['main_content'] = array('view' => 'screen_reader_access.php', 'data' => array());
        $data['footer'] = array('view' => 'templates/footer', 'data' => array());
        $this->load->view('templates/common_template', $data);
    }

    public function registration() {

        $objStaticPageModel = $this->load->model('static_page_model');
        $objStaticPageModel = new static_page_model();
        $content = $objStaticPageModel->getDiscovery();
        $data['country'] = $objStaticPageModel->getCountry();

        if ($this->input->post('postForm') == 'submit') {
            $objStaticPageModel->setData($_POST);
            $objStaticPageModel->registration();
            $password = $objStaticPageModel->getPassword();
            
            
            $this->load->library('email');
            $this->email->from('webmaster@dghindia.org', 'Webmaster');
            $this->email->to($_POST['email']);
            $this->email->subject('UserID and Password for DGH, India');
            $this->email->message("Thank you for registering with dghindia.org. Kindly note down your log in particulars as given below.

            UserID : $_POST[email]
            Passwor : $password


            Regards,
            Web Master
            DGH, India");

            $this->email->send();

            //echo $this->email->print_debugger();
            //echo "<script>alert('Your registration has been done successfully. Your UserID and Password will be available on your E-mail. Please check your E-mail address.')</script>";
            $this->session->flashdata('success_msg', 'Your registration has been done successfully. Your UserID and Password will be available on your E-mail. Please check your E-mail address.');
            redirect('/');
        }

        $data['content'] = $content;
        $data['header'] = array('view' => 'templates/header', 'data' => array());
        $data['main_content'] = array('view' => 'registration.php', 'data' => array());
        $data['footer'] = array('view' => 'templates/footer', 'data' => array());
        $this->load->view('templates/common_template', $data);
    }

   public function staticPage() {

        $objStaticPageModel = $this->load->model('static_page_model');
        $objStaticPageModel = new static_page_model();
        $objStaticPageModel->setName($_GET['pageId']);
        $content = $objStaticPageModel->getStaticPages();
        //echo "<pre>";print_r($content);die;
        $data['content'] = $content;
        $data['header'] = array('view' => 'templates/header', 'data' => array());
        if ($_GET['pageId'] == 'Summary') {
            $data['main_content'] = array('view' => 'summary.php', 'data' => array());
        }else if ($_GET['pageId'] == 'EPActivity') {
            $data['main_content'] = array('view' => 'e_p_activity.php', 'data' => array());
        } else if ($_GET['pageId'] == 'PSC Blocks') {
            $data['main_content'] = array('view' => 'psc_blocks.php', 'data' => array());
        } else if ($_GET['pageId'] == 'PSC Fields') {
            $data['main_content'] = array('view' => 'psc_fields.php', 'data' => array());
        } else if ($_GET['pageId'] == 'CBM Blocks') {
            $data['main_content'] = array('view' => 'cbm_blocks.php', 'data' => array());
        }else if ($_GET['pageId'] == 'Discoviries') {
            $data['main_content'] = array('view' => 'discovery.php', 'data' => array());
        } else if($_GET['pageId'] == 'Production') {
	    $data['main_content'] = array('view' => 'production.php', 'data' => array());
	} else if($_GET['pageId'] == 'Shale Oil/Gas') {
	    $data['main_content'] = array('view' => 'shaleoilgas.php', 'data' => array());
	}
        $data['footer'] = array('view' => 'templates/footer', 'data' => array());
        $this->load->view('templates/common_template', $data);
    }

    public function loginUser() {

        $objStaticPageModel = $this->load->model('static_page_model');
        $objStaticPageModel = new static_page_model();
        $loginDetails = $objStaticPageModel->login($_GET['username'], $_GET['password']);
        if ($loginDetails != FALSE) {
            $this->session->set_userdata('id', $loginDetails['id']);
            $this->session->set_userdata('email', $loginDetails['email']);
            $this->session->set_userdata('name', $loginDetails['first_name'] . " " . $loginDetails['last_name']);
            redirect('/');
        } else {
            $this->session->flashdata('success_msg', 'Username or password is incorrect');
            redirect('/');
        }
    }

    public function logout() {

        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function changeLanguage() {
        //echo "<pre>";echo "<pre>";print_r(base64_decode($_GET['lastUrl']));die;
        if ($_GET['language'] == 'en') {
            $this->session->set_userdata('pageLanguage', 'en');
        } elseif ($_GET['language'] == 'hin') {
            $this->session->set_userdata('pageLanguage', 'hin');
        }
        //print_r(uri_string());die;
        //echo "<pre>";
        //print_r($this->session->userdata);die;
        redirect(base_url().'index.php'.base64_decode($_GET['lastUrl']));
    }

    public function webmaster() {


        $data['header'] = array('view' => 'templates/header', 'data' => array());
        $data['main_content'] = array('view' => 'webmaster_view.php', 'data' => array());
        $data['footer'] = array('view' => 'templates/footer', 'data' => array());
        $this->load->view('templates/common_template', $data);
    }

    public function disclaimer() {


        $data['header'] = array('view' => 'templates/header', 'data' => array());
        $data['main_content'] = array('view' => 'disclaimer.php', 'data' => array());
        $data['footer'] = array('view' => 'templates/footer', 'data' => array());
        $this->load->view('templates/common_template', $data);
    }

    public function gallery() {

        $objStaticPageModel = $this->load->model('static_page_model');
        $objStaticPageModel = new static_page_model();
        $data['gallery'] = $objStaticPageModel->getAllGallery($_GET['catId']);
        //echo "<pre>";print_r($data['gallery']);die;
        $data['header'] = array('view' => 'templates/header', 'data' => array());
        $data['main_content'] = array('view' => 'gallery.php', 'data' => array());
        $data['footer'] = array('view' => 'templates/footer', 'data' => array());
        $this->load->view('templates/common_template', $data);
    }

    public function feedback() {

        $objFeedbackModel = $this->load->model('feedback_model');
        $objFeedbackModel = new feedback_model();

        //$objFeedbackModel->saveFeedback($_POST);
        //echo "<pre>";print_r($data['gallery']);die;
        if ($this->input->post('postFeedback') == 'submit') {
            $postData = $_POST;
            $objFeedbackModel->saveFeedback($postData);
            $this->session->set_flashdata('success_msg', 'Your feedback has been submitted successfully');
            redirect('feedback');
        }
        $data['header'] = array('view' => 'templates/header', 'data' => array());
        $data['main_content'] = array('view' => 'feedback_view.php', 'data' => array());
        $data['footer'] = array('view' => 'templates/footer', 'data' => array());
        $this->load->view('templates/common_template', $data);
    }

    public function sitemap() {

        $data['header'] = array('view' => 'templates/header', 'data' => array());
        $data['main_content'] = array('view' => 'sitemap.php', 'data' => array());
        $data['footer'] = array('view' => 'templates/footer', 'data' => array());
        $this->load->view('templates/common_template', $data);
    }

    public function vigilanceComplaints() {

        $data['header'] = array('view' => 'templates/header', 'data' => array());
        $data['main_content'] = array('view' => 'vigilanceComplaints_view.php', 'data' => array());
        $data['footer'] = array('view' => 'templates/footer', 'data' => array());
        $this->load->view('templates/common_template', $data);
    }

    public function forGeneralUsers() {
        //$f = fsockopen('mail.vasinfo.com', 25) ;
//        $res = fread($f, 1024) ;
//if ($f !== false) {
//    
//        echo "Success!" ;
//}
//    else {
//        echo "Error: " . $res ;
//    }
//
//fclose($f) ;die;
        $objFeedbackModel = $this->load->model('feedback_model');
        $objFeedbackModel = new feedback_model();

        //$objFeedbackModel->saveFeedback($_POST);
        //echo "<pre>";print_r($data['gallery']);die;
        if ($this->input->post('postFeedback') == 'submit') {
            $postData = $_POST;
            $uniqueId = uniqid();
            $objFeedbackModel->saveToken($postData, $uniqueId);
            //mail('sankarshan@techaheadcorp.com', "VC", "Hi");
            
            //echo "<pre>";print_r($postData);die;
            //echo $postData['user_name'];die;
//            $this->load->library('email');
//
//            $this->email->from('dgh@vasinfosolution.co.in', 'DGH');
//            $this->email->to('pdcs051@gmail.com');
//            $this->email->subject('Your token');
            $message = 'Hello ' . $postData['user_name'] . ',
                    
                        Your token is ' . $uniqueId . '
                    
                        From,
                        DGH';
//            $this->email->message($message);
//            
//
//            if($this->email->send()){
//			echo 'send'; die;
//	    }else{
//            
//            echo $this->email->print_debugger();die;
//	  }
            
            include("C:\PHP\PEAR\Mail.php");
            /* mail setup recipients, subject etc */
            $recipients = $postData['user_name'];
            $headers["From"] = "dgh@vasinfosolution.co.in";
            $headers["To"] = $postData['user_name'];
            $headers["Subject"] = "DGH Token";
            $mailmsg = $message;
            /* SMTP server name, port, user/passwd */
            $smtpinfo["host"] = "mail.vasinfosolution.co.in";
            $smtpinfo["port"] = "25";
            $smtpinfo["auth"] = true;
            $smtpinfo["username"] = "dgh@vasinfosolution.co.in";
            $smtpinfo["password"] = "Dgh@2015";
            /* Create the mail object using the Mail::factory method */
            $mail_object =& Mail::factory("smtp", $smtpinfo);
            /* Ok send mail */
            $mail_object->send($recipients, $headers, $mailmsg);
            
            $this->session->set_flashdata('success_msg', 'Your token has been generated and mailed to you');
            redirect('for_general_users');
        }
        $data['header'] = array('view' => 'templates/header', 'data' => array());
        $data['main_content'] = array('view' => 'for_general_users_view.php', 'data' => array());
        $data['footer'] = array('view' => 'templates/footer', 'data' => array());
        $this->load->view('templates/common_template', $data);
    }

    public function glossary() {

        $objStaticPageModel = $this->load->model('static_page_model');
        $objStaticPageModel = new static_page_model();
        $pageContent = $objStaticPageModel->glossaryModel('42');
        //echo "<pre>";print_r($pageContent);die;
        $data['content'] = $pageContent;
        $data['header'] = array('view' => 'templates/header', 'data' => array());
        $data['main_content'] = array('view' => 'glossary.php', 'data' => array());
        $data['footer'] = array('view' => 'templates/footer', 'data' => array());
        $this->load->view('templates/common_template', $data);
    }
    
   

    public function rti() {

        $objStaticPageModel = $this->load->model('static_page_model');
        $objStaticPageModel = new static_page_model();
        $pageContent = $objStaticPageModel->glossaryModel('43');

        $data['content'] = $pageContent;
        $data['header'] = array('view' => 'templates/header', 'data' => array());
        $data['main_content'] = array('view' => 'rti_view.php', 'data' => array());
        $data['footer'] = array('view' => 'templates/footer', 'data' => array());
        $this->load->view('templates/common_template', $data);
    }
    
    public function destination() {

        $objStaticPageModel = $this->load->model('static_page_model');
        $objStaticPageModel = new static_page_model();
        $pageContent = $objStaticPageModel->glossaryModel('44');

        $data['content'] = $pageContent;
        $data['header'] = array('view' => 'templates/header', 'data' => array());
        $data['main_content'] = array('view' => 'rti_view.php', 'data' => array());
        $data['footer'] = array('view' => 'templates/footer', 'data' => array());
        $this->load->view('templates/common_template', $data);
    }

    public function checkTokenPage() {
        if ($this->input->post('postFeedback') == 'submit') {
            $postData = $_POST;
            $objFeedbackModel = $this->load->model('feedback_model');
            $objFeedbackModel = new feedback_model();
            $dataValue = $objFeedbackModel->checkUserToken($postData);
            
            if ($dataValue != FALSE) {
                redirect('for_public_users');
            }
            $this->session->set_flashdata('success_msg', 'You have entered wrong token');
            redirect('check_token_page');
        }

        $data['header'] = array('view' => 'templates/header', 'data' => array());
        $data['main_content'] = array('view' => 'check_token_view.php', 'data' => array());
        $data['footer'] = array('view' => 'templates/footer', 'data' => array());
        $this->load->view('templates/common_template', $data);
    }

    public function forPublicUsers() {

        if($this->input->post('postCode')=='submit'){
            $query=  $this->db->select('')
                    ->from('user_token')
                    ->where('token',$this->input->post('code'))
                    ->get();
            if($query->num_rows()>0){
                redirect('for_public_users?token='.$this->input->post('code'));
            }else{
                $this->session->set_flashdata('msg','Your code is invalid');
                redirect('vigilance_code_view');
            }
        }
        
        if ($this->input->post('postFeedback') == 'submit') {
            $postData = $_POST;
//            $this->email->clear();
//            $this->email->from('admin@dgh.com', 'DGH');
//            $this->email->to($postData['email']);
//            $this->email->subject('Your token');
            $message = "Hello " . $postData['email'] . ",
                    Name: $postData[name]
                    House/Flat No: $postData[house_flat]
                    Building/Street name: $postData[house_flat]
                    Area Name: $postData[area_name]
                    City: $postData[city]
                    State: $postData[state]
                    Pin Code: $postData[pincode]
                    Country: $postData[country]
                    Telephone: $postData[telephone_no]
                    Email: $postData[email]
                    Subject: $postData[subject]
                    Details: $postData[details]
                    From,
                    DGH";
//            $this->email->message($message);
//            $this->email->send();
            
            include("C:\PHP\PEAR\Mail.php");
            /* mail setup recipients, subject etc */
            $recipients = $postData['email'];
            $headers["From"] = "dgh@vasinfosolution.co.in";
            $headers["To"] = $postData['email'];
            $headers["Subject"] = "DGH Complain";
            $mailmsg = $message;
            /* SMTP server name, port, user/passwd */
            $smtpinfo["host"] = "mail.vasinfosolution.co.in";
            $smtpinfo["port"] = "25";
            $smtpinfo["auth"] = true;
            $smtpinfo["username"] = "dgh@vasinfosolution.co.in";
            $smtpinfo["password"] = "Dgh@2015";
            /* Create the mail object using the Mail::factory method */
            $mail_object =& Mail::factory("smtp", $smtpinfo);
            /* Ok send mail */
            $mail_object->send($recipients, $headers, $mailmsg);
            
            //echo $this->email->print_debugger();die;
            redirect(base_url());
        }
        
        $data['header'] = array('view' => 'templates/header', 'data' => array());
        if($_GET['token']!=''){
        $data['main_content'] = array('view' => 'for_public_users.php', 'data' => array());
        }else{
            redirect(base_url());    
        }
        $data['footer'] = array('view' => 'templates/footer', 'data' => array());
        $this->load->view('templates/common_template', $data);
    }
    
    public function pscFieldsViewDetails() {

        $objStaticPageModel = $this->load->model('static_page_model');
        $objStaticPageModel = new static_page_model();
        $data['content']=$objStaticPageModel->getAllDetails();
        
        $data['header'] = array('view' => 'templates/header', 'data' => array());
        $data['main_content'] = array('view' => 'view_details.php', 'data' => array());
        $data['footer'] = array('view' => 'templates/footer', 'data' => array());
        $this->load->view('templates/common_template', $data);
    }
    
    public function story_details() {

        $objStoryModel = $this->load->model('admin/category_model');
        $objStoryModel = new category_model();
        if($_GET['dgMsgId']!=''){
        $objStoryModel->setId($_GET['dgMsgId']);
        $data['stories'] = $objStoryModel->getDGMessageDetails();
        }else{
        $objStoryModel->setId($_GET['story']);
        $data['stories'] = $objStoryModel->getAllStories();
        }
        
        $data['header'] = array('view' => 'templates/header', 'data' => array());
        $data['main_content'] = array('view' => 'story_detail_view.php', 'data' => array());
        $data['footer'] = array('view' => 'templates/footer', 'data' => array());
        $this->load->view('templates/common_template', $data);
    }
    
    public function galleryCategory() {

       $objcategory_model = $this->load->model('admin/category_model');
        $objcategory_model = new category_model();
        $data['category'] = $objcategory_model->getAllPhotoCategory();
        $data['header'] = array('view' => 'templates/header', 'data' => array());
        $data['main_content'] = array('view' => 'galleryCategory.php', 'data' => array());
        $data['footer'] = array('view' => 'templates/footer', 'data' => array());
        $this->load->view('templates/common_template', $data);
    }
    
    public function getAllStories(){
        
        $objStoryModel = $this->load->model('admin/category_model');
        $objStoryModel = new category_model();
        $data['stories'] = $objStoryModel->getAllStories($_GET['type']);
        $data['header'] = array('view' => 'templates/header', 'data' => array());
        $data['main_content'] = array('view' => 'full_story_view.php', 'data' => array());
        $data['footer'] = array('view' => 'templates/footer', 'data' => array());
        $this->load->view('templates/common_template', $data);
        
    }
    
    public function vigilanceCode(){
        
        $data['header'] = array('view' => 'templates/header', 'data' => array());
        $data['main_content'] = array('view' => 'vigilance_code_view.php', 'data' => array());
        $data['footer'] = array('view' => 'templates/footer', 'data' => array());
        $this->load->view('templates/common_template', $data);
        
    }
    
    public function archiveTender(){
        $objTenderModel = $this->load->model('admin/tender_model');
        $objTenderModel = new tender_model();
        $data['archivedTender'] = $objTenderModel->getAllTender('archived');
        $data['header'] = array('view' => 'templates/header', 'data' => array());
        $data['main_content'] = array('view' => 'archive_tender_view.php', 'data' => array());
        $data['footer'] = array('view' => 'templates/footer', 'data' => array());
        $this->load->view('templates/common_template', $data);
        
    }
    
    public function viewBlockDetails() {
        
        $objStaticPageModel = $this->load->model('static_page_model');
        $objStaticPageModel = new static_page_model();
        $data['content']=$objStaticPageModel->getBlockDetails();
        //echo 'here'; die;
        $data['header'] = array('view' => 'templates/header', 'data' => array());
        $data['main_content'] = array('view' => 'view_block_details.php', 'data' => array());
        $data['footer'] = array('view' => 'templates/footer', 'data' => array());
        $this->load->view('templates/common_template', $data);
    }
    
    public function showBlockLists(){
	$statusId = $_GET['st_id'];
        $roundId  = $_GET['rd_id'];
	$objStaticPageModel = $this->load->model('static_page_model');
        $objStaticPageModel = new static_page_model();
        $data['content'] = $objStaticPageModel->getBlockList($statusId, $roundId);
	//echo '<pre>'; print_r($data['content']); die;
	$data['header'] = array('view' => 'templates/header', 'data' => array());
        $data['main_content'] = array('view' => 'show_block_lists.php', 'data' => array());
        $data['footer'] = array('view' => 'templates/footer', 'data' => array());
        $this->load->view('templates/common_template', $data);
    }
    
    public function showBlockDetails(){
	$blockId = $_GET['block_id'];
	$objStaticPageModel = $this->load->model('static_page_model');
        $objStaticPageModel = new static_page_model();
        $data['content'] = $objStaticPageModel->showBlockDetails($blockId);
	//echo '<pre>'; print_r($data['content']); die;
	$data['header'] = array('view' => 'templates/header', 'data' => array());
        $data['main_content'] = array('view' => 'show_block_details.php', 'data' => array());
        $data['footer'] = array('view' => 'templates/footer', 'data' => array());
        $this->load->view('templates/common_template', $data);
    
    }
    
    public function showDiscoveryList() {
	$roundName = $_GET['rd_nm'];
	$objStaticPageModel = $this->load->model('static_page_model');
        $objStaticPageModel = new static_page_model();
        $data['content'] = $objStaticPageModel->showDiscoveryList($roundName);
	$data['header'] = array('view' => 'templates/header', 'data' => array());
        $data['main_content'] = array('view' => 'show_discovery_list.php', 'data' => array());
        $data['footer'] = array('view' => 'templates/footer', 'data' => array());
        $this->load->view('templates/common_template', $data);
    }
    
    public function showDiscoveryDetails() {
	$dscName = $_GET['dsc_nm'];
	$objStaticPageModel = $this->load->model('static_page_model');
        $objStaticPageModel = new static_page_model();
        $data['content'] = $objStaticPageModel->showDiscoveryDetails($dscName);
	$data['header'] = array('view' => 'templates/header', 'data' => array());
        $data['main_content'] = array('view' => 'show_discovery_details.php', 'data' => array());
        $data['footer'] = array('view' => 'templates/footer', 'data' => array());
        $this->load->view('templates/common_template', $data);
    }
  
    public function showRoundList(){
	$roundName = $_GET['rd_nm'];
	$statusID = $_GET['st_id'];
	$objStaticPageModel = $this->load->model('static_page_model');
        $objStaticPageModel = new static_page_model();
        $data['content'] = $objStaticPageModel->showRoundList($roundName, $statusID);
	$data['header'] = array('view' => 'templates/header', 'data' => array());
        $data['main_content'] = array('view' => 'show_round_list.php', 'data' => array());
        $data['footer'] = array('view' => 'templates/footer', 'data' => array());
        $this->load->view('templates/common_template', $data);
    }
    
    public function showRoundDetails(){
	$blockName = $_GET['block_nm'];
	$objStaticPageModel = $this->load->model('static_page_model');
        $objStaticPageModel = new static_page_model();
        $data['content'] = $objStaticPageModel->showRoundDetails($blockName);
	$data['header'] = array('view' => 'templates/header', 'data' => array());
        $data['main_content'] = array('view' => 'show_round_details.php', 'data' => array());
        $data['footer'] = array('view' => 'templates/footer', 'data' => array());
        $this->load->view('templates/common_template', $data);
    }

    

}

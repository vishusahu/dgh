<?php

/*
 * Admin controller
 * @author PHP Team
 * @className dghDashboard
 * @access Public
 */

class dghDashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('email');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('encrypt');
        $this->load->helper('date');
        if($this->session->userdata('ADMIN_ID')==''){
            redirect(base_url());
        }
    }

    public function groups() {

        $addGroupModel = $this->load->model('add_group_model');
        $addGroupModel = new add_group_model();
        $objcategory_model = $this->load->model('category_model');
        $objcategory_model = new category_model();
        $data['category'] = $objcategory_model->getAllCategory();
        if ($this->input->post('submitPass') == 'Save') {
            $addGroupModel->setId($this->input->post('editId'));
            $addGroupModel->setGroup_name($this->input->post('pageName'));
            $addGroupModel->setGroup_head($this->input->post('content'));
            $addGroupModel->save($this->input->post('contentHindi'),$this->input->post('pageNameHindi'),$this->input->post('category'));
            $this->session->set_userdata('msg', 'Page saved successfully');
            redirect('admin/static-pages');
        }
        $data['staticPage'] = $addGroupModel->getAllStaticPages();
        if ($_GET['editRowId'] != '') {
            $addGroupModel->setId($_GET['editRowId']);
            $data['editDetails'] = $addGroupModel->getAllStaticPages();
        }


        if ($_GET['deleteId'] != '') {
            $this->db->where('id', $_GET['deleteId'])->delete('ws_static_pages');
            $this->session->set_userdata('msg', 'Page deleted successfully');
            redirect('admin/static-pages');
        }

        //echo "<pre>";print_r($data);die;
        $data['header'] = array('view' => 'templates/header', 'data' => $data);
        $data['main_content'] = array('view' => 'dgh_admin/groups', 'data' => $data);
        $this->load->view('templates/common_template', $data);
    }

    public function dgMessage() {



        $addGroupModel = $this->load->model('add_group_model');
        $addGroupModel = new add_group_model();


        if ($this->input->post('submitPass') == 'Save') {
            $addGroupModel->setId($this->input->post('editId'));
            $addGroupModel->setGroup_name($this->input->post('pageName'));
            $addGroupModel->setGroup_head($this->input->post('content'));
            $addGroupModel->saveDgMessage($this->input->post('pageName_hindi'),$this->input->post('content_hindi'));
            $this->session->set_userdata('msg', 'Message saved successfully');
            redirect('admin-dgmsg');
        }
        $data['staticPage'] = $addGroupModel->getAllStaticDgMessage();
        if ($_GET['editRowId'] != '') {
            $addGroupModel->setId($_GET['editRowId']);
            $data['editDetails'] = $addGroupModel->getAllStaticDgMessage();
        }


        if ($_GET['deleteId'] != '') {
            $this->db->where('id', $_GET['deleteId'])->delete('ws_dgh_message');
            $this->session->set_userdata('msg', 'Message deleted successfully');
            redirect('admin-dgmsg');
        }


        $data['header'] = array('view' => 'templates/header', 'data' => $data);
        $data['main_content'] = array('view' => 'dgh_admin/dg-message.php', 'data' => $data);
        $this->load->view('templates/common_template', $data);
    }

    public function tender() {

        $objTenderModel = $this->load->model('tender_model');
        $objTenderModel = new tender_model();
        
        if ($this->input->post('tenderId') != '') {
         
            if ($_FILES['upload_forum']['size'] > 0) {
                $folderRegister = './assets/tender/'; // folder is used for upload path
                if (!is_dir($folderRegister)) {
                    mkdir($folderRegister, 0777, TRUE);
                }
                $imgNameRegister = date("Y-m-d");
                $nameImgRegister = "";
                $nameCharRegister = "ABCDEFGHIJKLMNOPQRSTYUVWXYZabcdefghijklmnopqrstuvwxyz";
                for ($i = 0; $i < 3; $i++) {
                    $nameImgRegister .= $nameCharRegister[rand(0, strlen($nameCharRegister))];
                }
                $imagenameActual = $_FILES['upload_forum']['name'];
                $imagenameRegister = $imgNameRegister . $nameImgRegister . $imagenameActual;
                $serverUrlRegister = $folderRegister . $imagenameRegister;
                //echo $serverUrlRegister;
                if (move_uploaded_file($_FILES['upload_forum']['tmp_name'], $serverUrlRegister)) {
                    $baseUrlForPdf = 'assets/tender/' . $imagenameRegister;
                    
                }
            }
            $objTenderModel->saveTenderDocs($_POST,$baseUrlForPdf);
            $this->session->set_userdata('msg', 'Tender doc added successfully');
            redirect('admin/tender');
        }
        
        if ($this->input->post('submitPass') == 'Save') {
            //echo "<pre>";print_r($_FILES);die;
            if ($_FILES['upload_forum']['size'] > 0) {
                $folderRegister = './assets/tender/'; // folder is used for upload path
                if (!is_dir($folderRegister)) {
                    mkdir($folderRegister, 0777, TRUE);
                }
                $imgNameRegister = date("Y-m-d");
                $nameImgRegister = "";
                $nameCharRegister = "ABCDEFGHIJKLMNOPQRSTYUVWXYZabcdefghijklmnopqrstuvwxyz";
                for ($i = 0; $i < 3; $i++) {
                    $nameImgRegister .= $nameCharRegister[rand(0, strlen($nameCharRegister))];
                }
                $imagenameActual = $_FILES['upload_forum']['name'];
                $imagenameRegister = $imgNameRegister . $nameImgRegister . $imagenameActual;
                $serverUrlRegister = $folderRegister . $imagenameRegister;
                //echo $serverUrlRegister;die;
                if (move_uploaded_file($_FILES['upload_forum']['tmp_name'], $serverUrlRegister)) {
                    $baseUrlForPdf = 'assets/tender/' . $imagenameRegister;
                    
                }
            }
            //echo $baseUrlForPdf;die;
            $objTenderModel->setId($this->input->post('editId'));
            $objTenderModel->saveTender($_POST,$baseUrlForPdf);
            $this->session->set_userdata('msg', 'Tender added successfully');
            redirect('admin/tender');
        }
        $data['tender'] = $objTenderModel->getAllTender();
        if ($_GET['editRowId'] != '') {
            $objTenderModel->setId($_GET['editRowId']);
            $data['editDetails'] = $objTenderModel->getAllTender();
        }
        $data['header'] = array('view' => 'templates/header', 'data' => $data);
        $data['main_content'] = array('view' => 'dgh_admin/tender_view.php', 'data' => $data);
        $this->load->view('templates/common_template', $data);
    }
    
    public function pepdata() {
        
        $objPurchaseModel = $this->load->model('purchases_model');
        $objPurchaseModel = new purchases_model();
        if ($this->input->post('submitPass') == 'Save') {
            //echo "<pre>";print_r($_POST);die;
            $objPurchaseModel->setId($this->input->post('editId'));
            $objPurchaseModel->savePurchases($_POST);
            $this->session->set_userdata('msg', 'Data added successfully');
            redirect('admin/pepdata');
        }
        $data['purchase'] = $objPurchaseModel->getAllData();
        if ($_GET['editRowId'] != '') {
            $objPurchaseModel->setId($_GET['editRowId']);
            $data['editDetails'] = $objPurchaseModel->getAllData();
        }
        if ($_GET['deleteId'] != '') { 
            $objPurchaseModel->setId($_GET['deleteId']);
            $data['editDetails'] = $objPurchaseModel->deletedata();
            $this->session->set_userdata('msg', 'Data deleted successfully');
            redirect('admin/pepdata');
        }
        $data['header'] = array('view' => 'templates/header', 'data' => $data);
        $data['main_content'] = array('view' => 'dgh_admin/eapdata.php', 'data' => $data);
        $this->load->view('templates/common_template', $data);
    }
    
    public function categories() {
        
        $objcategory_model = $this->load->model('category_model');
        $objcategory_model = new category_model();
        if ($this->input->post('submitPass') == 'Save') {
            //echo "<pre>";print_r($_POST);die;
            $objcategory_model->setId($this->input->post('editId'));
            $objcategory_model->saveCategory($_POST);
            $this->session->set_userdata('msg', 'Data added successfully');
            redirect('admin/categories');
        }
        
        $data['category'] = $objcategory_model->getAllCategory();
        //print_r($data);die;
        if ($_GET['editRowId'] != '') {
            $objcategory_model->setId($_GET['editRowId']);
            $data['editDetails'] = $objcategory_model->getAllCategory();
        }
        if ($_GET['deleteId'] != '') { 
            $objcategory_model->setId($_GET['deleteId']);
            $data['editDetails'] = $objcategory_model->deletedata();
            $this->session->set_userdata('msg', 'Data deleted successfully');
            redirect('admin/categories');
        }
        $data['header'] = array('view' => 'templates/header', 'data' => $data);
        $data['main_content'] = array('view' => 'dgh_admin/category_view.php', 'data' => $data);
        $this->load->view('templates/common_template', $data);
    }
    
    public function gallery() {

        $objTenderModel = $this->load->model('tender_model');
        $objTenderModel = new tender_model();
        if ($this->input->post('submitPass') == 'Save') {
            //echo "<pre>";print_r($_POST);die;
            if ($_FILES['upload_forum']['size'] > 0) {
                $folderRegister = './assets/gallery/'; // folder is used for upload path
                if (!is_dir($folderRegister)) {
                    mkdir($folderRegister, 0777, TRUE);
                }
                $imgNameRegister = date("Y-m-d");
                $nameImgRegister = "";
                $nameCharRegister = "ABCDEFGHIJKLMNOPQRSTYUVWXYZabcdefghijklmnopqrstuvwxyz";
                for ($i = 0; $i < 3; $i++) {
                    $nameImgRegister .= $nameCharRegister[rand(0, strlen($nameCharRegister))];
                }
                $imagenameActual = $_FILES['upload_forum']['name'];
                $imagenameRegister = $imgNameRegister . $nameImgRegister . $imagenameActual;
                $serverUrlRegister = $folderRegister . $imagenameRegister;
                //echo $serverUrlRegister;
                if (move_uploaded_file($_FILES['upload_forum']['tmp_name'], $serverUrlRegister)) {
                    $baseUrlForPdf = 'assets/gallery/' . $imagenameRegister;
                    
                }
            }
            $objTenderModel->setId($this->input->post('editId'));
            $objTenderModel->saveGallery($baseUrlForPdf,  $this->input->post('category'));
            $this->session->set_userdata('msg', 'Gallery added successfully');
            redirect('admin/gallery');
        }
        $objcategory_model = $this->load->model('category_model');
        $objcategory_model = new category_model();
        $data['category'] = $objcategory_model->getAllPhotoCategory();
        $data['tender'] = $objTenderModel->getAllGallery();
        if ($_GET['editRowId'] != '') {
            $objTenderModel->setId($_GET['editRowId']);
            $data['editDetails'] = $objTenderModel->getAllGallery();
            //echo "<pre>";print_r($data['editDetails']);die;
        }
        if($_GET['deleteId']){
            $this->db->where('id',$_GET['deleteId'])->delete('ws_gallery');
            redirect('admin/gallery');
        }
        $data['header'] = array('view' => 'templates/header', 'data' => $data);
        $data['main_content'] = array('view' => 'dgh_admin/gallery.php', 'data' => $data);
        $this->load->view('templates/common_template', $data);
    }
    
    public function stories() {
        
        $objcategory_model = $this->load->model('category_model');
        $objcategory_model = new category_model();
        if ($this->input->post('submitPass') == 'Save') {
            //echo "<pre>";print_r($_POST);die;
            $objcategory_model->setId($this->input->post('editId'));
            $objcategory_model->saveStories($_POST);
            $this->session->set_userdata('msg', 'Data added successfully');
            redirect('admin/stories');
        }
        
        $data['story'] = $objcategory_model->getAllStories();
        //echo "<pre>";print_r($data);die;
        if ($_GET['editRowId'] != '') {
            $objcategory_model->setId($_GET['editRowId']);
            $data['editDetails'] = $objcategory_model->getAllStories();
        }
        if ($_GET['deleteId'] != '') { 
            $objcategory_model->setId($_GET['deleteId']);
            $data['editDetails'] = $objcategory_model->deleteStory();
            $this->session->set_userdata('msg', 'Data deleted successfully');
            redirect('admin/stories');
        }
        $data['header'] = array('view' => 'templates/header', 'data' => $data);
        $data['main_content'] = array('view' => 'dgh_admin/story_view.php', 'data' => $data);
        $this->load->view('templates/common_template', $data);
    }
    
    public function photoCategories() {
        
        $objcategory_model = $this->load->model('category_model');
        $objcategory_model = new category_model();
        if ($this->input->post('submitPass') == 'Save') {
            //echo "<pre>";print_r($_POST);die;
            $objcategory_model->setId($this->input->post('editId'));
            $objcategory_model->savePhotoCategory($_POST);
            $this->session->set_userdata('msg', 'Data added successfully');
            redirect('photo/categories');
        }
        
        $data['category'] = $objcategory_model->getAllPhotoCategory();
        //print_r($data);die;
        if ($_GET['editRowId'] != '') {
            $objcategory_model->setId($_GET['editRowId']);
            $data['editDetails'] = $objcategory_model->getAllPhotoCategory();
        }
        if ($_GET['deleteId'] != '') { 
            $objcategory_model->setId($_GET['deleteId']);
            $data['editDetails'] = $objcategory_model->deletePhotodata();
            $this->session->set_userdata('msg', 'Data deleted successfully');
            redirect('photo/categories');
        }
        $data['header'] = array('view' => 'templates/header', 'data' => $data);
        $data['main_content'] = array('view' => 'dgh_admin/photo_gallery_view.php', 'data' => $data);
        $this->load->view('templates/common_template', $data);
    }
    
    public function downloads() {

        $objTenderModel = $this->load->model('tender_model');
        $objTenderModel = new tender_model();
        if ($this->input->post('submitPass') == 'Save') {
            //echo "<pre>";print_r($_POST);die;
            if ($_FILES['upload_forum']['size'] > 0) {
                $folderRegister = './assets/downloads/'; // folder is used for upload path
                if (!is_dir($folderRegister)) {
                    mkdir($folderRegister, 0777, TRUE);
                }
                $imgNameRegister = date("Y-m-d");
                $nameImgRegister = "";
                $nameCharRegister = "ABCDEFGHIJKLMNOPQRSTYUVWXYZabcdefghijklmnopqrstuvwxyz";
                for ($i = 0; $i < 3; $i++) {
                    $nameImgRegister .= $nameCharRegister[rand(0, strlen($nameCharRegister))];
                }
                $imagenameActual = $_FILES['upload_forum']['name'];
                $imagenameRegister = $imgNameRegister . $nameImgRegister . $imagenameActual;
                $serverUrlRegister = $folderRegister . $imagenameRegister;
                //echo $serverUrlRegister;
                if (move_uploaded_file($_FILES['upload_forum']['tmp_name'], $serverUrlRegister)) {
                    $baseUrlForPdf = 'assets/downloads/' . $imagenameRegister;
                    
                }
            }
            $objTenderModel->setId($this->input->post('editId'));
            $objTenderModel->saveUpload($baseUrlForPdf);
            $this->session->set_userdata('msg', 'Uploaded');
            redirect('admin/upload');
        }
        $objcategory_model = $this->load->model('category_model');
        $objcategory_model = new category_model();
        $data['tender'] = $objTenderModel->getAllDownloads();
        if ($_GET['editRowId'] != '') {
            $objTenderModel->setId($_GET['editRowId']);
            $data['editDetails'] = $objTenderModel->getAllDownloads();
            //echo "<pre>";print_r($data['editDetails']);die;
        }
        if($_GET['deleteId']){
            $this->db->where('id',$_GET['deleteId'])->delete('uploads');
            redirect('admin/upload');
        }
        $data['header'] = array('view' => 'templates/header', 'data' => $data);
        $data['main_content'] = array('view' => 'dgh_admin/upload_view.php', 'data' => $data);
        $this->load->view('templates/common_template', $data);
    }

}

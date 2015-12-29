<?php

class tender_model extends CI_Model{
    
    private $_id;
    private $_title;
    private $_details;
    private $_bidStartDate;
    private $_bidEndDate;
    private $_downlaodEnddate;
    private $_data="";
           
    function getData() {
        return $this->_data;
    }

    function setData($data) {
        $this->_data = $data;
    }
    
    function getId() {
        return $this->_id;
    }

    function getTitle() {
        return $this->_title;
    }

    function getDetails() {
        return $this->_details;
    }

    function getBidStartDate() {
        return $this->_bidStartDate;
    }

    function getBidEndDate() {
        return $this->_bidEndDate;
    }

    function getDownlaodEnddate() {
        return $this->_downlaodEnddate;
    }

    function setId($id) {
        $this->_id = $id;
    }

    function setTitle($title) {
        $this->_title = $title;
    }

    function setDetails($details) {
        $this->_details = $details;
    }

    function setBidStartDate($bidStartDate) {
        $this->_bidStartDate = $bidStartDate;
    }

    function setBidEndDate($bidEndDate) {
        $this->_bidEndDate = $bidEndDate;
    }

    function setDownlaodEnddate($downlaodEnddate) {
        $this->_downlaodEnddate = $downlaodEnddate;
    }
    
    public function saveTender($dataSave,$pdf){
        $id=  $this->getId();
        $data['title']=  $dataSave['tenderTitle'];
        $data['details']=  $dataSave['tenderDetails'];
        $data['bid_start_date']=  $dataSave['bidOpenDate'];
        $data['bid_end_date']=  $dataSave['bidCloseDate'];
        $data['download_end_date']=  $dataSave['downloadEndDate'];
        if($pdf!=''){
        $data['pdf']=  $pdf;
        }
        $data['type']=  $dataSave['tenderType'];
        $data['scope']=  $dataSave['scope'];
        $data['stage']=  $dataSave['stage'];
        $data['activities']=  $dataSave['activities'];
        $data=  array_filter($data);
        if($id!=''){
        $this->db->set($data)->where('id',$id)->update('dgh_tender');
        }else{
        $this->db->set($data)->insert('dgh_tender');
        }
        //echo $this->db->last_query();die;
        return true;
    }
    
    public function getAllTender($showType){
        $id=  $this->getId();
        $date=date("Y-m-d");
        $query=  $this->db->select()
                ->from('dgh_tender');
        if($id!=''){
            $query=  $this->db->where('id',$id);
        }
        if($showType=='archived'){
            $query=  $this->db->where("bid_end_date < '$date'");
        }else{
            $query=  $this->db->where("bid_end_date > '$date'");
        }
        if($showType=='latest'){
            $query=  $this->db->order_by('created_on','desc');
        }
        $query=  $this->db->get();
        if($showType=='archived'){
        //echo $this->db->last_query();die;
        }
        $row=$query->result_array();
        if($id==''){
        foreach ($row as $key=>$r){
            
            $docQuery=  $this->db->select('')
                    ->from('tender_documents')
                    ->where('tender_id',$r['id'])
                    ->get();
            $row[$key]['docs']=$docQuery->result_array();
            
        }
        }
        //echo "<pre>";print_r($row);die;
        if($id!=''){
            return $query->row_array();
        }
        return $row;
    }
    
    public function getAllGallery(){
        $id=  $this->getId();
        $query=  $this->db->select()
                ->from('ws_gallery');
        if($id!=''){
            $query=  $this->db->where('id',$id);
        }
        $query=  $this->db->order_by('id','desc')->get();
        if($id!=''){
            return $query->row_array();
        }
        return $query->result_array();
    }
    
    public function getAllDownloads(){
        $id=  $this->getId();
        $query=  $this->db->select()
                ->from('uploads');
        if($id!=''){
            $query=  $this->db->where('id',$id);
        }
        $query=  $this->db->order_by('id','desc')->get();
        if($id!=''){
            return $query->row_array();
        }
        return $query->result_array();
    }
    
    public function saveGallery($image,$category){
        if($image!=''){
        $data['image']=$image;
        }
        $data['category_id']=$category;
        $id=  $this->getId();
        if($id!=''){
        $this->db->set($data)->where('id',$id)->update('ws_gallery');
        }else{
        $this->db->set($data)->insert('ws_gallery');
        }
        return TRUE;
        
    }
    
    public function saveUpload($image,$category){
        if($image!=''){
        $data['image']=$image;
        }
        $id=  $this->getId();
        if($id!=''){
        $this->db->set($data)->where('id',$id)->update('uploads');
        }else{
        $this->db->set($data)->insert('uploads');
        }
        return TRUE;
        
    }
    
    public function saveTenderDocs($postData,$pdf){
        
        $data['title']=$postData['tenderTitle'];
        $data['pdf']=$pdf;
        $data['tender_id']       =$postData['tenderId']; 
        //echo "<pre>";print_r($data);die;
        $this->db->set($data)->insert('tender_documents');
        $this->db->set('created_on','now()',FALSE)->where('id',$postData['tenderId'])->update('dgh_tender');
        return TRUE;
    }

}


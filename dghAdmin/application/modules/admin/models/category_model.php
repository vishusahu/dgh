<?php

class category_model extends CI_Model{
    
    private $_id="";
    
    function getId() {
        return $this->_id;
    }

    function setId($id) {
        $this->_id = $id;
    }

    function saveCategory($postData){
        
        $id=  $this->getId();
        $data['category']=$postData['category'];
        if($id!=''){
            $this->db->set($data)->where('id',$id)->update('ws_category');
        }else{
            $this->db->set($data)->insert('ws_category');
        }
        return TRUE;
    }
    
    function savePhotoCategory($postData){
        
        $id=  $this->getId();
        $data['category']=$postData['category'];
        if($id!=''){
            $this->db->set($data)->where('id',$id)->update('gallery_category');
        }else{
            $this->db->set($data)->insert('gallery_category');
        }
        return TRUE;
    }
    
    function getAllCategory(){
        
        $id=  $this->getId();
        $query=  $this->db->select('')
                ->from('ws_category');
        if($id!=''){
            $query=  $this->db->where('id',$id);
        }
        $query=  $this->db->get();
        if($id!=''){
            return $query->row_array();
        }
        return $query->result_array();
        
    }
    
    function getAllPhotoCategory(){
        
        $id=  $this->getId();
        $query=  $this->db->select()
                ->from('gallery_category');
        if($id!=''){
            $query=  $this->db->where('id',$id);
        }
        $query=  $this->db->get();
        if($id!=''){
            return $query->row_array();
        }
        return $query->result_array();
        
    }
    
    function getAllStories($type){
        
        $id=  $this->getId();
        $query=  $this->db->select()
                ->from('top_stories');
        if($id!=''){
            $query=  $this->db->where('id',$id);
        }
        if($type!=''){
            $query=  $this->db->where('type',$type);
        }
        $query=  $this->db->order_by('id','desc')->get();
        if($id!=''){
            return $query->row_array();
        }
        return $query->result_array();
        
    }
    
    public function deletedata(){
        $this->db->where('id',  $this->getId())->delete('ws_category');
        //echo $this->db->last_query();die;
        return true;
    }
    
    public function deletePhotodata(){
        $this->db->where('id',  $this->getId())->delete('gallery_category');
        //echo $this->db->last_query();die;
        return true;
    }
    
    public function deleteStory(){
        $this->db->where('id',  $this->getId())->delete('top_stories');
        //echo $this->db->last_query();die;
        return true;
    }
    
    public function saveStories($postData){
        $id=  $this->getId();
        $data['title']=$postData['title'];
        $data['type']=$postData['type'];
        $data['description']=$postData['description'];
        if($id!=''){
            $this->db->set($data)->where('id',$id)->update('top_stories');
        }else{
            $this->db->set($data)->insert('top_stories');
        }
        return true;
    }
    
    function getDGMessageDetails(){
        
        $id=  $this->getId();
        if ($this->session->userdata('pageLanguage') == 'en') {
            $query=  $this->db->select('message as description');
        }else{
            $query=  $this->db->select('message_hindi as description');
        }
        
        $query=  $this->db->from('ws_dgh_message');
        if($id!=''){
            $query=  $this->db->where('id',$id);
        }
        $query=  $this->db->get();
        if($id!=''){
            return $query->row_array();
        }
        return $query->result_array();
        
    }
}

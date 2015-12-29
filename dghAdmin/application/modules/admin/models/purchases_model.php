<?php

class purchases_model extends CI_Model{
    
    private $_Id="";
    function getId() {
        return $this->_Id;
    }

    function setId($Id) {
        $this->_Id = $Id;
    }
    
    public function savePurchases($postData){
        $id=  $this->getId();
        $data['content']=$postData['content'];
        $data['link']=$postData['link_eng'];
        $data['link_hindi']=$postData['link_hin'];
        $data['content_hindi']=$postData['contentHindi'];
        if($this->getId()){
        $this->db->set($data)->where('id',$id)->update('ws_purchase_data');
        }else{
        $this->db->set($data)->insert('ws_purchase_data');
        }
        return TRUE;
        
    }
    
    public function getAllData(){
        
        $id=  $this->getId();
        $query=  $this->db->select()
                ->from('ws_purchase_data');
        if($id!=''){
            $query=  $this->db->where('id',$id);
        }
        $query=  $this->db->get();
        if($id!=''){
            return $query->row_array();
        }
        return $query->result_array();
        
    }
    
    public function deletedata(){
        $this->db->where('id',  $this->getId())->delete('ws_purchase_data');
        //echo $this->db->last_query();die;
        return true;
    }
    
}

<?php

class feedback_model extends CI_Model{
    
    
    public function saveFeedback($postData){
        
        $data['user_id']=$postData['user_id'] != ''?$postData['user_id']:1;
        $data['user_name']=$postData['user_name'];
        $data['subject']=$postData['subject'];
        $data['content']=$postData['content'];
        $this->db->set($data)->insert('ws_user_feedback');
        return TRUE;
    }
    
    public function saveToken($postData,$uniqueId){
        
        $data['email']=$postData['user_name'];
        $data['token']=$uniqueId;
        $this->db->set($data)->insert('user_token');
        return TRUE;
        
    }
    
    
}
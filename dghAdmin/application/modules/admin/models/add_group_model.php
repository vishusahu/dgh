<?php

class add_group_model extends CI_Model {

    private $_tableName = "acx_groups";
    private $_id = "";
    private $_group_name = "";
    private $_group_head = "";
    private $_employees = "";
    private $_create_at = "";

    public function getTableName() {
        return $this->_tableName;
    }

    public function getId() {
        return $this->_id;
    }

    public function getGroup_name() {
        return $this->_group_name;
    }

    public function getGroup_head() {
        return $this->_group_head;
    }

    public function getEmployees() {
        return $this->_employees;
    }

    public function getCreate_at() {
        return $this->_create_at;
    }

    public function setTableName($tableName) {
        $this->_tableName = $tableName;
    }

    public function setId($id) {
        $this->_id = $id;
    }

    public function setGroup_name($group_name) {
        $this->_group_name = $group_name;
    }

    public function setGroup_head($group_head) {
        $this->_group_head = $group_head;
    }

    public function setEmployees($employees) {
        $this->_employees = $employees;
    }

    public function setCreate_at($create_at) {
        $this->_create_at = $create_at;
    }

    public function save($hindi, $pageNameHindi,$category) {

        // echo $this->getGroup_name();die;
        //echo $category;die;
        $id = $this->getId();
        $data['page'] = $this->getGroup_name();
        $data['page_hindi'] = $pageNameHindi;
        $data['content'] = $this->getGroup_head();
        $data['content_hindi'] = ($hindi);
        if($category!=''){
        $data['category'] = $category;
        }
        header('Content-Type: text/html; charset=UTF-8');
        //echo "<pre>";print_r($data);die;
        mysql_set_charset('utf8');
        if ($id != '') {
            $this->db->set($data)->where('id', $id)->update('ws_static_pages');
        } else {
            $this->db->set($data)->insert('ws_static_pages');
        }
        return TRUE;
    }

    public function saveDgMessage($pageNameHindi,$contentHindi) {

        // echo $this->getGroup_name();die;
        $id = $this->getId();
        $data['dgh_message'] = $this->getGroup_name();
        $data['message'] = $this->getGroup_head();
        $data['dgh_message_hindi'] = $pageNameHindi;
        $data['message_hindi'] = $contentHindi;

        if ($id != '') {
            $this->db->set($data)->where('id', $id)->update('ws_dgh_message');
        } else {
            $this->db->set($data)->insert('ws_dgh_message');
        }
        return TRUE;
    }

    public function delete() {
        $id = $this->getId();
        $this->db->where('id', $id)->delete($this->getTableName());
        // echo $this->db->last_query().'<br>';
        $this->db->set('group_head', NULL)->set('category', NULL)->set('group_id', '0')->where('group_head', $id)->update('acx_users');
        //  echo $this->db->last_query().'<br>';
        ///die;
    }

    public function getAllStaticPages() {
        $row = array();
        $id = $this->getId();

        $query = $this->db->select('*')
                ->from('ws_static_pages');
        if ($id != '') {
            $query = $this->db->where('id', $id);
        }
        $query = $this->db->limit(10)->get();
        if ($query->num_rows() > 0) {
            if ($id != '') {
                $row = $query->row_array();
            } else {
                $row = $query->result_array();
            }
        }



        return $row;
    }

    public function getAllStaticDgMessage() {
        $row = array();
        $id = $this->getId();

        $query = $this->db->select('*')
                ->from('ws_dgh_message');
        if ($id != '') {
            $query = $this->db->where('id', $id);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            if ($id != '') {
                $row = $query->row_array();
            } else {
                $row = $query->result_array();
            }
        }



        return $row;
    }

    public function getLastDgMessage() {
        $row = array();
        $id = $this->getId();
        //echo $this->session->userdata('pageLanguage');die;
        if ($this->session->userdata('pageLanguage') == 'en') {
            $query = $this->db->select('id,dgh_message,message');
        }elseif ($this->session->userdata('pageLanguage') == 'hin') {
            $query = $this->db->select('id,dgh_message_hindi as dgh_message,message_hindi as message');
        }
        
        $query = $this->db->from('ws_dgh_message');

        $query = $this->db->order_by('id', 'desc')->limit(1)->get();
        if ($query->num_rows() > 0) {

            $row = $query->row_array();
        }



        return $row;
    }

    public function getGroupName() {
        $query = $this->db->select('')
                ->from('acx_department')
                ->get();
        $row = $query->result_array();
        return $row;
    }

}

<?php

class user_login_model extends CI_Model {    
   
    private $_tableName = "acx_users";
    private $_id = "";
    private $_type = "";
    private $_state = "";
    private $_original_state = "";
    private $_first_name = "";
    private $_last_name = "";
    private $_email = "";
    private $_category="";
    private $_password = "";
    private $_project_id="";
    private $_group_type="";
    private $_month="";
    private $_year="";
    private $_group_id="";
    private $_user_id="";
    private $_parent_id="";
    private $_month_number="";
    
    public function get_month_number() {
        return $this->_month_number;
    }

    public function set_month_number($_month_number) {
        $this->_month_number = $_month_number;
    }
    
    public function get_parent_id() {
        return $this->_parent_id;
    }

    public function set_parent_id($_parent_id) {
        $this->_parent_id = $_parent_id;
    }
    public function get_user_id() {
        return $this->_user_id;
    }

    public function set_user_id($_user_id) {
        $this->_user_id = $_user_id;
    }
    public function get_tableName() {
        return $this->_tableName;
    }
    
    public function getMonth() {
        return $this->_month;
    }

    public function getYear() {
        return $this->_year;
    }

    public function setMonth($month) {
        $this->_month = $month;
    }

    public function setYear($year) {
        $this->_year = $year;
    }

    public function get_id() {
        return $this->_id;
    }

    public function get_type() {
        return $this->_type;
    }

    public function get_state() {
        return $this->_state;
    }

    public function get_original_state() {
        return $this->_original_state;
    }

    public function get_first_name() {
        return $this->_first_name;
    }

    public function get_last_name() {
        return $this->_last_name;
    }

    public function get_email() {
        return $this->_email;
    }
    
    public function get_category() {
        return $this->_category;
    }

    public function set_category($_category) {
        $this->_category = $_category;
    }

    
    
    public function get_password() {
        return $this->_password;
    }

    public function set_tableName($_tableName) {
        $this->_tableName = $_tableName;
    }

    public function set_id($_id) {
        $this->_id = $_id;
    }

    public function set_type($_type) {
        $this->_type = $_type;
    }

    public function set_state($_state) {
        $this->_state = $_state;
    }

    public function set_original_state($_original_state) {
        $this->_original_state = $_original_state;
    }

    public function set_first_name($_first_name) {
        $this->_first_name = $_first_name;
    }

    public function set_last_name($_last_name) {
        $this->_last_name = $_last_name;
    }

    public function set_email($_email) {
        $this->_email = $_email;
    }

    public function set_password($_password) {
        $this->_password = $_password;
    }
    
    public function getProject_id() {
        return $this->_project_id;
    }

    public function setProject_id($project_id) {
        $this->_project_id = $project_id;
    }

    public function getGroup_type() {
        return $this->_group_type;
    }

    public function setGroup_type($group_type) {
        $this->_group_type = $group_type;
    }

     public function getGroup_id() {
        return $this->_group_id;
    }

    public function setGroup_id($group_id) {
        $this->_group_id = $group_id;
    }


    public function login() {
        
        $password=  $this->get_password();
        //$password = base64_encode($this->pbkdf2($password, 'Y5ScEumY05ppXMP0uSYjPiyanNA9SiFcSHGcUubO', 1000, 40));
        $query = $this->db->select('')
                ->from('ws_admin_user_data_table')
                ->where('USERNAME', $this->get_email())
                ->where('USERPASS',$password)
                ->get();
        //echo $this->db->last_query();die;
        $row = $query->row_array();
        if($query->num_rows()>0){
            return $row;
        }else{
            return FALSE;
        }
    }

    function pbkdf2($p, $s, $c, $kl, $a = 'sha256') {
        $hl = strlen(hash($a, null, true)); # Hash length
        $kb = ceil($kl / $hl);              # Key blocks to compute
        $dk = '';                           # Derived key
        # Create key
        for ($block = 1; $block <= $kb; $block ++) {

            # Initial hash for this block
            $ib = $b = hash_hmac($a, $s . pack('N', $block), $p, true);

            # Perform block iterations
            for ($i = 1; $i < $c; $i ++)

            # XOR each iterate
                $ib ^= ($b = hash_hmac($a, $b, $p, true));

            $dk .= $ib; # Append iterated block
        }

        # Return derived key of correct length
        return substr($dk, 0, $kl);
    }
    public function getAllEmployeeList(){
        $type=array('Manager','Member');
        $query=  $this->db->select()
                ->from($this->get_tableName())
                ->where('state','3')
                ->where('original_state',NULL)
                ->where_in('type',$type)
                ->get();
        //echo $this->db->last_query();die;
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return FALSE;
        }
    }
    
    public function getFreeEmployeeList(){
       
        $email=array('anshul@techaheadcorp.com','abhinav@techaheadcorp.com','naveen@techaheadcorp.com','sitaram@techaheadcorp.com','chandrapal@techaheadcorp.com','somesh@techaheadcorp.com');
        $query=  $this->db->select()
                ->from($this->get_tableName())
                ->where('type','Member')
                ->where('group_id','0')
                ->where('group_head',NULL)
                ->where('state','3')
                ->where('original_state',NULL)
                //->where_not_in('email',$email)
                ->order_by('email')
                ->get();
        //echo $this->db->last_query();die;
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return FALSE;
        }
    }
    
    public function editFreeEmployeeList(){
        $email=array('anshul@techaheadcorp.com','abhinav@techaheadcorp.com','naveen@techaheadcorp.com','sitaram@techaheadcorp.com','chandrapal@techaheadcorp.com','somesh@techaheadcorp.com');
        if($this->get_email()!=''){
        $include=  $this->get_email();
        $query=  $this->db->select('id,email')
                ->from($this->get_tableName())
                ->where('type','Member')
                //->where_not_in('email',$email)
                ->where('group_id','0')
                ->where('group_head',NULL)
                ->where('state','3')
                ->where('original_state',NULL)
                //->where_in('email',$include)
                ->or_where('group_id',  $this->getGroup_type())
                ->order_by('email')
                ->get();
        //echo $this->db->last_query();die;
        $row=$query->result_array();
        }else{
        
        $query=  $this->db->select('id,email')
                ->from($this->get_tableName())
                ->where('type','Member')
                ->where_not_in('email',$email)
                ->where('group_id','0')
                ->where('group_head',NULL)
                ->where('state','3')
                ->where('original_state',NULL)
                //->or_where('group_id',  $this->getGroup_type())
                ->order_by('email')
                ->get();
        $row=$query->result_array();
        }
        //echo $this->db->last_query();die;
        if($query->num_rows()>0){
            return $row;
        }else{
            return FALSE;
        }
    }
    
    public function getAllEmployeeListWithRating(){
        $query=  $this->db->select('au.*,ad.department')
                ->from('acx_users as au')
                ->join('acx_department as ad','ad.id=au.group_id','left')
                ->where('type','Member')
                ->where('state','3')
                ->where('original_state',NULL)
                ->order_by('au.email')
                ->get();
        //echo $this->db->last_query();die;
        $row=$query->result_array();
        foreach ($row as $key=>$emp){
            $ratingQuery=  $this->db->select()
                                    ->from('acx_user_rating')
                                    ->where('employee_id',$emp['id'])
                                    ->where('month',  $this->getMonth())
                                    ->where('year',  $this->getYear())
                                    ->get();
           $ratingInfo=$ratingQuery->row_array();
            
            $ratingValue=  $this->db->select('parameter_id,rating')
                                    ->from('acx_user_rating_structure')
                                    ->where('rating_id',$ratingInfo['id'])
                                    ->get();
          
            $ratingAvg=  $this->db->select('AVG(rating) as avg')
                                    ->from('acx_user_rating_structure')
                                    ->where('rating_id',$ratingInfo['id'])
                                    ->get();
            
            
          $row[$key]['is_rated']=$ratingQuery->row_array();
          $row[$key]['rating_value']=$ratingValue->result_array();
          $row[$key]['rating_avg']=$ratingAvg->row_array();
        }
        //echo "<pre>";print_r($row);die;
        if(count($row)>0){
            return $row;
        }else{
            return FALSE;
        }
    }
    
    public function getGroupHeadEmployee(){
        $query=  $this->db->select('au.*,ad.department')
                ->from('acx_users as au')
                ->join('acx_department as ad','ad.id=au.group_id')
                ->where('type','Member')
                ->where('state','3')
                ->where('original_state',NULL)
                ->where('group_head',  $this->session->userdata('managerUserID'))
                ->order_by('au.email')
                ->get();
        $row=$query->result_array();
        foreach ($row as $key=>$emp){
            $ratingQuery=  $this->db->select('')
                                    ->from('acx_user_rating')
                                    ->where('employee_id',$emp['id'])
                                    ->where('month',  $this->getMonth())
                                    ->where('year',  $this->getYear())
                                    ->get();
            //echo $this->db->last_query().'<br>';
            $ratingInfo=$ratingQuery->row_array();
            
            $ratingValue=  $this->db->select('parameter_id,rating')
                                    ->from('acx_user_rating_structure')
                                    ->where('rating_id',$ratingInfo['id'])
                                    ->get();
          
            $ratingAvg=  $this->db->select('AVG(rating) as avg')
                                    ->from('acx_user_rating_structure')
                                    ->where('rating_id',$ratingInfo['id'])
                                    ->get();
            
            
          $row[$key]['is_rated']=$ratingQuery->row_array();
          $row[$key]['rating_value']=$ratingValue->result_array();
          $row[$key]['rating_avg']=$ratingAvg->row_array();
        }
        //echo "<pre>";print_r($row);die;
        if(count($row)>0){
            return $row;
        }else{
            return FALSE;
        }
    }
    
    public function getAllEmployeeListWithRatingNew(){
        $query=  $this->db->select('au.*,ad.department')
                ->from('acx_users as au')
                ->join('acx_department as ad','ad.id=au.group_id','left')
                ->where('type !=','Administrator')
                ->where('state','3')
                ->where('original_state',NULL)
                ->order_by('au.email')
                ->get();
        $row=$query->result_array();
        foreach ($row as $key=>$emp){
            $ratingQuery=  $this->db->select()
                                    ->from('acx_user_rating')
                                    ->where('employee_id',$emp['id'])
                                    ->where('month',  $this->getMonth())
                                    ->where('year',  $this->getYear())
                                    ->get();
            $ratingInfo=$ratingQuery->row_array();
            $ratingValue=  $this->db->select('parameter_id,rating')
                                    ->from('acx_user_rating_structure')
                                    ->where('rating_id',$ratingInfo['id'])
                                    ->get();
          
            $ratingAvg=  $this->db->select('AVG(rating) as avg')
                                    ->from('acx_user_rating_structure')
                                    ->where('rating_id',$ratingInfo['id'])
                                    ->get();
            
            
          $row[$key]['is_rated']=$ratingQuery->row_array();
          $row[$key]['rating_value']=$ratingValue->result_array();
          $row[$key]['rating_avg']=$ratingAvg->row_array();
            
            
           
        }

        if(count($row)>0){
            return $row;
        }else{
            return FALSE;
        }
    }
    
    public function getEmployeeList(){
        if($this->get_category()){ 
        $query=  $this->db->select()
                ->from($this->get_tableName())
                ->where('state','3')
                ->where('original_state',NULL)
                ->where('category',NULL)
                ->or_where('category',  $this->get_category())
                ->order_by('email')
                ->get();
        $row=$query->result_array();
        }else{
        $query=  $this->db->select()
                ->from($this->get_tableName())
                ->where('category',NULL)
                ->where('state','3')
                ->where('original_state',NULL)
                ->order_by('email')
                ->get();
        //echo $this->db->last_query();die;
        $row=$query->result_array();
        }
        if($query->num_rows()>0){
            return $row;
        }else{
            return FALSE;
        }
    }
    
    public function getEmployeeName(){
        $query=  $this->db->select('au.email as Name,au.id,CONCAT(first_name," ",last_name) as fullName',FALSE)
                ->from('acx_users as au')
                ->where('au.id',  $this->get_id())
                ->get();
        //echo $this->db->last_query();
        if($query->num_rows()>0){
            return $query->row_array();
        }else{
            return FALSE;
        }
    }
    
    public function getEmployeeNameByRatingId(){
        $query=  $this->db->select('au.email as Name,au.id,CONCAT(first_name," ",last_name) as fullName,group_head',FALSE)
                ->from('acx_user_rating as aur')
                ->join('acx_users as au','au.id=aur.employee_id')
                ->where('aur.id',  $this->get_id())
                ->get();
        //echo $this->db->last_query();
        if($query->num_rows()>0){
            return $query->row_array();
        }else{
            return FALSE;
        }
    }
    
    public function setEmployeeCategory(){
        $employe=  $this->get_id();
        //echo $this->get_state();
        $this->db->set('category','')->where('id',  $this->get_state())->update($this->get_tableName());
        //echo $this->db->last_query();die;
        foreach ($employe as $emp){
            $type=  $this->get_category();
            
            if($type==1)
            {
                $typeName='Administrator';
            }elseif($type==2){
                $typeName='Manager';
            }
            //echo $typeName;die;
            $this->db->set('category',  $this->get_category())->set('type',$typeName)->set('group_head',NULL)->set('group_id','0')->where('id',$emp)->update($this->get_tableName());
            
        }
    }
    
    public function getEmployeeCategory(){
        $category=  $this->get_category();
        if($category!=''){
        $query=  $this->db->select()
                ->from($this->get_tableName())
                ->where('id',$category)
                ->where('type !=','Member')
                ->get();
        $row=$query->row_array();
        }else{
            $query=  $this->db->select()
                ->from($this->get_tableName())
                ->where('category !=','')
                ->where('type !=','Member')
                ->get();
            $row=$query->result_array();
        }
        if($query->num_rows()>0){
            return $row;
        }else{
            return FALSE;
        }
    }
    
    public function getGroupHead(){
        $category=  $this->get_category();
        $query=  $this->db->select()
                ->from($this->get_tableName())
                ->where('category',$category)
                ->get();
        $row=$query->result_array();
        if($query->num_rows()>0){
            return $row;
        }else{
            return FALSE;
        }
    }
    
    public function getAllEmployeeLogHours(){
        $row=array();
        $type=array('Member','Manager');
        $employeeQuery=  $this->db->select('a1.*, if(b1.department IS NULL,getManagerDept(a1.id),b1.department) as department',false)
                                  ->from('acx_users as a1')
                                  ->join('acx_department as b1', 'a1.group_id=b1.id','left')
                                  ->where('state','3')
                                  ->where('original_state',NULL)
                                  ->where_in('type', $type)
                                  ->order_by('email')
                                  ->get();
        if($employeeQuery->num_rows()>0){
            $row=$employeeQuery->result_array();
        }
        //echo $this->getMonth();
        foreach ($row as $key=>$value){
        $query=  $this->db->select('SUM(value) as hours')
                          ->from('acx_time_records')
                          ->where('YEAR(record_date)',  $this->getYear())
                          ->where('MONTH(record_date)',  $this->getMonth())
                          ->where('user_id',$value['id'])
                          ->group_by('user_id')
                          ->get();
        //echo $this->db->last_query()."<br>";die;
        $row[$key]['hour_spent']=$query->row_array();
        }
        //echo "<pre>";print_r($row);die;
        if(count($row)>0){
            return $row;
        }else{
            return FALSE;
        }
    }
    
    public function getProjectDetails(){
        
        $projectQuery=  $this->db->select()
                                 ->from('acx_projects')
                                  ->where('state','3')
                                  ->where('original_state',NULL)
                                 ->get();
        if($projectQuery->num_rows()>0){
            $row=$projectQuery->result_array();
        }
        //echo "<pre>";print_r($row);
        foreach ($row as $key=>$value){
        $query=  $this->db->select('sum(value) as TotalTime')
                          ->from('acx_project_objects as apo')
                          ->join('acx_time_records as atr','apo.id=atr.parent_id')
                          ->where('apo.project_id',$value['id'])
                          ->get();
        //echo $this->db->last_query().'<br>';
        $query1=  $this->db->select('(ios+php+android+qa+design+net) as TotalTime')
                          ->from('acx_project_duration')
                          //->join('acx_estimates as atr','apo.id=atr.parent_id')
                          ->where('project_id',$value['id'])
                          ->get();
        //echo $this->db->last_query().'<br>';
        $row[$key]['hours_spent']=$query->row_array();
        $row[$key]['hours_allocated']=$query1->row_array();
        }
        //echo "<pre>";print_r($row);die;
        if(count($row)>0){
            return $row;
        }else{
            return FALSE;
        }
    }
//    
    public function getProjectDescription(){
        
       $row=array();
       $group_id = $this->getGroup_type();
       $project_id = $this->getProject_id();
       $sql = "SELECT sum(value) as totalTime, `aco`.`project_id`, `au`.`group_id`, "
               . "(SELECT SUM(value) as total FROM `acx_time_records` WHERE  `parent_id` = $project_id and `parent_type` = 'Project') as actual_hour_spend_project,"
               . "(SELECT SUM(atr.value) as total_time FROM `acx_time_records` as `atr`,`acx_project_objects` as `apo` WHERE `atr`.`parent_type` = 'Task' and `atr`.`id` = `apo`.`id` and `apo`.`project_id` = $project_id) as actual_hour_spend_project_task "
               . "FROM (`acx_project_objects` as aco) JOIN `acx_time_records` as atr ON `atr`.`parent_id`=`aco`.`id` "
               . "JOIN `acx_users` as au ON `au`.`id`=`atr`.`user_id` "
               . "WHERE `aco`.`project_id` = $project_id AND `au`.`group_id` = $group_id";
       
       $query = $this->db->query($sql);
//        $query=  $this->db->select('sum(value) as totalTime,aco.project_id,au.group_id')
//                          ->from('acx_project_objects as aco')
//                          ->join('acx_time_records as atr','atr.parent_id=aco.id')
//                          ->join('acx_users as au','au.id=atr.user_id')
//                          ->where('aco.project_id',  $this->getProject_id())
//                          ->where('au.group_id',  $this->getGroup_type())
//                          ->get();
         //echo $this->db->last_query()."<br>";die;
        $query1=  $this->db->select('*')
                          ->from('acx_project_duration')
                          ->where('project_id',  $this->getProject_id())
                          ->get();
     //   echo $this->db->last_query();die;
       
        $row=$query->row_array();
        $row['time_allocated']=$query1->row_array();
        
        
        //echo "<pre>";print_r($row);die;
        return $row;
        
    }
    
    public function getIndividualEmployee(){
        $row=array();
        $query=  $this->db->select('sum(value) as time,atr.created_by_email as email,aco.project_id')
                          ->from('acx_project_objects as aco')
                          ->join('acx_time_records as atr','atr.parent_id=aco.id')
                          ->join('acx_users as au','au.id=atr.user_id')
                          ->where('aco.project_id',  $this->getProject_id())
                          ->where('au.group_id',  $this->getGroup_type())
                          
                          ->group_by('atr.created_by_email')
                          ->get();
        //echo $this->db->last_query()."<br>";die;
        $query1=  $this->db->select('sum(value) as estTime')
                          ->from('acx_project_objects as aco')
                          ->join('acx_estimates as atr','atr.parent_id=aco.id')
                          ->join('acx_users as au','au.id=atr.created_by_id')
                          ->where('aco.project_id',  $this->getProject_id())
                          ->where('au.group_id',  $this->getGroup_type())
                          ->group_by('atr.created_by_email')
                          ->get();
        //echo $this->db->last_query()."<br>";
        if($query->num_rows()>0){
        $row1=$query->result_array();
        }else{
            $row1=array();
        }if($query1->num_rows()>0){
        $row2=$query1->result_array();
        }else{
            $row2=array();
        }
        $row=  $row1;
        //echo "<pre>";print_r($row);die;
        return $row;
    }
    
    public function getUserDetails(){
        $query=  $this->db->select('*')
                ->from($this->get_tableName())
                ->where('id',  $this->get_id())
                ->get();
        if($query->num_rows()>0){
            return $query->row_array();
        }else{
            return FALSE;
        }
    }
    
    public function getProjectName(){
        $query=  $this->db->select('id,slug')
                ->from('acx_projects')
                ->where('id',  $this->getProject_id())
                ->where('state','3')
                ->where('original_state',NULL)
                ->get();
        if($query->num_rows()>0){
            return $query->row_array();
        }
    }
    
    public function get_project_estimation_time_by_department(){
        $query = $this->db->select('*')
                          ->from('acx_project_duration')
                          ->where('project_id',$this->getProject_id())
                          ->get();
        if($query->num_rows()>0){
            return $query->row_array();
        }
    }

        public function saveUserDetails(){
        $data['first_name']=  $this->get_first_name();
        $data['last_name']=  $this->get_last_name();
        $data['email']=  $this->get_email();
        $this->db->set($data)->where('id',  $this->get_id())->update($this->get_tableName());
        return TRUE;
    }
    
    public function deleteUser(){
        $this->db->set('state','0')->set('original_state','1')->where('id',  $this->get_id())->update('acx_users');
        return TRUE;
    }
    
    public function getGroupName(){
         $query=  $this->db->select('department')
                ->from('acx_department')
                ->where('id',  $this->getGroup_type())
                ->get();
        if($query->num_rows()>0){
            return $query->row_array();
        }
    }
    
    public function getManagertList(){
        $query=  $this->db->select('au.*,ad.department')
                ->from('acx_users as au')
                ->join('acx_groups as ag','ag.group_head=au.id')
                ->join('acx_department as ad','ad.id=ag.group_name')
                ->where('type','Manager')
                ->where('state','3')
                ->where('original_state',NULL)
                ->order_by('email')
                ->get();
        $row=$query->result_array();
        foreach ($row as $key=>$rating){
                        
            $ratingQuery=  $this->db->select()
                                    ->from('acx_user_rating')
                                    ->where('employee_id',$rating['id'])
                                    ->where('month',  $this->getMonth())
                                    ->where('year',  $this->getYear())
                                    ->get();
            $ratingInfo=$ratingQuery->row_array();
            $ratingValue=  $this->db->select('parameter_id,rating')
                                    ->from('acx_user_rating_structure')
                                    ->where('rating_id',$ratingInfo['id'])
                                    ->get();
          
            $ratingAvg=  $this->db->select('AVG(rating) as avg')
                                    ->from('acx_user_rating_structure')
                                    ->where('rating_id',$ratingInfo['id'])
                                    ->get();
            
            
          $row[$key]['is_rated']=$ratingQuery->row_array();
          $row[$key]['rating_value']=$ratingValue->result_array();
          $row[$key]['rating_avg']=$ratingAvg->row_array();
        }
        //echo "<pre>";print_r($row);die;
        if(count($row)>1){
            return $row;
        }else{
            return FALSE;
        }
    }
    
    public function chkAddHours(){
        $query=  $this->db->select('*')
                ->from('acx_project_duration')
                ->where('project_id',  $this->getProject_id())
                ->get();
        if($query->num_rows()>0){
            return $query->row_array();
        }else{
            return FALSE;
        }
    }
    
    public function getEmployeeListWithRatingParameter(){
        $query=  $this->db->select()
                ->from('acx_users as au')
                ->where('type !=','Administrator')
                ->where('state','3')
                ->order_by('email')
                ->get();
        $row=$query->result_array();
        if($query->num_rows()>0){
            return $row;
        }else{
            return FALSE;
        }
    }
    
    public function chkHRRating(){
        $query=  $this->db->select('*')
                ->from('acx_user_rating')
                ->where('month',  $this->getMonth())
                ->where('year',  $this->getYear())
                ->where('hr_rating_status','1')
                ->limit(1)
                ->get();
        //echo $this->db->last_query();die;
        if($query->num_rows()>0){
            return $query->row_array();
        }else{
            return FALSE;
        }
    }
    public function deletePosition(){
        $this->db->set('type','Member')->where('id',  $this->get_id())->update($this->get_tableName());
        return TRUE;
    }
    
    public function getManagerName(){
        $query=  $this->db->select()
                ->from('acx_users')
                ->where('id',  $this->get_id())
                ->get();
        if($query->num_rows()>0){
            return $query->row_array();
        }else{
            return FALSE;
        }
    }
    
    public function getAllDepartmentEmployee(){
        $query=  $this->db->select('id')
                ->from('acx_users')
                ->where('group_id','6')
                ->get();
        
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return FALSE;
        }
    }
    
    public function getAllEmployeesFeedback(){
        $query=  $this->db->select('au.*,if(ad.department!="",ad.department,ad2.department) as department,ag.group_name',FALSE)
                ->from('acx_users as au')
                ->join('acx_department as ad','ad.id=au.group_id','left')
                ->join('acx_groups as ag','ag.group_head=au.id','left')
                ->join('acx_department as ad2','ag.group_name=ad2.id','left')
                ->where('type !=','Administrator')
                ->where('state','3')
                ->where('original_state',NULL)
                ->where('au.id !=',  $this->get_id())
                ->order_by('au.email')
                ->get();
        //echo $this->db->last_query();die;
        $row=$query->result_array();
        
        //echo "<pre>";print_r($row);die;
        if(count($row)>0){
            return $row;
        }else{
            return FALSE;
        }
    }
    
    public function getAllMemberList(){
        if($this->get_id() != ''){
            $id = $this->get_id();
        }else{
            $id = array("0");
        }
        $type = array("Member","Manager");
        $query = $this->db->select("id,first_name,email")
                          ->from($this->get_tableName())
                          ->where_in("type",$type)
                          ->where("state","3")
                          ->where("original_state",NULL)
                          ->where_not_in("id",  $id)
                          ->get();
        //echo $this->db->last_query();die;
        if($query->num_rows()>0){
            $row = $query->result_array();
            return $row;
        }else{
            return FALSE;
        }
    }
    
    public function getAllMemberTask(){
        $date=date('Y-m-d');
        $queryDayOffs = $this->db->select("event_date")
                             ->from("acx_day_offs")
                             ->get();
        $rowDayOffs = $queryDayOffs->result_array();
        foreach($rowDayOffs as $r){
            if($r['event_date'] == $date){
                $a=1;
            }
        }
        if($a != 1){
        if(strtotime(date('H:i:s')) <= strtotime(date('H:i:s',strtotime('10:00:00')))){
        $query = $this->db->select("atr.user_id as id,atr.created_on,DATE_ADD(atr.created_on,INTERVAL '+5:5' HOUR_MINUTE) as userTime,EXTRACT(HOUR from DATE_ADD(atr.created_on,INTERVAL '+5:5' HOUR_MINUTE)) as yourTime",false)
                          ->from("acx_time_records as atr")
                          ->where("DATE(atr.created_on) >=",$date)
                          ->where("record_date",$date)
                          ->where("EXTRACT(HOUR from DATE_ADD(atr.created_on,INTERVAL '+5:5' HOUR_MINUTE)) <=","19")
                          //->join("acx_users as au",'au.id != atr.user_id','left')
                          ->group_by("atr.user_id")                          
                          ->get();
        }else{
            if((strtotime(date('H:i:s')) <= strtotime(date('H:i:s',strtotime('11:00:00')))) && (strtotime(date('H:i:s')) >= strtotime(date('H:i:s',strtotime('10:00:00'))))){
                $query = $this->db->select("atr.user_id as id,atr.created_on,DATE_ADD(atr.created_on,INTERVAL '+7:5' HOUR_MINUTE) as userTime,EXTRACT(HOUR from DATE_ADD(atr.created_on,INTERVAL '+7:5' HOUR_MINUTE)) as yourTime",false)
                          ->from("acx_time_records as atr")
                          ->where("DATE(atr.created_on) >=",$date)
                          ->where("record_date",$date)
                          ->where("EXTRACT(HOUR from DATE_ADD(atr.created_on,INTERVAL '+7:5' HOUR_MINUTE)) <=","21")
                          //->join("acx_users as au",'au.id != atr.user_id','left')
                          ->group_by("atr.user_id")                          
                          ->get();
            }
        }
        }
        //echo $this->db->last_query();die;
        if($query->num_rows()>0){
            $row = $query->result_array();
            return $row;
        }else{
            return FALSE;
        }
    }
    
    public function getLastEntryResource(){
        
        $query = $this->db->select("MAX(atr.id) as ID,MAX(atr.record_date) as recordDate,atr.user_id,au.first_name,au.last_name,if(ad.department IS NULL,ad2.department,ad.department) as dept,au2.first_name as leadFirstName,au2.last_name as leadLastName",false)
                          ->from("acx_time_records as atr")
                          ->join("acx_users as au","au.id=atr.user_id",'left')
                          ->join("acx_department as ad","ad.id=au.group_id",'left')
                          ->join("acx_users as au2","au2.id=au.group_head",'left')
                          ->join("acx_groups as ag","ag.group_head=au.id",'left')
                          ->join("acx_department as ad2","ad2.id=ag.group_name",'left')
                          ->where("atr.user_id", $this->get_user_id())
                          ->where("au.state","3")
                          ->where("au.original_state",NULL)
                          ->group_by("atr.user_id")
                          ->get();
        //echo $this->db->last_query();die;
        if($query->num_rows()>0){
            $row = $query->row_array();
            return $row;
        }else{
            $queryUsers = $this->db->select("au.first_name,au.last_name,if(ad.department IS NULL,getManagerDept(au.id),ad.department) as dept",false)
                                   ->from("acx_users as au")
                                   ->join("acx_department as ad",'ad.id=au.group_id','left')
                                   ->where("au.id", $this->get_user_id())
                                   ->where("au.state","3")
                                   ->where("au.original_state",NULL)
                                   ->get();
            $rowUsers = $queryUsers->row_array();
            return $rowUsers;
        }
        
    }
 
    
//    public function idealTime(){
//        
//        $query=$this->db->query("SELECT acx_project_objects.id, acx_time_records.parent_id
//FROM acx_project_objects JOIN acx_time_records
//ON acx_project_objects.id=acx_time_records.id ");
//        
//         $row = $query->result_array();
//         echo'<pre>';print_r($row);
//         
//         ;die;
//        
//    }
    
//    public function getDailyIdealProjectActivity(){
//        $date=date('Y-m-d');
//        $query = $this->db->select("atr.user_id,au.email")
//                          ->from("acx_time_records as atr")
//                          ->join("acx_users as au","au.id=atr.user_id",'left')
//                          ->where("atr.parent_id","128")
//                          ->where("atr.created_on",$date)
//                          ->get();
//        
//        
//    }

    public function getAllLeads(){
        $query = $this->db->select("au.email,au.first_name")
                          ->from("acx_groups as ag")
                          ->join("acx_users as au","au.id=ag.group_head",'left')
                          ->where("au.state","3")
                          ->where("au.original_state",NULL)
                          ->get();
        //echo $this->db->last_query();die;
        $row= $query->result_array();
        return $row;
                          
    }
    
    public function getAllResources(){
        $mem = array("Member","Manager");
        $query = $this->db->select("au.id,au.first_name,au.last_name")
                          ->from("acx_users as au")
                          ->where("au.state","3")
                          ->where("au.original_state",NULL)
                          ->where_in("au.type",$mem)
                          ->get();
        //echo $this->db->last_query();die;
        $row = $query->result_array();
        foreach($row as $key=>$value){
            
            $queryProj = "select slug, sum(totalProjTime) as ProjTime, id from (   SELECT distinct
    (ap.slug),
    ap.id,
    getTotalWorkProject(atr.user_id, ap.id) as totalProjTime
FROM
    (acx_time_records as atr)
        LEFT JOIN
    acx_projects as ap ON ap.id = atr.parent_id
WHERE
    atr.user_id = ".$value['id']." AND atr.state = '3' AND atr.parent_type = 'Project' AND atr.original_state IS NULL AND MONTH(atr.record_date) = '09'

UNION

SELECT distinct
    (ap.slug),
    apo.project_id,
    getTotalWorkTask(atr.user_id, apo.project_id) as totalTaskTime
FROM
    (acx_time_records as atr)
        LEFT JOIN
    acx_project_objects as apo ON apo.id = atr.parent_id
        LEFT JOIN
    acx_projects as ap ON ap.id = apo.project_id
WHERE
    atr.user_id = ".$value['id']." AND atr.state = '3' AND atr.original_state IS NULL AND atr.parent_type = 'Task' AND MONTH(atr.record_date) = '09'
) as record group by id
";
            $queryRes = $this->db->query($queryProj);
            $rowTasks = $queryRes->result_array();
//            $queryProject = $this->db->select("distinct(ap.slug),ap.id,getTotalWorkProject(atr.user_id,ap.id) as totalProjTime",false)
//                                     ->from("acx_time_records as atr")
//                                     ->join("acx_projects as ap",'ap.id=atr.parent_id','left')
//                                     ->where("atr.user_id",$value['id'])
//                                     ->where("atr.state","3")
//                                     ->where("atr.parent_type","Project")
//                                     ->where("atr.original_state",NULL)
//                                     ->where('MONTH(atr.record_date)',"09")
//                                     ->where("atr.parent_id !=","128")
//                                     ->get();
//            //echo $this->db->last_query();die;
//            $rowProject = $queryProject->result_array();
//
//            
//            $queryTask = $this->db->select("distinct(ap.slug),apo.project_id,getTotalWorkTask(atr.user_id,apo.project_id) as totalTaskTime",false)
//                                  ->from("acx_time_records as atr")
//                                  ->join("acx_project_objects as apo",'apo.id=atr.parent_id','left')
//                                  ->join("acx_projects as ap",'ap.id=apo.project_id','left')
//                                  ->where("atr.user_id",$value['id'])
//                                  ->where("atr.state","3")
//                                  ->where("atr.original_state",NULL)
//                                  ->where("atr.parent_type","Task")
//                                  ->where('MONTH(atr.record_date)',"09")
//                                  ->get();
//            //echo $this->db->last_query();die;
//            $rowTask = $queryTask->result_array();
            
            //$totalTask = array_merge($rowProject,$rowTask);
            $row[$key]['totalEff'] = $rowTasks;
            
                                 
        }
        //echo "<pre>";print_r($row);die;
        if(count($row)>0){
            return $row;
        }else{
            return FALSE;
        }
    }
    
    public function getMonthDayOff(){
        $date=  date('Y-m-d');
       $queryDayOffs = $this->db->select("count(event_date) as dayOff")
                             ->from("acx_day_offs")
                             ->where("MONTH(event_date)",  $this->get_month_number())
                             ->where("DAYNAME(event_date) !=","Saturday")
                             ->where("DAYNAME(event_date) !=","Sunday")
                             ->where('event_date <=',$date)
                             ->get();
      // echo $this->db->last_query();die;
       
           $rowDayOffs = $queryDayOffs->row_array();
           return $rowDayOffs;
       
       
        
    }
    
    public function getAllEmployeeListForReport(){
        $type=array('Manager','Member');
        $query=  $this->db->select("id")
                ->from($this->get_tableName())
                ->where('state','3')
                ->where('original_state',NULL)
                ->where_in('type',$type)
                ->get();
        //echo $this->db->last_query();die;
        if($query->num_rows()>0){
            $row = $query->result_array();
            
            return $row;
        }else{
            return FALSE;
        }
    }
    
    public function getTaskReportWeekly(){
        
        $weeklyRep = "SELECT 
    atr.parent_type,
    atr.value,
    atr.parent_id,
    au.first_name,
    au.last_name,
    if(atr.parent_type = 'Task',
        getProjectNameUsingTask(atr.parent_id),
        getProjectNameUsingProject(atr.parent_id)) as projName
FROM
    (acx_time_records as atr)
        LEFT JOIN
    acx_users as au ON au.id = atr.user_id
WHERE
    atr.user_id = '".$this->get_user_id()."' AND atr.created_on >= DATE_SUB(NOW(), INTERVAL 1 WEEK) AND atr.created_on < NOW()";
        $query = $this->db->query($weeklyRep);
        //echo $this->db->last_query();die;
        $row = $query->result_array();
        return $row;
    }
	
	public function savePage(){
		die("dkjhjjh");
	}
    
    

}

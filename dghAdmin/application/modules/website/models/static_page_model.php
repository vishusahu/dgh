<?php

class static_page_model extends CI_Model {

    private $_name = "";
    private $_data = "";
    private $_password = "";

    function getPassword() {
        return $this->_password;
    }

    function setPassword($password) {
        $this->_password = $password;
    }

    function getName() {
        return $this->_name;
    }

    function setName($name) {
        $this->_name = $name;
    }

    function getData() {
        return $this->_data;
    }

    function setData($data) {
        $this->_data = $data;
    }

    function registration() {
        $postData = $this->getData();
        $password = uniqid();
        $data['first_name'] = $postData['first_name'];
        $data['last_name'] = $postData['last_name'];
        $data['email'] = $postData['email'];
        $data['address'] = $postData['address'];
        $data['country'] = $postData['country'];
        $data['company'] = $postData['company'];
        $data['phone'] = $postData['phone'];
        $data['mobile'] = $postData['mobile'];
        $data['organization'] = $postData['organization'];
        $data['domain'] = $postData['domain'];
        $data['others'] = $postData['others'];
        $data['password'] = md5($password);
        if ($postData['email'] != '') {
            $query = $this->db->select('')
                    ->from('users')
                    ->where('email', $postData['email'])
                    ->get();
            if ($query->num_rows() > 0) {
                redirect(base_url());
            }
        }
        $this->db->set($data)->insert('users');
        $this->setPassword($password);
    }

    function login($username, $password) {

        $query = $this->db->select()
                ->from('users')
                ->where('email', $username)
                ->where('password', md5($password))
                ->get();
        //echo $this->db->last_query();die;
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return FALSE;
        }
    }

    function getPageContent($catId, $pageId) {
        if ($this->session->userdata('pageLanguage') == 'en') {
            $query = $this->db->select('page,content')
                    ->from('ws_static_pages')
                    ->where('id', $pageId)
                    ->get();
        } elseif ($this->session->userdata('pageLanguage') == 'hin') {
            $query = $this->db->select('page_hindi as page,content_hindi as content')
                    ->from('ws_static_pages')
                    ->where('id', $pageId)
                    ->get();
        } else {
            $query = $this->db->select('page,content')
                    ->from('ws_static_pages')
                    ->where('id', $pageId)
                    ->get();
        }
        return $query->row_array();
    }

    function getAllStaticPages() {

        $query = $this->db->select()
                        ->from('ws_category')->get();
        $category = $query->result_array();
        foreach ($category as $key => $cat) {
            if ($this->session->userdata('pageLanguage') == 'en') {
                $querySubCat = $this->db->select('page,content,id,category')
                        ->where('category', $cat['id'])
                        ->from('ws_static_pages')
                        ->get();
                //$row[$key]['category']=$cat['category'];
                $row[$cat['category']]['pages'] = $querySubCat->result_array();
            } else if ($this->session->userdata('pageLanguage') == 'hin') {
                $querySubCat = $this->db->select('page_hindi as page,content_hindi as content,id,category')
                        ->where('category', $cat['id'])
                        ->from('ws_static_pages')
                        ->get();
                //$row[$key]['category']=$cat['category'];
                $row[$cat['category']]['pages'] = $querySubCat->result_array();
            } else {
                $querySubCat = $this->db->select('page,content,id,category')
                        ->where('category', $cat['id'])
                        ->from('ws_static_pages')
                        ->get();
                //$row[$key]['category']=$cat['category'];
                $row[$cat['category']]['pages'] = $querySubCat->result_array();
            }
        }
        //echo "<pre>";print_r($row);die;
        return $row;
    }

    function getExploration() {

        $query = $this->db->select()
                        ->from('psc_discoveries_data_table')->order_by('DISCOVERY_DATE', 'desc')->get();
        $category = $query->result_array();
        //echo "<pre>";print_r($row);die;
        return $category;
    }

    function getCompanies() {

        $query = $this->db->select()
                        ->from('ws_company_master_data_table')->get();
        $category = $query->result_array();
        //echo "<pre>";print_r($row);die;
        return $category;
    }

    function getConsortium() {

        $query = $this->db->select()
                        ->from('ws_cons_master_data_table')->get();
        $category = $query->result_array();
        //echo "<pre>";print_r($row);die;
        return $category;
    }

    function getDiscovery() {

        $query = $this->db->select()
                        ->from('psc_discoveries_data_table')->get();
        $category = $query->result_array();
        //echo "<pre>";print_r($row);die;
        return $category;
    }

    function getCountry() {

        $query = $this->db->select()
                        ->from('WS_COUNTRY_DATA_TABLE')->get();
        $category = $query->result_array();
        //echo "<pre>";print_r($row);die;
        return $category;
    }


    public function getStaticPages() {

        $page = $this->getName();
        if ($page == 'Summary') {
            $query = $this->db->query("SELECT 
    COUNT(RM.ROUND_ID)
as BLOCKSCOUNT FROM
    WS_BLOCK_MASTER BL
        JOIN
    ws_status_master_data_table SM ON BL.STATUS_ID = SM.STATUS_ID
        JOIN
    ws_round_master_data_table RM ON BL.ROUND_ID = RM.ROUND_ID
WHERE
    BL.ROUND_ID IN (10 , 11,
        12,
        13,
        14,
        15,
        16,
        17,
        20,
        43,
        19,
        - 99)
        AND BL.STATUS_ID IN ('22' , '24', '25', '125', '127')");
            $row['BLOCKSCOUNT'] = $query->row_array();

            $query1 = $this->db->query("SELECT 
    count(ROUND_ID)
as PRODUCTIONFIELDS FROM
    PSC_FIELDMASTER");
            $row['PRODUCTIONFIELDS'] = $query1->row_array();

            $query2 = $this->db->query("SELECT COUNT(ROUND) as DISCOVERIES
FROM psc_discoveries_data_table");
            $row['DISCOVERIES'] = $query2->row_array();
            
            $query2 = $this->db->query("SELECT COUNT(ROUND) as CBMCOUNT
FROM psc_cbm_data_table");
            $row['CBMCOUNT'] = $query2->row_array();
            
            //echo "<pre>";print_r($row);die;
            return $row;
        }
        if ($page == 'PSC Blocks') {

            $query = $this->db->query("SELECT 
    ws.STATUS STATUS, COUNT(*) COUNT
FROM
    ws_block_master wb
        INNER JOIN
    ws_status_master_data_table ws ON ws.STATUS_ID = wb.STATUS_ID
GROUP BY ws.STATUS_ID , ws.STATUS");
            $row = $query->result_array();
            $queryOperational=  $this->db->query("select 
    count(*)
as operational from
    WS_BLOCK_MASTER
where
    STATUS_ID = 22;");
            $row['operational'] = $queryOperational->row_array();
            
            $queryFields=  $this->db->query("select 
    COUNT(*) as fields
from
    WS_BLOCK_MASTER
where
    FIELD_STATUS = 'FULL'
        OR FIELD_STATUS = 'PARTIAL'");
            $row['fields'] = $queryFields->row_array();
            
            $queryFieldsCon=  $this->db->query("select 
    count(*)
as fieldConverted from
    WS_BLOCK_MASTER
where
    ROUND_ID = 19 and STATUS_ID = 22");
            $row['fieldConverted'] = $queryFieldsCon->row_array();
            
            //echo "<pre>";print_r($row);die;
            return $row;
            
        }
        if ($page == 'PSC Fields') {

            $query = $this->db->query("SELECT 
    if(WR.ROUND_NAME !='',WR.ROUND_NAME,' ') ROUND, count(*) NUM
FROM
    PSC_FIELDMASTER PF
        LEFT JOIN
    ws_round_master_data_table WR ON WR.ROUND_ID = PF.ROUND_ID
GROUP BY WR.ROUND_NAME
ORDER BY WR.ROUND_NAME");
            //echo $this->db->last_query();die;
            $row = $query->result_array();
            return $row;
        }
        if ($page == 'Discoviries') {

            $query = $this->db->query("SELECT 
    ROUND, COUNT(ROUND) NUM
FROM
    psc_discoveries_data_table
GROUP BY ROUND
ORDER BY ROUND");
            //echo $this->db->last_query();die;
            $row = $query->result_array();
            return $row;
        }
        if ($page == 'Discoviries') {

            $query = $this->db->query("SELECT 
    FIELD_BLOCK,
    (PROD_YEAR) PROD_YEAR,
    SUM(OIL_MT) OIL_MT,
    SUM(COND_MT) COND_MT,
    SUM(A_GAS_M3) A_GAS_M3,
    SUM(NA_GAS_M3) NA_GAS_M3,
    PSC_PRODUCTIONMASTER.FIELD_TYPE AS FIELD_TYPE
FROM
    psc_productionall_data_table
        INNER JOIN
    psc_productionmaster_data_table ON PSC_PRODUCTIONALL.FIELD_BLOCK = PSC_PRODUCTIONMASTER.NAME
        JOIN
    YEAR_MAPPING ON PSC_PRODUCTIONALL.PROD_YEAR = YEAR_MAPPING.YEAR_SHORT
WHERE
    FIELD_TYPE IN ('CBM' , 'PRE-NELP DISCOVERED FIELD BIDDING',
        'PSC BLOCK')
GROUP BY PSC_PRODUCTIONMASTER.FIELD_TYPE , FIELD_BLOCK , TO_CHAR(PROD_YEAR) , YEAR_MAPPING.YEAR_LONG
ORDER BY FIELD_BLOCK , YEAR_MAPPING.YEAR_LONG DESC");
            //echo $this->db->last_query();die;
            $row = $query->result_array();
            return $row;
        }
	if($page == 'CBM Blocks'){
		$query = $this->db->query("SELECT STATUS_DESC, STATUS,
			sum(case when ROUND ='I' then cnt else 0 end) ROUNDONE,
			sum(case when ROUND ='II' then cnt else 0 end) ROUNDTWO,
			sum(case when ROUND ='III' then cnt else 0 end) ROUNDTHREE,
			sum(case when ROUND ='IV' then cnt else 0 end) ROUNDFOUR,
			sum(case when ROUND ='Nomination' then cnt else 0 end) Nomination
			from (SELECT SM.STATUS STATUS_DESC,ROUND,CM.STATUS_ID STATUS,COUNT(ROUND) cnt
			FROM psc_cbm_data_table CM JOIN ws_status_master_data_table SM ON CM.STATUS_ID=SM.STATUS_ID
			group by ROUND,CM.STATUS_ID,SM.STATUS
			ORDER BY ROUND) as T1
			group by STATUS,STATUS_DESC order by STATUS");
		//echo $this->db->last_query();die;
		return $query->result_array();
		
	}
	if($page == 'Production') {
		$query = $this->db->query("SELECT FIELD_BLOCK,
			PROD_YEAR,
			SUM(OIL_MT) OIL_MT,
			SUM(COND_MT) COND_MT,
			SUM(A_GAS_M3) A_GAS_M3,
			SUM(NA_GAS_M3) NA_GAS_M3,
			psc_productionmaster_data_table.FIELD_TYPE AS FIELD_TYPE
			FROM psc_productionall_data_table
			INNER JOIN psc_productionmaster_data_table ON psc_productionall_data_table.FIELD_BLOCK = psc_productionmaster_data_table.NAME
			JOIN YEAR_MAPPING ON psc_productionall_data_table.PROD_YEAR = YEAR_MAPPING.YEAR_SHORT
			WHERE FIELD_TYPE IN ('CBM', 'PRE-NELP DISCOVERED FIELD BIDDING', 'PSC BLOCK')
			GROUP BY psc_productionmaster_data_table.FIELD_TYPE, FIELD_BLOCK, PROD_YEAR, YEAR_MAPPING.YEAR_LONG ORDER BY FIELD_BLOCK, YEAR_MAPPING.YEAR_LONG DESC");
		//echo $this->db->last_query(); die;
		return $query->result_array();
	}
	
	if($page == "Shale Oil/Gas") {
		$query = $this->db->query("SELECT COMP STATUS,COUNT(*) COUNT from psc_shalegas_data_table group by COMP");
		//echo $this->db->last_query(); die;
		return $query->result_array();
	}
    }

    public function getAllGallery($id) {

        $query = $this->db->select()
                ->from('ws_gallery');
        if($id!=''){
        $query = $this->db->where('category_id',$id);
        }
        $query = $this->db->order_by('created_on', 'desc')
                ->get();
        return $query->result_array();
    }

    public function glossaryModel($pagename) {

        
        if ($this->session->userdata('pageLanguage') == 'en') {
            $querySubCat = $this->db->select('page,content,id,category')
                    ->where('id', $pagename)
                    ->from('ws_static_pages')
                    ->get();
            $row = $querySubCat->row_array();
        } else if ($this->session->userdata('pageLanguage') == 'hin') {
            $querySubCat = $this->db->select('page_hindi as page,content_hindi as content,id,category')
                    ->where('id', $pagename)
                    ->from('ws_static_pages')
                    ->get();
            $row = $querySubCat->row_array();
        } else {
            $querySubCat = $this->db->select('page,content,id,category')
                    ->where('id', $pagename)
                    ->from('ws_static_pages')
                    ->get();
            $row = $querySubCat->row_array();
        }
        
        return $row;
    }
    
    function aboutUs($pageId) {
        if ($this->session->userdata('pageLanguage') == 'en') {
            $query = $this->db->select('page,content')
                    ->from('ws_static_pages')
                    ->where('id', $pageId)
                    ->get();
        } elseif ($this->session->userdata('pageLanguage') == 'hin') {
            $query = $this->db->select('page_hindi as page,content_hindi as content')
                    ->from('ws_static_pages')
                    ->where('id', $pageId)
                    ->get();
        } else {
            $query = $this->db->select('page,content')
                    ->from('ws_static_pages')
                    ->where('id', $pageId)
                    ->get();
        }
        return $query->row_array();
    }
    
    public function getAllDetails(){
        
        $query=  $this->db->query("select ROUND_ID,STATUS_ID, ROUND_NAME, sum(case when STATUS_ID ='22' then cnt else 0 end) ACTIVE, sum(case when STATUS_ID ='24' then cnt else 0 end) RELINQUISHED, sum(case when STATUS_ID ='25' then cnt else 0 end) PELAWAITED, sum(case when STATUS_ID ='124' then cnt else 0 end) CONVERTEDTOFIELED, sum(case when STATUS_ID ='125' then cnt else 0 end) PSCCANCELLED, sum(case when STATUS_ID ='127' then cnt else 0 end) PRSRELINQUISH from (SELECT RM.ROUND_ID, RM.ROUND_NAME,SM.STATUS_ID,COUNT(RM.ROUND_ID) cnt FROM WS_BLOCK_MASTER BL JOIN ws_status_master_data_table SM ON BL.STATUS_ID=SM.STATUS_ID JOIN ws_round_master_data_table RM ON BL.ROUND_ID=RM.ROUND_ID WHERE BL.ROUND_ID IN (10,11,12,13,14,15,16,17,20,43,19) group by RM.ROUND_NAME,SM.STATUS_ID ORDER BY RM.ROUND_NAME) As T1 group by ROUND_NAME order by ROUND_NAME");
        return $query->result_array();
        
    }
    
    public function getBlockDetails() {
	$query = $this->db->query("SELECT BASIN, PEL_PML, AREA, VALID_UPTO, WORK, COMP
FROM psc_shalegas_data_table ORDER BY COMP");
        return $query->result_array();
    }
    
    public function getBlockList($st_id, $rd_id){
	$query=  $this->db->query("SELECT BL.BLOCK_ID,BL.BLOCK_NAME,BL.NODAL_ID,BL.COORD_ID FROM WS_BLOCK_MASTER BL WHERE BL.ROUND_ID = ".$rd_id." and BL.STATUS_ID=".$st_id);
        return $query->result_array();
    }
    
    public function showBlockDetails($block_id){
	$query=  $this->db->query("SELECT CO.COMPANY_NAME, BN.BASIN_NAME, RND.ROUND_NAME, CNS.CONSORTIUM_NAME, 'Orignal Area : '|| BM.INITIAL_AREA ||'; Current Area : '|| BM.PRESENT_AREA, BM.BLOCK_NAME, BM.LOCATION, BM.DATE_OF_SIGNING DATE_OF_SIGNING, BM.EFFECTIVE_DATE EFFECTIVE_DATE, SM.STATUS, S.STATE_NAME from WS_COMPANY_MASTER_data_table CO JOIN WS_BLOCK_MASTER_data_table BM ON CO.COMP_ID=BM.OPERATOR_ID AND BM.BLOCK_ID=".$block_id." JOIN ws_basin_master_data_table BN ON BN.BASIN_ID=BM.BASIN_ID JOIN ws_round_master_data_table RND ON BM.ROUND_ID=RND.ROUND_ID JOIN ws_cons_master_data_table CNS ON BM.CONS_ID=CNS.CONSORTIUM_ID LEFT JOIN WS_STATUS_MASTER_data_table SM ON BM.STATUS_ID=SM.STATUS_ID LEFT JOIN WS_STATE_MASTER_data_table S ON S.STATE_ID = BM.STATE_ID AND S.STATE_ID <> -99 AND S.STATE_ID <>100");
        return $query->result_array();
    }
    
    public function showRoundList($rd_nm, $st_id){
	$query = $this->db->query("SELECT BLOCK_NAME FROM PSC_CBM_data_table WHERE ROUND = '".$rd_nm."' AND STATUS_ID = ".$st_id." ORDER BY BLOCK_NAME");
	return $query->result_array();
    }
    
    public function showRoundDetails($block_nm){
	$query = $this->db->query("SELECT CO.COMPANY_NAME OPERATOR, CNS.CONSORTIUM_NAME CONSORTIUM_NAME,
		CBMM.SIGN_DATE DATE_OF_SIGNING,
		CBMM.EFF_DATE EFFECTIVE_DATE,
		CBMM.AREA AREA,
		CBMM.COALFIELD COALFIELD,
		S.STATE_NAME STATE_NAME,
		SM.STATUS STATUS,
		CBMM.ROUND ROUND
		FROM PSC_CBM_data_table CBMM
		LEFT JOIN WS_COMPANY_MASTER_data_table CO ON CO.COMP_ID= CBMM.OPERATOR
		LEFT JOIN ws_cons_master_data_table CNS ON CBMM.CONS_ID=CNS.CONSORTIUM_ID
		LEFT JOIN WS_STATUS_MASTER_data_table SM ON CBMM.STATUS_ID=SM.STATUS_ID
		LEFT JOIN WS_STATE_MASTER_data_table S ON S.STATE_ID = CBMM.STATE_ID AND S.STATE_ID <> -99 AND S.STATE_ID <>100
		WHERE CBMM.BLOCK_NAME='".$block_nm."';");
	return $query->result_array();
    } 
    
    public function showDiscoveryList($rd_nm){
	$query = $this->db->query("SELECT DISCOVERY, BLOCK, OPERATOR, DISCOVERY_DATE, DISCOVERY_TYPE, CURRENT_STATUS FROM PSC_DISCOVERIES_data_table WHERE ROUND = '".$rd_nm."' ORDER BY DISCOVERY");
	return $query->result_array();
    }
    
    public function showDiscoveryDetails($dscName){
	$query = $this->db->query("SELECT BLOCK, ROUND, OPERATOR, DISCOVERY_DATE, DISCOVERY_TYPE, CURRENT_STATUS FROM PSC_DISCOVERIES_data_table WHERE DISCOVERY='".$dscName."'");
	return $query->result_array();
    }

}

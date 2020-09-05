<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model {
	//Function Or Method Construct
	public function __construct(){
		parent::__construct();
	}//Function
	
	//Function Or Method to Update/Edit Database
	public function notice_detail($id = ''){
		$query = "select * from `notice` where `id`='".$id."'";
		$result = $this->db->query($query);
		$noticeList = $result->result();
		return $noticeList;
	}//Function
	

	public function get_current_notice(){
	
		$query = $this->db->select('*')->from('tbl_notices')->where('status',1)->order_by('notice_id', 'DESC')->limit('3')->get()->result();
		return $query;

	}
	
}
<?php
class Payment_model extends Base_Model {
	
	public function __construct(){
		parent::__construct();
	}//Function


	public function get_all_payment(){

		$query = $this->db->select('*')->from('tbl_payment')->join('tbl_members','tbl_members.mem_id = tbl_payment.member_id')->get()->result();
		return $query;	

	}

	public function get_paymentInfo_byID($MemberID){

		$query = $this->db->select('tbl_payment.*')->select('tbl_members.first_name,tbl_members.last_name')->from('tbl_payment')->join('tbl_members', 'tbl_members.mem_id = tbl_payment.member_id')->where('member_id', $MemberID)->get()->row();
		return $query;
	}
	

}//End CI_Model
?>
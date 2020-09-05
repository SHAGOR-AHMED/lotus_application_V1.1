<?php
class Calculation_model extends Base_Model {
	
	public function __construct(){
		parent::__construct();
	}

	public function get_memberInfo_byID($MemberID){

		$result = $this->db->select('first_name,last_name,reg_no,mobile,created_datetime')->from('tbl_members')->where('mem_id', $MemberID)->get()->row();
		return $result;
	}

	public function get_memberFees_byID($MemberID){

		$result = $this->db->select('*')->from('tbl_member_fees')->where('member_id', $MemberID)->get()->row();
		return $result;
	}

	public function get_memberSubscription_byID($MemberID){

		$result = $this->db->select('*')->from('tbl_member_subscription')->where('member_id', $MemberID)->get()->row();
		return $result;
	}

	public function get_memberExamFee_byID($MemberID){

		$result = $this->db->select('*')->from('tbl_examination')->where('member_id', $MemberID)->get()->row();
		return $result;
	}

	public function get_memberLearnerCardFee_byID($MemberID){

		$result = $this->db->select('*')->from('tbl_learner_fees')->where('member_id', $MemberID)->get()->row();
		return $result;
	}

	public function get_memberTrainingFee($MemberID){

		$result = $this->db->select('tbl_training_fees.*')->select_sum('tbl_training_fees.total_paid')->from('tbl_training_fees')->where('member_id', $MemberID)->get()->row();
		return $result;
	}

//==============================================================//

	public function get_memberFee(){

		$this->db->select_sum('tbl_member_fees.total_paid');
		$this->db->from('tbl_member_fees');
		$get = $this->db->get();
		$result = $get->row();
		return $result;
	}

	public function get_memberSubscription(){

		$this->db->select_sum('tbl_member_subscription.total_paid');
		$this->db->from('tbl_member_subscription');
		$get = $this->db->get();
		$result = $get->row();
		return $result;
	}

	public function get_memberExamFee(){

		$this->db->select_sum('tbl_examination.exam_fees');
		$this->db->from('tbl_examination');
		$get = $this->db->get();
		$result = $get->row();
		return $result;
	}

	public function get_memberLearnerCardFee(){

		$this->db->select_sum('tbl_learner_fees.total_paid');
		$this->db->from('tbl_learner_fees');
		$get = $this->db->get();
		$result = $get->row();
		return $result;
	}

	public function get_TrainingFee(){

		$this->db->select_sum('tbl_training_fees.total_paid');
		$this->db->from('tbl_training_fees');
		$get = $this->db->get();
		$result = $get->row();
		return $result;
	}

	public function get_totalExpense(){

		$this->db->select_sum('tbl_expense.total_amount');
		$this->db->from('tbl_expense');
		$get = $this->db->get();
		$result = $get->row();
		return $result;
	}


	// public function get_paidamount_byID($MemberID){

	// 	$this->db->select('tbl_paid_payment.*');
	// 	$this->db->select('tbl_members.first_name,tbl_members.last_name');
	// 	$this->db->select('tbl_payment.total_payment');
	// 	$this->db->from('tbl_paid_payment');
	// 	$this->db->where('status', 1);
	// 	$this->db->where('tbl_paid_payment.member_id', $MemberID);
	// 	$this->db->join('tbl_members','tbl_members.mem_id = tbl_paid_payment.member_id');
	// 	$this->db->join('tbl_payment','tbl_payment.member_id = tbl_paid_payment.member_id');
	// 	$get = $this->db->get();
	// 	$result = $get->result();
	// 	return $result;
	// }
	

}//End Calculation_model

?>
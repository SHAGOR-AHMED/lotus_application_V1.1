<?php

class Training_model extends Base_Model {
	
	public function __construct(){
		parent::__construct();
	}//Function
	
	public function get_training(){

		$query = $this->db->select('tbl_training.*')->select('tbl_members.first_name,tbl_members.last_name')->from('tbl_training')->join('tbl_members', 'tbl_members.mem_id = tbl_training.member_id')->order_by('training_id','DESC')->get()->result();
		return $query;		

	}

	public function edit_training_byID($id = ''){

		$query = $this->db->select('*')->from('tbl_training')->where('training_id', $id)->get()->row();
		return $query;
	}

	public function Update_Training($TrainingID){

		$result = $this->db->where('training_id',$TrainingID)->update('tbl_training');
		return $result;
	}

	public function Delete_Training($Id){

		$result = $this->db->where('training_id',$Id)->delete('tbl_training');
		return $result;
	}

//============================================================//

	public function get_training_fees(){

		$query = $this->db->select('tbl_training_fees.*')->select('tbl_members.first_name,tbl_members.last_name')->from('tbl_training_fees')->join('tbl_members', 'tbl_members.mem_id = tbl_training_fees.member_id')->order_by('trainingfees_id','DESC')->get()->result();
		return $query;		

	}

	public function edit_trainingFees_byID($id = ''){

		$query = $this->db->select('*')->from('tbl_training_fees')->where('trainingfees_id', $id)->get()->row();
		return $query;
	}

	public function Update_TrainingFees($TrainingFeesID){

		$result = $this->db->where('trainingfees_id',$TrainingFeesID)->update('tbl_training_fees');
		return $result;
	}

//=====================================================================//

	public function get_trainingPaymentRecord_ByID($MemberID){

		$this->db->select('tbl_training_fees.*');
		$this->db->select_sum('tbl_training_fees.total_paid');
		$this->db->select('tbl_members.first_name,tbl_members.last_name');
		$this->db->from('tbl_training_fees');
		$this->db->where('tbl_training_fees.member_id', $MemberID);
		$this->db->join('tbl_members','tbl_members.mem_id = tbl_training_fees.member_id');
		$get = $this->db->get();
		$result = $get->row();
		return $result;
	}

	public function get_trainingPaymentDetails_byID($MemberID){

		$this->db->select('tbl_training_fees.*');
		$this->db->select('tbl_members.first_name,tbl_members.last_name');
		$this->db->from('tbl_training_fees');
		$this->db->where('tbl_training_fees.member_id', $MemberID);
		$this->db->join('tbl_members','tbl_members.mem_id = tbl_training_fees.member_id');
		$get = $this->db->get();
		$result = $get->result();
		return $result;
	}

	
}//End CI_Model

?>
<?php

class Learner_model extends Base_Model {
	
	public function __construct(){
		parent::__construct();
	}//Function
	
	public function get_learner_fees(){

		$query = $this->db->select('tbl_learner_fees.*')->select('tbl_members.first_name,tbl_members.last_name')->from('tbl_learner_fees')->join('tbl_members', 'tbl_members.mem_id = tbl_learner_fees.member_id', 'left')->get()->result();
		return $query;		

	}

	public function edit_learner_card($id = ''){

		$query = $this->db->select('*')->from('tbl_learner_fees')->where('learner_id', $id)->get()->row();
		return $query;
	}

	public function Update_LearnerCard($LearnerID){

		$result = $this->db->where('learner_id',$LearnerID)->update('tbl_learner_fees');
		return $result;
	}

	public function Delete_Learner($Id){

		$result = $this->db->where('learner_id',$Id)->delete('tbl_learner_fees');
		return $result;
	}
	

}//End CI_Model

?>
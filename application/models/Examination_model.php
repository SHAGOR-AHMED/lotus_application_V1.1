<?php

class Examination_model extends Base_Model {
	
	public function __construct(){
		parent::__construct();
	}//Function
	
	public function get_examinee(){

		$query = $this->db->select('tbl_examination.*')->select('tbl_members.first_name,tbl_members.last_name')->from('tbl_examination')->join('tbl_members', 'tbl_members.mem_id = tbl_examination.member_id')->order_by('exam_id','DESC')->get()->result();
		return $query;		

	}
	
	public function selected_info_byID($id = ''){

		$query = $this->db->select('*')->from('tbl_examination')->where('exam_id', $id)->get()->row();
		return $query;
	}

	public function Update_Examinee($ExamID){

        return $this->db->where('exam_id', $ExamID)->update('tbl_examination');

    }

	public function Delete_Examinee($Id){

		$result = $this->db->where('exam_id',$Id)->delete('tbl_examination');
		return $result;
	}
	

}//End CI_Model
?>
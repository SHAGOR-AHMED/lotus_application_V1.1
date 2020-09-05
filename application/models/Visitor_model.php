<?php

class Visitor_model extends Base_Model {
	
	public function __construct(){
		parent::__construct();
	}//Function
	
	public function get_visitor(){

		$query = $this->db->select('*')->from('tbl_visitor')->get()->result();
		return $query;		

	}

	public function Visitor_edit($id = ''){

		$query = $this->db->select('*')->from('tbl_visitor')->where('visitor_id', $id)->get()->row();
		return $query;
	}

	public function Delete_Visitor($VisitorId){

		$result = $this->db->where('visitor_id',$VisitorId)->delete('tbl_visitor');
		return $result;
	}
	

}//End CI_Model
?>
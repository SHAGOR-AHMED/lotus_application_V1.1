<?php

class Expense_model extends Base_Model {
	
	public function __construct(){
		parent::__construct();
	}//Function
	
	public function get_daily_expense(){

		$query = $this->db->select('*')->from('tbl_expense')->get()->result();
		return $query;		

	}

	public function edit_daily_expense($id = ''){

		$query = $this->db->select('*')->from('tbl_expense')->where('expense_id', $id)->get()->row();
		return $query;
	}

	public function Update_Expense($ExpenseID){

		$result = $this->db->where('expense_id',$ExpenseID)->update('tbl_expense');
		return $result;
	}

	public function Delete_DailyExpense($Id){

		$result = $this->db->where('expense_id',$Id)->delete('tbl_expense');
		return $result;
	}
	

}//End CI_Model

?>
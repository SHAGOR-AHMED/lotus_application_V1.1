<?php

class Member_model extends Base_Model {
	
	public function __construct(){
		parent::__construct();
	}//Function
	
	public function get_member_fees(){

		$query = $this->db->select('tbl_member_fees.*')->select('tbl_members.first_name,tbl_members.last_name')->from('tbl_member_fees')->join('tbl_members', 'tbl_members.mem_id = tbl_member_fees.member_id')->get()->result();
		return $query;		

	}

	public function Edit_MemberFees($id = ''){

		$query = $this->db->select('*')->from('tbl_member_fees')->where('fees_id', $id)->get()->row();
		return $query;
	}

	public function Update_MemberFees($FeesID = ''){

		$query = $this->db->where('fees_id', $FeesID)->update('tbl_member_fees');
		return $query;
	}

	public function Delete_MemberFees($Id = ''){

		$query = $this->db->where('fees_id', $Id)->delete('tbl_member_fees');
		return $query;
	}

//=========================================================//

	public function get_member_subscription(){

		$query = $this->db->select('tbl_member_subscription.*')->select('tbl_members.first_name,tbl_members.last_name')->from('tbl_member_subscription')->join('tbl_members', 'tbl_members.mem_id = tbl_member_subscription.member_id')->get()->result();
		return $query;		

	}

	public function Edit_Subscription($id = ''){

		$query = $this->db->select('*')->from('tbl_member_subscription')->where('subscription_id', $id)->get()->row();
		return $query;
	}

	public function Update_Subscription($SubscriptionID = ''){

		$query = $this->db->where('subscription_id', $SubscriptionID)->update('tbl_member_subscription');
		return $query;
	}

	public function Delete_Subscription($Id = ''){

		$query = $this->db->where('subscription_id', $Id)->delete('tbl_member_subscription');
		return $query;
	}
	
}//End CI_Model

?>
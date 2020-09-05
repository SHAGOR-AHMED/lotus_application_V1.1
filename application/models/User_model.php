<?php
class User_model extends Base_Model {
	
	public function __construct(){
		parent::__construct();
	}//Function
	
	public function get_users(){

		$query = $this->db->select('*')->from('user')->get()->result();
		return $query;		

	}

	public function user_edit($id = ''){

		$query = $this->db->select('*')->from('user')->where('id', $id)->get()->row();
		return $query;
	}

	public function Update_user_By_ID($UserID){

		$query = $this->db->where('id', $UserID)->update('user');
		return $query;
	}

	public function update_password($userID,$new_pass){

		$this->db->set('password', $new_pass);
		$query = $this->db->where('id', $userID)->update('user');
		return $query;
	}

	public function Delete_User($UserId){

		$data = array('id'=>$UserId);
		$photo = $this->db->get_where('user',$data)->row();
		unlink($photo->photo);
		$result = $this->db->where('id',$UserId)->delete('user');
		return $result;
	}

//========================= Member ==========================//

	public function get_members(){

		$query = $this->db->select('*')->from('tbl_members')->get()->result();
		return $query;		
	}

    public function MembersDetails($MemID){

        $query = $this->db->select('*')->from('tbl_members')->where('mem_id',$MemID)->get()->row();
        return $query;
    }

	public function Select_Member_by_id($MemberId){

		$query = $this->db->select('*')->from('tbl_members')->where('mem_id', $MemberId)->get()->row();
		return $query;
	}

	public function Update_Member_by_id($member_id){

		$result = $this->db->where('mem_id',$member_id)->update('tbl_members');
		return $result;

	}//Update_Member

	public function Update_Memberprofile_by_id($member_id){

		$result = $this->db->where('mem_id',$member_id)->update('tbl_members');
		return $result;
	}

	public function update_member_password($userID,$new_pass){

		$this->db->set('password', $new_pass);
		$query = $this->db->where('mem_id', $userID)->update('tbl_members');
		return $query;
	}

	public function Delete_Member($MemberId){

		$data = array('mem_id'=>$MemberId);
		$photo = $this->db->get_where('tbl_members',$data)->row();
		unlink($photo->photo);
		$result = $this->db->where('mem_id',$MemberId)->delete('tbl_members');
		return true;
	}

//======================= End Member =======================//

//======================= Feedback =======================//

	public function get_all_feedback(){

		$query = $this->db->select('*')->from('tbl_feedback')->get()->result();
		return $query;	
	}

	public function select_feedback_byID($FeedbackID){

		$query = $this->db->select('*')->from('tbl_feedback')->where('feedback_id', $FeedbackID)->get()->row();
		return $query;
	}

	public function save_update($feedback_id, $data){

		$query = $this->db->where('feedback_id', $feedback_id)->update('tbl_feedback', $data);
		return $query;	
	}

	//Function or Method User check
	public function check_ajax_exists($id,$user_name,$email,$submit){
	
		$user_id = $this->session->userdata('user_id');
		$created_by = $updated_by = $user_id;
		$created_datetime = $updated_datetime = date("Y-m-d h:i:s");
		
		//query for user exists value check
		$query_user = "select id from `user` where `user_name`='$user_name' and id<>'$id'";
		$result_user = $this->db->query($query_user);
		if($result_user->num_rows > 0){
			echo '1';
		}
		
		$query_email = "select id from `user` where `email`='$email' and id<>'$id'";
		$query_email = $this->db->query($query_email);
		if($query_email->num_rows > 0){
			echo '3';
		}
		
	}//Function
	

}//End CI_Model
?>
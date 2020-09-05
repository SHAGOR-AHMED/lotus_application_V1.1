<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends Base_Controller {

	public function __construct(){
		parent:: __construct();	

		if ($this->session->userdata('user_id') == null || $this->session->userdata('user_id') < 1) {
                   
            if ($this->router->class != 'login'){                        
                redirect(base_url());
            }
        }
		
		$this->load->model("user_model");
		$this->load->model("dashboard_model");
		$this->load->helper('user_helper');	
	}
	

	public function index(){

		$data['message'] = array();
		$data['title'] = "LOTUS | All User list";
		$data['users'] = $this->user_model->get_users();
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$data['message'] = $this->session->flashdata('message');
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/user_view');
		$this->load->view('backend/template_footer');

	}
	
	public function create(){

		$data['title'] = "LOTUS | Add New User";
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/user_form');
		$this->load->view('backend/template_footer');
		
	}
	

	public function save_user(){

		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('user_name', 'User Name', 'required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[confirm_password]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('contact', 'Contact', 'required|max_length[11]'); 
		$this->form_validation->set_rules('address', 'Address', 'required'); 

		if($this->form_validation->run() == FALSE){

			$data['notices'] = $this->dashboard_model->get_current_notice();
			$this->load->view('backend/template_header', $data);
			$this->load->view('backend/template_left');
			$this->load->view('backend/user_form');
			$this->load->view('backend/template_footer');
			return false;

		}else{

			$data['first_name'] = $this->input->post('first_name');
			$data['last_name'] = $this->input->post('last_name');
			$data['user_name'] = $this->input->post('user_name');
			$data['password'] = md5($this->input->post('password'));
			$data['email'] = $this->input->post('email');
			$data['contact'] = $this->input->post('contact');
			$data['address'] = $this->input->post('address');
			$data['created_datetime'] = date("Y-m-d h:i:s");

			$data['photo'] = $this->uploadPhoto();

			$result = $this->user_model->commonInsert('user',$data);
			if($result){
				$msg = $data['first_name'].' has been created successfully';
				$message = $this->msg($msg);
				redirect('user/index');
			}else{
				$msg = $data['first_name'].' Failed to Add User!!';
				$message = $this->msg($msg);
				redirect('user/index');
			}
			
		}//if
		
	}//save_user

	public function edit($id=''){
		
		$data['title'] = "LOTUS | Edit User";
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$data['user'] = $this->user_model->user_edit($id);	
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/user_edit');
		$this->load->view('backend/template_footer');
			
	}

	public function update_user(){

		$UserID = $this->input->post('id');
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$user_name = $this->input->post('user_name');
		$email = $this->input->post('email');
		$contact = $this->input->post('contact');
		$address = $this->input->post('address');

		$this->db->set('first_name', $first_name);
		$this->db->set('last_name', $last_name);
		$this->db->set('user_name', $user_name);
		$this->db->set('email', $email);
		$this->db->set('contact', $contact);
		$this->db->set('address', $address);

		if(isset($UserID) && $UserID != ''){

			$data = array('id' => $UserID);
			$prev_info = $this->db->get_where("user",$data)->row();
			if(isset($_FILES['photo']['name']) && ($_FILES['photo']['name'] != '')){
				unlink($prev_info->photo);
			}
		}

		if(isset($_FILES['photo']['name']) && ($_FILES['photo']['name'] != '') ){

			$photo = $this->updatePhoto();
		}

		$result = $this->user_model->Update_user_By_ID($UserID);

		if($result){
			$msg = $first_name.' has been updated successfully';
			$message = $this->msg($msg);
			redirect('user/index');

		}else{
			$msg = $first_name.' Failed to update!!';
			$message = $this->msg($msg);
			redirect('user/index');

		}
			
	}//update_user

    public function DeleteUser($UserId=''){

		$result = $this->user_model->Delete_User($UserId);
		if($result){
			$message = 'Deleted successfully';
			$this->session->set_flashdata('message', $message);
			redirect('user/index');	
		}else{
			$message = 'Failed to Deleted';
			$this->session->set_flashdata('message', $message);
			redirect('user/index');
		}
	}
	

//======================= Manage Member ===============================//

	public function ManageMember(){

		$data = array();
		$data['message'] = array();
		$data['title'] = "LOTUS | All Member List";
		$data['members'] = $this->user_model->get_members();
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$data['message'] = $this->session->flashdata('message');
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/member_view');
		$this->load->view('backend/template_footer');
	}

	public function ViewMemberDetails(){

        $MemID = $this->input->post('id');
        $data['MemberDesc'] = $this->user_model->MembersDetails($MemID);
        $this->load->view('backend/member_detail', $data);

	}

	public function create_member(){

		$data['title'] = "LOTUS | Add New Member";
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/add_member');
		$this->load->view('backend/template_footer');
		
	}

	public function save_member(){

		// start form validation
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required|max_length[11]');
		$this->form_validation->set_rules('reg_no', 'Registration No', 'required');

		$this->form_validation->set_rules('father_name', 'Father Name', 'required');
		$this->form_validation->set_rules('mother_name', 'Mother Name', 'required');
		$this->form_validation->set_rules('g_address', 'Address', 'required');

		if($this->form_validation->run() == FALSE){

			$data['title'] = "LOTUS | Add New Member";
			$data['notices'] = $this->dashboard_model->get_current_notice();
			$this->load->view('backend/template_header', $data);
			$this->load->view('backend/template_left');
			$this->load->view('backend/add_member');
			$this->load->view('backend/template_footer');
			return false;

		}else{

			$data['first_name'] = $this->input->post('first_name');
			$data['last_name'] = $this->input->post('last_name');
			$data['mobile'] = $this->input->post('mobile');
			$data['reg_no'] = $this->input->post('reg_no');
			$data['address'] = $this->input->post('address');
			$data['father_name'] = $this->input->post('father_name');
			$data['mother_name'] = $this->input->post('mother_name');
			$data['gardian_contact'] = $this->input->post('gardian_contact');
			$data['g_address'] = $this->input->post('g_address');
			$data['created_datetime'] = date("Y-m-d h:i:s");
		 
			$data['photo'] = $this->uploadPhoto();

			//$this->debug($data);

			$result = $this->user_model->commonInsert('tbl_members',$data);

			if($result){
				$msg = 'Member has been created successfully';
				$message = $this->msg($msg);
				redirect('user/ManageMember');
			}else{
				$msg = 'Failed to Add Member';
				$message = $this->msg($msg);
				redirect('user/ManageMember');
			}

		}//if

	}//save_member

	public function Edit_Member($MemberId=''){

		$data = array();
		$data['title'] = "LOTUS | Edit Member";	
		$data['notices'] = $this->dashboard_model->get_current_notice();			
		$data['Member_List'] = $this->user_model->Select_Member_by_id($MemberId);
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/edit_member');
		$this->load->view('backend/template_footer');
			
	}

	public function Update_Member(){

		$member_id = $this->input->post('mem_id');
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$mobile = $this->input->post('mobile');
		$reg_no = $this->input->post('reg_no');
		$address = $this->input->post('address');
		$father_name = $this->input->post('father_name');
		$mother_name = $this->input->post('mother_name');
		$gardian_contact = $this->input->post('gardian_contact');
		$g_address = $this->input->post('g_address');

		$this->db->set('first_name', $first_name);
		$this->db->set('last_name', $last_name);
		$this->db->set('mobile', $mobile);
		$this->db->set('reg_no', $reg_no);
		$this->db->set('address', $address);
		$this->db->set('father_name', $father_name);
		$this->db->set('mother_name', $mother_name);
		$this->db->set('gardian_contact', $gardian_contact);
		$this->db->set('g_address', $g_address);

		if(isset($member_id) && $member_id != ''){

			$data = array('mem_id' => $member_id);
			$prev_info = $this->db->get_where("tbl_members",$data)->row();
			if(isset($_FILES['photo']['name']) && ($_FILES['photo']['name'] != '')){
				unlink($prev_info->photo);
			}
		}

		if(isset($_FILES['photo']['name']) && ($_FILES['photo']['name'] != '') ){

			$photo = $this->updatePhoto();
		}

		//$this->debug($data);

		$result = $this->user_model->Update_Member_by_id($member_id);
		if($result){
			$message = 'Updated Successfully';
			$this->session->set_flashdata('message', $message);
			redirect('user/ManageMember');	
		}else{
			$message = 'Failed to Update';
			$this->session->set_flashdata('message', $message);
			redirect('user/ManageMember');
		}

	}//Update_Member

	public function Member_profile($MemberId=''){

		$data['title'] = "LOTUS | Member Profile";	
		$data['notices'] = $this->dashboard_model->get_current_notice();			
		$data['Member_List'] = $this->user_model->Select_Member_by_id($MemberId);
		$data['message'] = $this->session->flashdata('message');
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/member_profile');
		$this->load->view('backend/template_footer');
			
	}

	public function update_profile(){

		$member_id = $this->input->post('mem_id');
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$user_name = $this->input->post('user_name');
		$mobile = $this->input->post('mobile');
		$email = $this->input->post('email');
		$address = $this->input->post('address');

		$this->db->set('first_name', $first_name);
		$this->db->set('last_name', $last_name);
		$this->db->set('user_name', $user_name);
		$this->db->set('mobile', $mobile);
		$this->db->set('email', $email);
		$this->db->set('address', $address);

		if(isset($member_id) && $member_id != ''){

			$data = array('mem_id' => $member_id);
			$prev_info = $this->db->get_where("tbl_members",$data)->row();
			if(isset($_FILES['photo']['name']) && ($_FILES['photo']['name'] != '')){
				unlink($prev_info->photo);
			}
		}

		if(isset($_FILES['photo']['name']) && ($_FILES['photo']['name'] != '') ){

			$photo = $this->updatePhoto();
		}

		$result = $this->user_model->Update_Memberprofile_by_id($member_id);

		if($result){
			$message = $first_name.' has been Updated Successfully';
			$this->session->set_flashdata('message', $message);
			redirect('user/Member_profile/'.$member_id);	
		}else{
			$message = 'Failed to Update';
			$this->session->set_flashdata('message', $message);
			redirect('user/Member_profile/'.$member_id);
		}
			
	}//update_profile


	public function DeleteMember($MemberId=''){

		$result = $this->user_model->Delete_Member($MemberId);
		if($result){
			$message = 'Deleted successfully';
			$this->session->set_flashdata('message', $message);
			redirect('user/ManageMember');	
		}else{
			$message = 'Failed to Deleted';
			$this->session->set_flashdata('message', $message);
			redirect('user/ManageMember');
		}
	}

//========================= Feedback Information ============================//

	public function MemberFeedback(){
		
		$data = array();
		$data['title'] = "LOTUS | Leave a message";
		$data['message'] = $this->session->flashdata('message');
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/add_feedback');
		$this->load->view('backend/template_footer');
	}

	public function get_feedback(){

		$data = array();
		$data['title'] = "LOTUS | All Feedback";
		$data['message'] = $this->session->flashdata('message');
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$data['all_feedback'] = $this->user_model->get_all_feedback();
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/view_feedback');
		$this->load->view('backend/template_footer');
	}

	public function feedback_details(){

		$FeedbackID = $this->input->post('id');
		$data['get_feedback'] = $this->db->select('*')->from('tbl_feedback')->where('feedback_id', $FeedbackID)->get()->row();
		$this->load->view('backend/feedback_details', $data);
	}

	public function save_feedback(){

		$login_type = $this->session->userdata('login_type');
		$data['feedback_purpose'] = $this->input->post('feedback_purpose');
		$data['message'] = $this->input->post('message');
		if($login_type == 2){
			$data['feedback_by'] = 'Hostel Member';
		}elseif($login_type == 3){
			$data['feedback_by'] = 'Guardian';
		}

		$result = $this->user_model->commonInsert('tbl_feedback',$data);

		if($result){

			$msg = 'Feedback has been save successfully.!!';
			$message = $this->msg($msg);
			redirect('User/MemberFeedback');

		}else{

			$msg = 'Failed to Save Feedback.!!';
			$message = $this->msg($msg);
			redirect('User/MemberFeedback');

		}

	}//save_notices

	public function edit_feedback($FeedbackID){

		$data = array();
		$data['title'] = "LOTUS | Edit your message";
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$data['selected_info'] = $this->user_model->select_feedback_byID($FeedbackID);
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/edit_feedback');
		$this->load->view('backend/template_footer');
	}

	public function update_feedback(){

		$feedback_id = $this->input->post('feedback_id');
		$data['feedback_purpose'] = $this->input->post('feedback_purpose');
		$data['message'] = $this->input->post('message');  

		$result = $this->user_model->save_update($feedback_id, $data);

		if($result){

			$msg = 'Feedback has been Updated successfully.!!';
			$message = $this->msg($msg);
			redirect('User/get_feedback');

		}else{

			$msg = 'Failed to updated.!!';
			$message = $this->msg($msg);
			redirect('User/get_feedback');

		}
		
	}//update_feedback

///////////////////== Change Password == //////////////////

	public function change_password($userID=''){

		$data['user_id'] =  $userID;
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$data['message'] = $this->session->flashdata('message');
		$data['title'] = "LOTUS | Change Password";
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/password_change');
		$this->load->view('backend/template_footer');
	}

	public function password_change(){
		
		$userID = $this->input->post('id');
    	$old_pass = md5($this->input->post('old_password'));
    	$new_pass = md5($this->input->post('new_password'));
    	$login_type = $this->session->userdata('login_type');

    	if($login_type == 1){

    		$pre_info = $this->db->select('*')->from('user')->where('id', $userID)->get()->row();

	    	$pre_pass = $pre_info->password;

	  		if($pre_pass == $old_pass){

				$result = $this->user_model->update_password($userID,$new_pass);

				if($result){

					$this->session->sess_destroy();
			        $msg = '<font color=red>Password has been changed successfully.</font><br />';
                	$this->index($msg);
                	redirect("login");

				}else{

					$msg = "Fail to update password.!!!";
					$message = $this->msg($msg);
					redirect('user/change_password/'.$userID);
				}

	  		}else{

				$msg = "Old Password doesn't Match.!!!";
				$message = $this->msg($msg);
				redirect('user/change_password/'.$userID);
	  			
	  		}

    	}elseif($login_type == 2){

    		$pre_info = $this->db->select('*')->from('tbl_members')->where('mem_id', $userID)->get()->row();

	    	$pre_pass = $pre_info->password;

	  		if($pre_pass == $old_pass){

				$result = $this->user_model->update_member_password($userID,$new_pass);

				if($result){

					$this->session->sess_destroy();
			        $msg = '<font color=red>Password has been changed successfully.</font><br />';
                	$this->index($msg);
                	redirect("login");

				}else{

					$msg = "Fail to update password.!!!";
					$message = $this->msg($msg);
					redirect('user/change_password/'.$userID);
				}

	  		}else{

				$msg = "Old Password doesn't Match.!!!";
				$message = $this->msg($msg);
				redirect('user/change_password/'.$userID);
	  			
	  		}

    	}//if
		
	
	}//password_change


	public function do_logout(){

    	$this->session->sess_destroy();
        $message = 'You have Logged Out!';
		$msg = $this->msg($message);
        redirect("login");
    }
	
}//CI_Controller

?>
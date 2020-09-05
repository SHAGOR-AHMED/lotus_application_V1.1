<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends Base_Controller {

	public function __construct(){
		parent:: __construct();	

		if ($this->session->userdata('user_id') == null || $this->session->userdata('user_id') < 1) {
                   
            if ($this->router->class != 'login'){                        
                redirect(base_url());
            }
        }
		
		$this->load->model("member_model");
		$this->load->model("dashboard_model");
		$this->load->helper('User_helper');	
	}
	

	public function index(){

		$data['message'] = array();
		$data['title'] = "LOTUS | All Member's Fees List";
		$data['FeesInfo'] = $this->member_model->get_member_fees();
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$data['message'] = $this->session->flashdata('message');
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/view_member_fees');
		$this->load->view('backend/template_footer');

	}
	
	public function create(){

		$data['title'] = "LOTUS | Member Fees Collection";
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/add_member_fees');
		$this->load->view('backend/template_footer');
		
	}
	

	public function save_member_fees(){

		$this->form_validation->set_rules('member_id', 'Member Name', 'required');
		$this->form_validation->set_rules('payment_date', 'Payment Date', 'required');
		$this->form_validation->set_rules('total_fees', 'Total Payable', 'required');
		$this->form_validation->set_rules('total_paid', 'Payment Amount', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
	

		if($this->form_validation->run() == FALSE){

			$data['notices'] = $this->dashboard_model->get_current_notice();
			$this->load->view('backend/template_header', $data);
			$this->load->view('backend/template_left');
			$this->load->view('backend/add_member_fees');
			$this->load->view('backend/template_footer');
			return false;

		}else{

			$data['member_id'] = $this->input->post('member_id');
			$data['payment_date'] = $this->input->post('payment_date');
			$data['total_fees'] = $this->input->post('total_fees');
			$data['total_paid'] = $this->input->post('total_paid');
			$data['status'] = $this->input->post('status');

			$result = $this->member_model->commonInsert('tbl_member_fees',$data);
			if($result){
				$msg = 'Payment has been collected successfully!!!';
				$message = $this->msg($msg);
				redirect('Member/index');
			}else{
				$msg = 'Failed to Save!!!';
				$message = $this->msg($msg);
				redirect('Member/index');
			}
			
		}//if
		
	}//save_member_fees

	public function edit_member_fees($id=''){
		
		$data['title'] = "LOTUS | Edit Visitor";
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$data['selected_info'] = $this->member_model->Edit_MemberFees($id);
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/edit_member_fees');
		$this->load->view('backend/template_footer');
			
	}

	public function update_member_fees(){

		$FeesID = $this->input->post('fees_id');
		$member_id = $this->input->post('member_id');
		$payment_date = $this->input->post('payment_date');
		$total_paid = $this->input->post('total_paid');
		$status = $this->input->post('status');

		$this->db->set('member_id', $member_id);
		$this->db->set('payment_date', $payment_date);
		$this->db->set('total_paid', $total_paid);
		$this->db->set('status', $status);
		

		$result = $this->member_model->Update_MemberFees($FeesID);

		if($result){
			$msg = 'Updated Successfully!!!';
			$message = $this->msg($msg);
			redirect('Member/index');

		}else{
			$msg = 'Failed to Update!!!';
			$message = $this->msg($msg);
			redirect('Member/index');
		}
			
	}//update_member_fees

    public function delete_member_fees($Id=''){

		$result = $this->member_model->Delete_MemberFees($Id);
		if($result){
			$message = 'Deleted successfully';
			$this->session->set_flashdata('message', $message);
			redirect('Member/index');	
		}else{
			$message = 'Failed to Deleted';
			$this->session->set_flashdata('message', $message);
			redirect('Member/index');
		}
	}

//=================================================================//

	public function SubscriptionFees(){

		$data['message'] = array();
		$data['title'] = "LOTUS | All Member's Subscription Fees List";
		$data['SubscriptionFeesInfo'] = $this->member_model->get_member_subscription();
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$data['message'] = $this->session->flashdata('message');
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/view_member_subscription');
		$this->load->view('backend/template_footer');

	}

	public function create_subscription(){

		$data['title'] = "LOTUS | Member Subscription Fees Collection";
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/add_member_subscription');
		$this->load->view('backend/template_footer');
		
	}

	public function save_subscription(){

		$this->form_validation->set_rules('member_id', 'Member Name', 'required');
		$this->form_validation->set_rules('reg_no', 'Registration No', 'required');
		$this->form_validation->set_rules('payment_date', 'Payment Date', 'required');
		$this->form_validation->set_rules('month', 'Month', 'required');
		$this->form_validation->set_rules('total_paid', 'Payment Amount', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
	

		if($this->form_validation->run() == FALSE){

			$data['notices'] = $this->dashboard_model->get_current_notice();
			$this->load->view('backend/template_header', $data);
			$this->load->view('backend/template_left');
			$this->load->view('backend/add_member_subscription');
			$this->load->view('backend/template_footer');
			return false;

		}else{

			$data['member_id'] = $this->input->post('member_id');
			$data['reg_no'] = $this->input->post('reg_no');
			$data['payment_date'] = $this->input->post('payment_date');
			$data['month'] = $this->input->post('month');
			$data['total_paid'] = $this->input->post('total_paid');
			$data['status'] = $this->input->post('status');

			$result = $this->member_model->commonInsert('tbl_member_subscription',$data);
			if($result){
				$msg = 'Payment has been collected successfully!!!';
				$message = $this->msg($msg);
				redirect('Member/SubscriptionFees');
			}else{
				$msg = 'Failed to Save!!!';
				$message = $this->msg($msg);
				redirect('Member/SubscriptionFees');
			}
			
		}//if
		
	}//save_subscription

	public function edit_subscription($id=''){
		
		$data['title'] = "LOTUS | Edit Member Subscription Fees";
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$data['selected_info'] = $this->member_model->Edit_Subscription($id);
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/edit_member_subscription');
		$this->load->view('backend/template_footer');
			
	}

	public function update_subscription(){

		$SubscriptionID = $this->input->post('subscription_id');
		$member_id = $this->input->post('member_id');
		$reg_no = $this->input->post('reg_no');
		$payment_date = $this->input->post('payment_date');
		$month = $this->input->post('month');
		$total_paid = $this->input->post('total_paid');
		$status = $this->input->post('status');

		$this->db->set('member_id', $member_id);
		$this->db->set('reg_no', $reg_no);
		$this->db->set('payment_date', $payment_date);
		$this->db->set('month', $month);
		$this->db->set('total_paid', $total_paid);
		$this->db->set('status', $status);
		

		$result = $this->member_model->Update_Subscription($SubscriptionID);

		if($result){
			$msg = 'Updated Successfully!!!';
			$message = $this->msg($msg);
			redirect('Member/SubscriptionFees');

		}else{
			$msg = 'Failed to Update!!!';
			$message = $this->msg($msg);
			redirect('Member/SubscriptionFees');
		}
			
	}//update_subscription

	public function delete_subscription($Id=''){

		$result = $this->member_model->Delete_Subscription($Id);
		if($result){
			$message = 'Deleted successfully';
			$this->session->set_flashdata('message', $message);
			redirect('Member/SubscriptionFees');	
		}else{
			$message = 'Failed to Deleted';
			$this->session->set_flashdata('message', $message);
			redirect('Member/SubscriptionFees');
		}
	}

//====================================================================//

	public function display_reg_no($val = null){

		$data = $this->db->select('mem_id,reg_no')->from('tbl_members')->where('mem_id', $val)->get()->row();

        $RegNo = $data->reg_no;

        if ($data) {
            echo $RegNo;
        } else {
            echo 0;
        }

	}//display_reg_no


}//CI_Controller

?>
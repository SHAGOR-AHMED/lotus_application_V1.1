<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Learner extends Base_Controller {

	public function __construct(){
		parent:: __construct();	

		if ($this->session->userdata('user_id') == null || $this->session->userdata('user_id') < 1) {
                   
            if ($this->router->class != 'login'){                        
                redirect(base_url());
            }
        }
		
		$this->load->model("learner_model");
		$this->load->model("dashboard_model");
		$this->load->helper('User_helper');	
	}

	public function index(){

		$data['message'] = array();
		$data['title'] = "LOTUS | All Learner list";
		$data['get_learner'] = $this->learner_model->get_learner_fees();
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$data['message'] = $this->session->flashdata('message');
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/view_learner_fees');
		$this->load->view('backend/template_footer');

	}
	
	public function create(){

		$data['title'] = "LOTUS | Add New Visitor";
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/add_learner_fees');
		$this->load->view('backend/template_footer');
		
	}
	

	public function save_learner_fees(){

		$this->form_validation->set_rules('member_id', 'Member Name', 'required');
		$this->form_validation->set_rules('payment_date', 'Payment Date', 'required');
		$this->form_validation->set_rules('total_amount', 'Total Payable', 'required');
		$this->form_validation->set_rules('total_paid', 'Pay Amount', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required'); 

		if($this->form_validation->run() == FALSE){

			$data['notices'] = $this->dashboard_model->get_current_notice();
			$this->load->view('backend/template_header', $data);
			$this->load->view('backend/template_left');
			$this->load->view('backend/add_learner_fees');
			$this->load->view('backend/template_footer');
			return false;

		}else{

			$data['member_id'] = $this->input->post('member_id');
			$data['reg_no'] = $this->input->post('reg_no');
			$data['payment_date'] = $this->input->post('payment_date');
			$data['total_amount'] = $this->input->post('total_amount');
			$data['total_paid'] = $this->input->post('total_paid');
			$data['status'] = $this->input->post('status');

			$result = $this->learner_model->commonInsert('tbl_learner_fees',$data);
			if($result){
				$msg = 'New Record has been created successfully!!!';
				$message = $this->msg($msg);
				redirect('Learner/index');
			}else{
				$msg = 'Failed to save!!!';
				$message = $this->msg($msg);
				redirect('Learner/index');
			}
			
		}//if
		
	}//save_learner_fees

	public function edit_learner($id=''){
		
		$data['title'] = "LOTUS | Edit Learner Card Info";
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$data['selected_info'] = $this->learner_model->edit_learner_card($id);
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/edit_learner_fees');
		$this->load->view('backend/template_footer');
			
	}

	public function update_learner_fees(){

		$LearnerID = $this->input->post('learner_id');
		$member_id = $this->input->post('member_id');
		$reg_no = $this->input->post('reg_no');
		$payment_date = $this->input->post('payment_date');
		$total_amount = $this->input->post('total_amount');
		$total_paid = $this->input->post('total_paid');
		$status = $this->input->post('status');

		$this->db->set('member_id', $member_id);
		$this->db->set('reg_no', $reg_no);
		$this->db->set('payment_date', $payment_date);
		$this->db->set('total_amount', $total_amount);
		$this->db->set('total_paid', $total_paid);
		$this->db->set('status', $status);
		
		$result = $this->learner_model->Update_LearnerCard($LearnerID);

		if($result){
			$msg = 'Updated successfully';
			$message = $this->msg($msg);
			redirect('Learner/index');

		}else{
			$msg = ' Failed to update!!';
			$message = $this->msg($msg);
			redirect('Learner/index');
		}
			
	}//update_learner_fees

    public function delete_learner($Id=''){

		$result = $this->learner_model->Delete_Learner($Id);
		if($result){
			$message = 'Deleted successfully';
			$this->session->set_flashdata('message', $message);
			redirect('Learner/index');	
		}else{
			$message = 'Failed to Deleted';
			$this->session->set_flashdata('message', $message);
			redirect('Learner/index');
		}
	}


}//CI_Controller

?>
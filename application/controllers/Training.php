<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Training extends Base_Controller {

	public function __construct(){
		parent:: __construct();	

		if ($this->session->userdata('user_id') == null || $this->session->userdata('user_id') < 1) {
            if ($this->router->class != 'login'){                        
                redirect(base_url());
            }
        }
		
		$this->load->model("training_model");
		$this->load->model("dashboard_model");
		$this->load->helper('User_helper');	
		$this->load->library('pdfgenerator');
	}
	

	public function index(){

		$data['message'] = array();
		$data['title'] = "LOTUS | All list";
		$data['training'] = $this->training_model->get_training();
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$data['message'] = $this->session->flashdata('message');
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/view_training');
		$this->load->view('backend/template_footer');

	}
	
	public function create(){

		$data['title'] = "LOTUS | Add New Record";
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/add_training');
		$this->load->view('backend/template_footer');
		
	}
	
	public function save_training(){

		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('member_id', 'Member Name', 'required');
		$this->form_validation->set_rules('reg_no', 'Registration No', 'required'); 
		$this->form_validation->set_rules('remarks', 'Remarks', 'required'); 

		if($this->form_validation->run() == FALSE){

			$data['notices'] = $this->dashboard_model->get_current_notice();
			$this->load->view('backend/template_header', $data);
			$this->load->view('backend/template_left');
			$this->load->view('backend/add_training');
			$this->load->view('backend/template_footer');
			return false;

		}else{

			$data['date'] = $this->input->post('date');
			$data['member_id'] = $this->input->post('member_id');
			$data['reg_no'] = $this->input->post('reg_no');
			$data['remarks'] = $this->input->post('remarks');

			$result = $this->training_model->commonInsert('tbl_training',$data);
			if($result){
				$msg = 'Record has been created successfully';
				$message = $this->msg($msg);
				redirect('Training/index');
			}else{
				$msg = 'Failed to Save!!';
				$message = $this->msg($msg);
				redirect('Training/index');
			}
			
		}//if
		
	}//save_training

	public function edit_training($id=''){
		
		$data['title'] = "LOTUS | Edit Visitor";
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$data['selected_info'] = $this->training_model->edit_training_byID($id);
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/edit_training');
		$this->load->view('backend/template_footer');
			
	}

	public function update_training(){

		$TrainingID = $this->input->post('training_id');
		$date = $this->input->post('date');
		$member_id = $this->input->post('member_id');
		$reg_no = $this->input->post('reg_no');
		$remarks = $this->input->post('remarks');

		$this->db->set('date', $date);
		$this->db->set('member_id', $member_id);
		$this->db->set('reg_no', $reg_no);
		$this->db->set('remarks', $remarks);
		

		$result = $this->training_model->Update_Training($TrainingID);

		if($result){
			$msg = 'Updated successfully!!!';
			$message = $this->msg($msg);
			redirect('Training/index');

		}else{
			$msg = 'Failed to update!!!';
			$message = $this->msg($msg);
			redirect('Training/index');
		}
			
	}//update_training

    public function DeleteTraining($Id=''){

		$result = $this->training_model->Delete_Training($Id);
		if($result){
			$message = 'Deleted successfully';
			$this->session->set_flashdata('message', $message);
			redirect('Training/index');	
		}else{
			$message = 'Failed to Deleted';
			$this->session->set_flashdata('message', $message);
			redirect('Training/index');
		}
	}

//======================== training fees Collection ============================//

	public function getCollection(){

		$data['title'] = "LOTUS | All Collected Fees Record";
		$data['training_fees'] = $this->training_model->get_training_fees();
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/view_training_fees');
		$this->load->view('backend/template_footer');

	}

	public function feesCollection(){

		$data['title'] = "LOTUS | All Collected Fees Record";
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/add_training_payment');
		$this->load->view('backend/template_footer');

	}

	public function save_payment(){

		$this->form_validation->set_rules('member_id', 'Member Name', 'required');
		$this->form_validation->set_rules('reg_no', 'Registration No', 'required');
		$this->form_validation->set_rules('payment_date', 'Date', 'required');
		$this->form_validation->set_rules('total_amount', 'Total Payable', 'required'); 
		$this->form_validation->set_rules('total_paid', 'Pay Amount', 'required');

		if($this->form_validation->run() == FALSE){

			$data['notices'] = $this->dashboard_model->get_current_notice();
			$this->load->view('backend/template_header', $data);
			$this->load->view('backend/template_left');
			$this->load->view('backend/add_training_payment');
			$this->load->view('backend/template_footer');
			return false;

		}else{

			$data['member_id'] = $this->input->post('member_id');
			$data['reg_no'] = $this->input->post('reg_no');
			$data['payment_date'] = $this->input->post('payment_date');
			$data['total_amount'] = $this->input->post('total_amount');
			$data['total_paid'] = $this->input->post('total_paid');

			$result = $this->training_model->commonInsert('tbl_training_fees',$data);
			if($result){
				$msg = 'Record has been created successfully';
				$message = $this->msg($msg);
				redirect('Training/getCollection');
			}else{
				$msg = 'Failed to Save!!';
				$message = $this->msg($msg);
				redirect('Training/getCollection');
			}
			
		}//if
		
	}//save_payment

	public function edit_training_fees($id=''){
		
		$data['title'] = "LOTUS | Edit Edit Training Fees Collection";
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$data['selected_info'] = $this->training_model->edit_trainingFees_byID($id);
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/edit_training_payment');
		$this->load->view('backend/template_footer');
			
	}

	public function update_training_fees(){

		$TrainingFeesID = $this->input->post('trainingfees_id');
		$member_id = $this->input->post('member_id');
		$reg_no = $this->input->post('reg_no');
		$payment_date = $this->input->post('payment_date');
		$total_amount = $this->input->post('total_amount');
		$total_paid = $this->input->post('total_paid');

		$this->db->set('member_id', $member_id);
		$this->db->set('reg_no', $reg_no);
		$this->db->set('payment_date', $payment_date);
		$this->db->set('total_amount', $total_amount);
		$this->db->set('total_paid', $total_paid);
		

		$result = $this->training_model->Update_TrainingFees($TrainingFeesID);

		if($result){
			$msg = 'Updated successfully!!!';
			$message = $this->msg($msg);
			redirect('Training/getCollection');

		}else{
			$msg = 'Failed to update!!!';
			$message = $this->msg($msg);
			redirect('Training/getCollection');
		}
			
	}//update_training_fees

//==================================================================//

	public function CheckTrainingPaymentRecord(){

		$data['title'] = "LOTUS | View Training Payment Record";
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/check_training_payment');
		$this->load->view('backend/template_footer');

	}

	public function ViewTrainingPaymentRecord(){

		$data['title'] = "LOTUS | View Training Payment Record";
		$MemberID = $this->input->post('member_id');
		$data['selected_info'] = $this->training_model->get_trainingPaymentRecord_ByID($MemberID);
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/view_training_payment_record');
		$this->load->view('backend/template_footer');

	}

	public function get_pdfdetails($MemberID=''){

		$data['selected_info'] = $this->training_model->get_trainingPaymentDetails_byID($MemberID);
		$data['member_report'] = $this->training_model->get_MemberName($MemberID);
		$memberName = $data['member_report']->first_name.' '.$data['member_report']->last_name;
		//$this->load->view('backend/trainingpayment_pdfreport',$data);
		$view_file = $this->load->view('backend/trainingpayment_pdfreport',$data,true);
		$filename = 'Report-of-'.$memberName;
		$this->pdfgenerator->generate($view_file, $filename, true, 'A4', 'portrait');  
	}

}//CI_Controller

?>
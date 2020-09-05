<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Examination extends Base_Controller {

	public function __construct(){
		parent:: __construct();	

		if ($this->session->userdata('user_id') == null || $this->session->userdata('user_id') < 1) {
                   
            if ($this->router->class != 'login'){                        
                redirect(base_url());
            }
        }
		
		$this->load->model("examination_model");
		$this->load->model("dashboard_model");
		$this->load->helper('User_helper');	
	}
	

	public function index(){

		$data['message'] = array();
		$data['title'] = "LOTUS | All Examinee list";
		$data['examinee'] = $this->examination_model->get_examinee();
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$data['message'] = $this->session->flashdata('message');
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/view_examinee');
		$this->load->view('backend/template_footer');

	}
	
	public function create(){

		$data['title'] = "LOTUS | Add New Examinee";
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/add_examinee');
		$this->load->view('backend/template_footer');
		
	}
	

	public function save_examinee(){

		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('member_id', 'Examinee Name', 'required');
		$this->form_validation->set_rules('reg_no', 'Reg No', 'required');
		$this->form_validation->set_rules('total_amount', 'Total Amount', 'required');
		$this->form_validation->set_rules('exam_fees', 'Exam Fees', 'required');
		$this->form_validation->set_rules('purpose', 'Purpose', 'required');

		if($this->form_validation->run() == FALSE){

			$data['notices'] = $this->dashboard_model->get_current_notice();
			$this->load->view('backend/template_header', $data);
			$this->load->view('backend/template_left');
			$this->load->view('backend/add_examinee');
			$this->load->view('backend/template_footer');
			return false;

		}else{

			$data['date'] = $this->input->post('date');
			$data['member_id'] = $this->input->post('member_id');
			$data['reg_no'] = $this->input->post('reg_no');
			$data['total_amount'] = $this->input->post('total_amount');
			$data['exam_fees'] = $this->input->post('exam_fees');
			$data['purpose'] = $this->input->post('purpose');
			$data['created_datetime'] = date("Y-m-d h:i:s");

			//$this->debug($data);

			$result = $this->examination_model->commonInsert('tbl_examination',$data);
			if($result){
				$msg = 'Record has been created successfully';
				$message = $this->msg($msg);
				redirect('Examination/index');
			}else{
				$msg = 'Failed to save!!';
				$message = $this->msg($msg);
				redirect('Examination/index');
			}
			
		}//if
		
	}//save_examinee

	public function edit_examinee($id=''){
		
		$data['title'] = "LOTUS | Edit Visitor";
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$data['selected_info'] = $this->examination_model->selected_info_byID($id);
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/edit_examinee');
		$this->load->view('backend/template_footer');
			
	}

	public function update_examinee(){

		$ExamID = $this->input->post('exam_id');
		$date = $this->input->post('date');
		$member_id = $this->input->post('member_id');
		$reg_no = $this->input->post('reg_no');
		$exam_fees = $this->input->post('exam_fees');
		$purpose = $this->input->post('purpose');

		$this->db->set('date', $date);
		$this->db->set('member_id', $member_id);
		$this->db->set('reg_no', $reg_no);
		$this->db->set('exam_fees', $exam_fees);
		$this->db->set('purpose', $purpose);

		$result = $this->examination_model->Update_Examinee($ExamID);

		if($result){
			$msg = 'Updated successfully';
			$message = $this->msg($msg);
			redirect('Examination/index');

		}else{
			$msg = 'Failed to update!!';
			$message = $this->msg($msg);
			redirect('Examination/index');
		}
			
	}//update_examinee

    public function delete_examinee($Id=''){

		$result = $this->examination_model->Delete_Examinee($Id);
		if($result){
			$message = 'Deleted successfully';
			$this->session->set_flashdata('message', $message);
			redirect('Examination/index');	
		}else{
			$message = 'Failed to Deleted';
			$this->session->set_flashdata('message', $message);
			redirect('Examination/index');
		}
	}


}//CI_Controller

?>
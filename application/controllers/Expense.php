<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Expense extends Base_Controller {

	public function __construct(){
		parent:: __construct();	

		if ($this->session->userdata('user_id') == null || $this->session->userdata('user_id') < 1) {
                   
            if ($this->router->class != 'login'){                        
                redirect(base_url());
            }
        }
		
		$this->load->model("expense_model");
		$this->load->model("dashboard_model");
		$this->load->helper('User_helper');	
	}
	

	public function index(){

		$data['message'] = array();
		$data['title'] = "LOTUS | All Daily Expense List";
		$data['expense'] = $this->expense_model->get_daily_expense();
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$data['message'] = $this->session->flashdata('message');
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/view_expense');
		$this->load->view('backend/template_footer');

	}
	
	public function create(){

		$data['title'] = "LOTUS | Add New Expense";
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/add_expense');
		$this->load->view('backend/template_footer');
		
	}
	
	public function save_expense(){

		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('total_amount', 'Total Amount', 'required');
		$this->form_validation->set_rules('purpose', 'Purpose', 'required'); 

		if($this->form_validation->run() == FALSE){

			$data['notices'] = $this->dashboard_model->get_current_notice();
			$this->load->view('backend/template_header', $data);
			$this->load->view('backend/template_left');
			$this->load->view('backend/add_expense');
			$this->load->view('backend/template_footer');
			return false;

		}else{

			$data['expense_by'] = $this->session->userdata('user_name');
			$data['date'] = $this->input->post('date');
			$data['total_amount'] = $this->input->post('total_amount');
			$data['purpose'] = $this->input->post('purpose');

			$result = $this->expense_model->commonInsert('tbl_expense',$data);
			if($result){
				$msg = 'New Record has been created successfully!!!';
				$message = $this->msg($msg);
				redirect('Expense/index');
			}else{
				$msg = 'Failed to save!!!';
				$message = $this->msg($msg);
				redirect('Expense/index');
			}
			
		}//if
		
	}//save_expense

	public function Edit_Expense($id=''){
		
		$data['title'] = "LOTUS | Edit Learner Card Info";
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$data['selected_info'] = $this->expense_model->edit_daily_expense($id);
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/edit_expense');
		$this->load->view('backend/template_footer');
			
	}

	public function update_expense(){

		$ExpenseID = $this->input->post('expense_id');
		$date = $this->input->post('date');
		$total_amount = $this->input->post('total_amount');
		$purpose = $this->input->post('purpose');

		$this->db->set('date', $date);
		$this->db->set('total_amount', $total_amount);
		$this->db->set('purpose', $purpose);
		
		$result = $this->expense_model->Update_Expense($ExpenseID);

		if($result){
			$msg = 'Updated successfully';
			$message = $this->msg($msg);
			redirect('Expense/index');

		}else{
			$msg = ' Failed to update!!';
			$message = $this->msg($msg);
			redirect('Expense/index');
		}
			
	}//update_expense

    public function DeleteExpense($Id=''){

		$result = $this->expense_model->Delete_DailyExpense($Id);
		if($result){
			$message = 'Deleted successfully';
			$this->session->set_flashdata('message', $message);
			redirect('Expense/index');	
		}else{
			$message = 'Failed to Deleted';
			$this->session->set_flashdata('message', $message);
			redirect('Expense/index');
		}
	}


}//CI_Controller

?>
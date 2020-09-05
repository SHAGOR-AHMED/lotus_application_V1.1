<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Visitor extends Base_Controller {

	public function __construct(){
		parent:: __construct();	

		if ($this->session->userdata('user_id') == null || $this->session->userdata('user_id') < 1) {
                   
            if ($this->router->class != 'login'){                        
                redirect(base_url());
            }
        }
		
		$this->load->model("visitor_model");
		$this->load->model("dashboard_model");
		$this->load->helper('User_helper');	
	}
	

	public function index(){

		$data['message'] = array();
		$data['title'] = "LOTUS | All Visitor list";
		$data['visitor'] = $this->visitor_model->get_visitor();
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$data['message'] = $this->session->flashdata('message');
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/view_visitor');
		$this->load->view('backend/template_footer');

	}
	
	public function create(){

		$data['title'] = "LOTUS | Add New Visitor";
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/add_visitor');
		$this->load->view('backend/template_footer');
		
	}
	

	public function save_visitor(){

		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('name', 'Visitor Name', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required|max_length[11]');
		$this->form_validation->set_rules('bike_ride', 'Can Ride Bike', 'required');
		$this->form_validation->set_rules('license', 'Have License', 'required'); 
		$this->form_validation->set_rules('training', 'Need Training', 'required'); 
		$this->form_validation->set_rules('remarks', 'Remarks', 'required'); 

		if($this->form_validation->run() == FALSE){

			$data['notices'] = $this->dashboard_model->get_current_notice();
			$this->load->view('backend/template_header', $data);
			$this->load->view('backend/template_left');
			$this->load->view('backend/add_visitor');
			$this->load->view('backend/template_footer');
			return false;

		}else{

			$data['date'] = $this->input->post('date');
			$data['name'] = $this->input->post('name');
			$data['address'] = $this->input->post('address');
			$data['mobile'] = $this->input->post('mobile');
			$data['bike_ride'] = $this->input->post('bike_ride');
			$data['license'] = $this->input->post('license');
			$data['training'] = $this->input->post('training');
			$data['next_meeting_date'] = $this->input->post('next_meeting_date');
			$data['remarks'] = $this->input->post('remarks');
			//$data['created_datetime'] = date("Y-m-d h:i:s");

			$result = $this->visitor_model->commonInsert('tbl_visitor',$data);
			if($result){
				$msg = $data['name'].' has been created successfully';
				$message = $this->msg($msg);
				redirect('Visitor/index');
			}else{
				$msg = $data['name'].' Failed to Add Visitor!!';
				$message = $this->msg($msg);
				redirect('Visitor/index');
			}
			
		}//if
		
	}//save_Visitor

	public function edit_visitor($id=''){
		
		$data['title'] = "LOTUS | Edit Visitor";
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$data['selected_info'] = $this->visitor_model->Visitor_edit($id);
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/edit_visitor');
		$this->load->view('backend/template_footer');
			
	}

	public function update_Visitor(){

		$VisitorID = $this->input->post('visitor_id');
		$date = $this->input->post('date');
		$name = $this->input->post('name');
		$address = $this->input->post('address');
		$mobile = $this->input->post('mobile');
		$bike_ride = $this->input->post('bike_ride');
		$license = $this->input->post('license');
		$training = $this->input->post('training');
		$next_meeting_date = $this->input->post('next_meeting_date');
		$remarks = $this->input->post('remarks');

		$this->db->set('date', $date);
		$this->db->set('name', $name);
		$this->db->set('address', $address);
		$this->db->set('mobile', $mobile);
		$this->db->set('bike_ride', $bike_ride);
		$this->db->set('license', $license);
		$this->db->set('training', $training);
		$this->db->set('next_meeting_date', $next_meeting_date);
		$this->db->set('remarks', $remarks);
		

		$result = $this->visitor_model->commonUpdate($VisitorID, 'tbl_visitor');

		if($result){
			$msg = $name.' has been updated successfully';
			$message = $this->msg($msg);
			redirect('Visitor/index');

		}else{
			$msg = $name.' Failed to update!!';
			$message = $this->msg($msg);
			redirect('Visitor/index');
		}
			
	}//update_Visitor

    public function DeleteVisitor($VisitorId=''){

		$result = $this->visitor_model->Delete_Visitor($VisitorId);
		if($result){
			$message = 'Deleted successfully';
			$this->session->set_flashdata('message', $message);
			redirect('Visitor/index');	
		}else{
			$message = 'Failed to Deleted';
			$this->session->set_flashdata('message', $message);
			redirect('Visitor/index');
		}
	}


}//CI_Controller

?>
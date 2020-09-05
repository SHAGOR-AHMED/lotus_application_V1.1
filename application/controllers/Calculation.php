<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calculation extends Base_Controller {

	public function __construct(){
		parent:: __construct();	

		if ($this->session->userdata('user_id') == null || $this->session->userdata('user_id') < 1) {
                   
            if ($this->router->class != 'login'){                        
                redirect(base_url());
            }
        }
		
		$this->load->model("calculation_model");
		$this->load->model("dashboard_model");
		$this->load->model("user_model");
		$this->load->helper('user_helper');
		$this->load->library('pdfgenerator');
	}
	

	public function index(){

		$data['title'] = "LOTUS | Our All Active Member's";
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$data['all_members'] = $this->user_model->get_members();
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/view_all_member');
		$this->load->view('backend/template_footer');

	}

	public function ViewReport($MemberID){

		$data['title'] = "LOTUS | Show All Report";
		$data['get_member'] = $this->calculation_model->get_memberInfo_byID($MemberID);
		$data['get_memberFees'] = $this->calculation_model->get_memberFees_byID($MemberID);
		$data['get_memberSubscription'] = $this->calculation_model->get_memberSubscription_byID($MemberID);
		$data['get_memberExamFee'] = $this->calculation_model->get_memberExamFee_byID($MemberID);
		$data['get_memberLearnerCardFee'] = $this->calculation_model->get_memberLearnerCardFee_byID($MemberID);
		$data['get_memberTrainingFee'] = $this->calculation_model->get_memberTrainingFee($MemberID);
		$memberName = $data['get_member']->first_name.' '.$data['get_member']->last_name;
		//$this->debug($data);
		$view_file = $this->load->view('backend/member_report',$data,true);
		$filename = 'Report-for-'.$memberName;
		$this->pdfgenerator->generate($view_file, $filename, true, 'A4', 'portrait');  
		
	}

	public function OfficialCalculation(){

		$data['title'] = "LOTUS | Official Calculation";
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$data['get_memberLearnerCardFee'] = $this->calculation_model->get_memberLearnerCardFee();
		$data['get_expense'] = $this->calculation_model->get_totalExpense();
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/view_calculation');
		$this->load->view('backend/template_footer');
	}

//=========================================================================//

	public function ViewAllCollection(){

		$data['title'] = "LOTUS | View All Collection";
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$data['get_memberFees'] = $this->calculation_model->get_memberFee();
		$data['get_memberSubscription'] = $this->calculation_model->get_memberSubscription();
		$data['get_memberLearnerCardFee'] = $this->calculation_model->get_memberLearnerCardFee();
		$data['get_memberTrainingFee'] = $this->calculation_model->get_TrainingFee();
		//$data['get_memberExamFee'] = $this->calculation_model->get_memberExamFee();
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/view_collection');
		$this->load->view('backend/template_footer');
	}

//=====================================================================//

	public function getExpense(){

		$data['message'] = array();
		$data['title'] = "LOTUS | All Expense From Collection";
		$data['expense'] = $this->calculation_model->get_expense();
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$data['message'] = $this->session->flashdata('message');
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/view_collection_expense');
		$this->load->view('backend/template_footer');

	}

	public function AddExpense(){

		$data['title'] = "LOTUS | View All Expense From Collections";
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/add_collection_expense');
		$this->load->view('backend/template_footer');
	}

	public function save_expense(){

		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('amount', 'Total Amount', 'required');
		$this->form_validation->set_rules('purpose', 'Purpose', 'required'); 

		if($this->form_validation->run() == FALSE){

			$data['notices'] = $this->dashboard_model->get_current_notice();
			$this->load->view('backend/template_header', $data);
			$this->load->view('backend/template_left');
			$this->load->view('backend/add_collection_expense');
			$this->load->view('backend/template_footer');
			return false;

		}else{

			$data['expense_by'] = $this->session->userdata('user_name');
			$data['date'] = $this->input->post('date');
			$data['amount'] = $this->input->post('amount');
			$data['purpose'] = $this->input->post('purpose');

			$result = $this->calculation_model->commonInsert('tbl_collection_expense',$data);

			if($result){
				$msg = 'New Record has been created successfully!!!';
				$message = $this->msg($msg);
				redirect('Calculation/getExpense');
			}else{
				$msg = 'Failed to save!!!';
				$message = $this->msg($msg);
				redirect('Calculation/getExpense');
			}
			
		}//if
		
	}//save_expense

//=======================================================================//

	public function ViewCalculation(){

		$data['title'] = "LOTUS | View All Expense From Collections";
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$data['get_memberFees'] = $this->calculation_model->get_memberFee();
		$data['get_memberSubscription'] = $this->calculation_model->get_memberSubscription();
		$data['get_memberExamFee'] = $this->calculation_model->get_memberExamFee();
		$data['get_memberLearnerCardFee'] = $this->calculation_model->get_memberLearnerCardFee();
		$data['get_memberTrainingFee'] = $this->calculation_model->get_TrainingFee();
		$data['get_collectionExpense'] = $this->calculation_model->get_collectionExpenseFee();
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/view_collection_calculation');
		$this->load->view('backend/template_footer');
	}

	// public function get_Calculation_byID(){

		// 	$data['title'] = "Show Calculation";
		// 	$data['notices'] = $this->dashboard_model->get_current_notice();
		// 	$MemberID = $this->input->post('member_id');
		// 	$data['selected_info'] = $this->calculation_model->get_amount_byID($MemberID);
		// 	$this->load->view('backend/template_header', $data);
		// 	$this->load->view('backend/template_left');
		// 	$this->load->view('backend/show_member_payment');
		// 	$this->load->view('backend/template_footer');

	// }

	// public function PendingApproval(){

	// 	$data['title'] = "OHMS | Waiting for Admin Approval";
	// 	$data['notices'] = $this->dashboard_model->get_current_notice();
	// 	$data['get_amount'] = $this->calculation_model->get_all_pendingAmount();
	// 	$data['message'] = $this->session->flashdata('message');
	// 	$this->load->view('backend/template_header', $data);
	// 	$this->load->view('backend/template_left');
	// 	$this->load->view('backend/view_pending_calculation');
	// 	$this->load->view('backend/template_footer');
	// }

	// public function ApprovePayment($ID=''){

	// 	$result = $this->calculation_model->approve_payment_byID($ID);

	// 	if($result){

	// 		$msg = 'Payment Approve Successfully.!!';
	// 		$message = $this->msg($msg);
	// 		redirect('Calculation/PendingApproval');

	// 	}else{

	// 		$msg = 'Failed to Approve.!!';
	// 		$message = $this->msg($msg);
	// 		redirect('Calculation/PendingApproval');

	// 	}

	// }//ApprovePayment


}//CI_Controller

?>
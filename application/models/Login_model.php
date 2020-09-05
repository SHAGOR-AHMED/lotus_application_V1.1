<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model{
	
	public function __construct(){
		parent:: __construct();		
	}
    
    public function validate($user_name,$password){
		
		$result = $this->db->select('*')->from('user')->where('user_name',$user_name)->where('password',$password)->get()->row();

		return $result;
    }

    public function check_member_login($user_name,$password){

    	$result = $this->db->select('*')->from('tbl_members')->where('user_name',$user_name)->where('password',$password)->get()->row();

		return $result;	
    }

    public function check_guardian_login($user_name,$password){

    	$result = $this->db->select('*')->from('tbl_members')->where('gardian_email',$user_name)->where('gardian_contact',$password)->get()->row();

		return $result;	
    }


}//End CI_MODEL

?>
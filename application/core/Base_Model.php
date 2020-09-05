<?php

class Base_Model extends CI_Model{

    public function debug($data){

        echo "<pre>";
        print_r($data);
        exit();
    }

    public function commonInsert($tbl, $data){

        return $this->db->insert($tbl, $data);
    }

    public function commonUpdate($VisitorID, $tbl){

        return $this->db->where('visitor_id', $VisitorID)->update($tbl);

    }

    public function get_MemberName($MemberID){

        return $this->db->select('tbl_members.first_name,tbl_members.last_name')->from('tbl_members')->where('mem_id', $MemberID)->get()->row();

    }

}//Base_Model

?>
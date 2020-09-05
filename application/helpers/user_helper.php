<?php

function getMembers()
{
    $ci = &get_instance();
    $ci->load->database();
    $data = $ci->db->select('mem_id,first_name,last_name')->from('tbl_members')->get()->result();
    echo '<option value="0">-- Select a member  --</option>';
    foreach ($data as $dd) {
        echo '<option value="' . $dd->mem_id . '" >  ' . $dd->first_name .' '.$dd->last_name. '</option><br />';
    }
}


function getAllCountryList()
{
    $ci =& get_instance();
    $ci->load->database();
    $data = $ci->db->select('*')->from('countries')->get()->result();

    foreach ($data as $d) {
        echo '<option value="' . $d->id . '" />  ' . $d->con_name . '<br />';
    }

}

function getAllStatesByCountryId($country_id)
{
    $ci =& get_instance();
    $ci->load->database();
    $data = $ci->db->select('*')->from('states')->where('country_id', $country_id)->get()->result();
    $out = '';
    foreach ($data as $dd) {
        $out .= '<option value="' . $dd->id . '" >  ' . $dd->st_name . '</option><br />';
    }
    echo empty($out) ? 'Not Set' : $out;
}

function SelectedInfo($val){
    
    switch ($val) {
        case 1:
            echo "Yes";
            break;
        case 2:
            echo "No";
            break;
        default:
            echo "";
    }
}

function SelectedMonth($val){
    
    switch ($val) {
        case 1:
            echo "January";
            break;
        case 2:
            echo "February";
            break;
        case 3:
            echo "March";
            break;
        case 4:
            echo "April";
            break;
        case 5:
            echo "May";
            break;
        case 6:
            echo "Jun";
            break;
        case 7:
            echo "July";
            break;
        case 8:
            echo "August";
            break;
        case 9:
            echo "September";
            break;
        case 10:
            echo "October";
            break;
        case 11:
            echo "November";
            break;
        case 12:
            echo "December";
            break;
        default:
            echo "";
    }
}

function SelectedStatus($val){
    
    switch ($val) {
        case 1:
            echo "<p style='color:green;font-weight:bold;'>"."PAID"."</p>";
            break;
        case 2:
            echo "<p style='color:#ff0000;font-weight:bold;'>"."NOT PAID"."</p>";
            break;
        default:
            echo "";
    }
}

function generatePaymentMethod($val){
	
	switch ($val) {
		case 1:
			echo "By Cash";
			break;
		case 2:
			echo "bKash";
			break;
		case 3:
			echo "Debit Card";
			break;
		case 4:
			echo "Credit Card";
			break;
		case 5:
			echo "DBBL";
			break;
		default:
			echo "";
	}
}
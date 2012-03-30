<?php
Class Quality_model extends CI_Model
{
	function Quality_model()
	{
		parent::__construct();
	}
	
	function get_sale_list($sdate_unix)
	{
		//extract date
		$date = mdate("%Y-%m-%d", $sdate_unix);
		
		$stats = $this->db->get_where('trck_sales', array('appt_date >=' => $date.' 00:00:00', 'appt_date <=' => $date.' 59:59:59'));
		
		return $stats;
	}
	
	function generate_excel($sdate_unix)
	{
		
		$sales = $this->get_sale_list($sdate_unix);
		
		$field_count = $sales->num_fields(); 
		
		$fields = $sales->list_fields();
		
		$row_count = $sales->num_rows();
		
		$this->session->set_userdata(array('report_header' => $fields));
		
		//Print rows in excel
		$j = 0;
		$session_value = array();
		foreach ($sales->result() as $row)
		{
			for ($i = 0; $i < $field_count; ++$i) {
				$field_name = $fields[$i];
				$session_value[$j][$i] = $row->$field_name." ";
			}
			$j++;
		}
		
		return array('report_header' => $fields, 'report_values' => $session_value);
	}
}
<?php
Class Record_model extends CI_Model
{
	function Record_model()
	{
		parent::__construct();
	}
	
	function view($id)
	{
		$info = $this->db->get_where('trck_sales', array('id' => $id));
		
		return $info;
	}
	
	function update($id, $data)
	{
		$info = array(
			'app_name' => $data['app_name'],
			'actv_date' => $data['actv_date'],
			'appt_time' => $data['appt_time'],
			'ADSL_NO' => $data['ADSL_NO'],
			'mobile_no' => $data['mobile_no'],
			'inst_add' => $data['inst_add'],
			'NRIC' => $data['NRIC'],
			'remarks' => $data['remarks'],
		);
		
		$this->db->where('id', $id);
		$this->db->update('trck_sales', $info); 
	}
}
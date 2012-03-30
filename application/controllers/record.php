<?php
Class Record extends CI_Controller 
{
	
	function Record()
	{
		parent::__construct();
		
		$this->load->model('Quality_model');
		$this->load->model('Manager_model');
		$this->load->model('Record_model');
	}
	
	function view($id)
	{
		if(isset($_POST['update'])) {
			
			$this->Record_model->update($id, $_POST);
			
		}
		
		$info = $this->Record_model->view($id);
		
		$data = array('info' => $info);
		
		$this->load->view('record/view', array('data' => $data));
	}
}
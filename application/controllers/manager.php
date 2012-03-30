<?php
Class Manager extends CI_Controller 
{
	
	function Manager()
	{
		parent::__construct();
		
		if($this->session->userdata('user_type') != 'manager')
		{
			redirect(base_url().'login', 'refresh');
		}
		
		$this->load->model('Manager_model');
		
		$this->load->helper('date');
	}
	
	function index() {
		redirect(base_url().'manager/stats/', 'refresh');
	}
	
	
	function stats($sdate_unix = NULL)
	{
		if($this->input->post('mdate')) {
			
			$date = strtotime($this->input->post('mdate'));
			
			redirect(base_url().'manager/stats/'.$date, 'refresh');
			
		}
		
		if(NULL == $sdate_unix) {
			//get current date
			$format = 'DATE_RFC1123';
			
			$sdate_unix = time() + 28800;
			
			$sdate_human = unix_to_human($sdate_unix);
			
		}
		
		$team_stats = $this->Manager_model->get_team_stats($sdate_unix);
		
		$agent_stats = $this->Manager_model->get_agent_stats($sdate_unix);
		
		$campaign_stats = $this->Manager_model->get_campaign_stats($sdate_unix);
		
		$date = mdate("%Y-%m-%d", $sdate_unix);
		
		$data = array('team_stats' => $team_stats, 'agent_stats' => $agent_stats, 'date' => $date, 'date_unix' => $sdate_unix, 'campaign_stats' => $campaign_stats);
		
		$this->load->view('manager/default', array('data' => $data));
	}
	
	function view_sales($agent, $sdate_unix)
	{
		if($this->input->post('mdate')) {
			
			$sdate_unix = strtotime($this->input->post('mdate'));
			
		}
		
		$agent_sales = $this->Manager_model->agent_sales($agent, $sdate_unix);
		
		$date = mdate("%Y-%m-%d", $sdate_unix);
		
		$data = array('sales' => $agent_sales, 'date' => $date, 'agent_id' => $agent);
		
		$this->load->view('manager/view_sales', array('data' => $data));
	}
}
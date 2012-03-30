<?php
Class Login extends CI_Controller 
{
	
	function Login()
	{
		parent::__construct();
		
		$this->load->model('Login_model');
	}
	
	/*
	function index()
	{
		$this->form_validation->set_rules('username','Username','trim|xss_clean|required');
		
		if($this->form_validation->run() == FALSE) {
			
			$this->load->view('login/default');
			
		} else {
			
			$username = $this->input->post('username');
			
			$record = $this->Login_model->login($username);
			
			if(FALSE != $record) {
				
				$this->init($record);
				
			} else {
			
				$this->load->view('login/default', array('error' => 'Invalid Username'));
				
			}
			
		}
	}
	
	
	function index()
	{
		redirect('login/login2', 'refresh');
	}
	*/
	function index()
	{
		$this->form_validation->set_rules('username','Username','trim|xss_clean|required');
		$this->form_validation->set_rules('password','Password','trim|xss_clean|required');
		
		if($this->form_validation->run() == FALSE) {
			
			$this->load->view('login/login');
			
		} else {
			
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			$record = $this->Login_model->login($username, $password);
			
			if(FALSE != $record) {
				
				$this->init($record);
				
			} else {
			
				$this->load->view('login/login', array('error' => 'Invalid Username/Password'));
				
			}
			
		}
	}
	
	function register()
	{
		$this->form_validation->set_rules('username','Username','trim|xss_clean|required');
		$this->form_validation->set_rules('password','Password','trim|xss_clean|required|matches[password_conf]');
		$this->form_validation->set_rules('password_conf','Password Confirm','trim|xss_clean|required');
		
		if($this->form_validation->run() == FALSE) {
			
			$this->load->view('login/register');
			
		} else {
			
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			$record = $this->Login_model->register($username, $password);
			
			if(FALSE != $record) {
				$this->session->set_flashdata('alert', 'Password update success! You may now login.');
				redirect('login','refresh');
				
			} else {
			
				$this->load->view('login/register', array('error' => 'Username dont exist or Password was already set for this Username'));
				
			}
			
		}
	}
	
	private function init($info)
	{
		switch($info['user_type']) {
			
			case 1:
				$controller = 'manager';
				break;
			case 2:
				$controller = 'user';
				break;
			case 3:
				$controller = 'quality';
				break;
		}
		
		$this->session->set_userdata('user_type', $controller);
		$this->session->set_userdata('username', $info['username']);
		
		redirect(base_url().$controller, 'refresh');
	}
	
	function logout()
	{
		$this->session->set_userdata('user_type', NULL);
		$this->session->set_userdata('username', NULL);
		
		redirect(base_url().'login', 'refresh');
	}

}
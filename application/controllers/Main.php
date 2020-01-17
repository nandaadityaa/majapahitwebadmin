<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends MY_Controller {

	public function __construct ()
	{
		parent :: __construct ();

		//memanggil model admin_m untuk database 
		$this->load->model(array(
			'auth_m' 
		));
	} 

	public function logout(){ 
		// $hapus_session=$this->session->unset_userdata('se_username');
		// $this->auth_m->logout();
		// redirect(base_url());
		$this->session->sess_destroy();
		redirect(base_url('index.php/main/login'));
		
	}
	 
	public function login(){
		if ($this->input->post('submit')) 
		{
			if ($this->auth_m->login()) { 					
			    redirect('dashboard/dashboard');
			}else{
				setError('Username dan password tidak valid');
			}
		}
		$this->load->view('template/login.php');
	}
}

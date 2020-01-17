<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	public $module = array('dashboard/dashboard', 'dashboard');
	public $url;

	public function __construct ()
	{
		parent :: __construct ();
		// cek apakah login
		//$this->auth_m->is_secure_redirect();

		//memanggil model admin_m untuk database 
		$this->load->model(array(
			'dashboard_m',
			//'anggota_m'
		));
	}

	public function index(){
	    
		$this->render_page('dashboard/dashboard');#, array('data'=> $data,'data1'=> $data,'data2'=> $data));
	}
	
}
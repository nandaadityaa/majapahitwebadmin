<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends MY_Controller {

	public $module = array('user/user', 'user');
	public $url;
	public function __construct ()
	{  
		parent :: __construct ();
		$this->load->library(array('PHPExcel','PHPExcel/IOFactory','form_validation','upload'));
		//memanggil model admin_m untuk database 
		$this->load->model(array(
			'user_m',
		)); 
	}
	//delete
	public function delete ($idx)
	{
		//var_dump($idx);exit();
		$this->user_m->hapus_data($idx);
		redirect ($this->module[0].'/list_user');
	}

	public function list_user (){
		if ($this->input->post('submit'))
		{
		}
		$this->load->helper('pagination'); 
		$this->params['param'] 	= $this->user_m->data();
		$this->params['data'] = $this->user_m->data_user();
		$this->render_page('user/list_user');
	}
	public function tambah(){
		if ($this->input->post('submit')){
			$this->user_m->tambah();
			redirect('/user/user/list_user/'); 
		}
		$this->render_page('user/tambah_user');
	}

	public function update ($idx){
		if ($this->input->post('submit')){
			$this->user_m->update($idx);
			redirect('/user/user/list_user/'); 
		}


		$this->load->helper('pagination');
		$this->params['data'] = $this->user_m->get_edit($idx);
		
		$this->render_page('user/update_user');
	}
	
}
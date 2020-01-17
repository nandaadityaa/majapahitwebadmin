<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends MY_Controller {

	public $module = array('admin/admin', 'admin');
	public $url;
	public function __construct ()
	{  
		parent :: __construct ();
		$this->load->library(array('PHPExcel','PHPExcel/IOFactory','form_validation','upload'));
		//memanggil model admin_m untuk database 
		$this->load->model(array(
			'admin_m',
		)); 
	}
	//delete
	public function delete ($idx)
	{
		//var_dump($idx);exit();
		$this->admin_m->hapus_data($idx);
		redirect ($this->module[0].'/list_admin');
	}

	public function list_admin (){
		if ($this->input->post('submit'))
		{
		}
		$this->load->helper('pagination'); 
		$this->params['param'] 	= $this->admin_m->data();
		$this->params['data'] = $this->admin_m->data_admin();
		$this->render_page('admin/list_admin');
	}
	public function tambah(){
		if ($this->input->post('submit')){
			$this->admin_m->tambah();
			redirect('/admin/admin/list_admin/'); 
		}
		$this->render_page('admin/tambah_admin');
	}

	public function update ($idx){
		if ($this->input->post('submit')){
			$this->admin_m->update($idx);
			redirect('/admin/admin/list_admin/'); 
		}


		$this->load->helper('pagination');
		$this->params['data'] = $this->admin_m->get_edit($idx);
		$this->render_page('admin/update_admin');
	}
	
}
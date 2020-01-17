<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Hadiah extends MY_Controller {

	public $module = array('hadiah/hadiah', 'hadiah');
	public $url;
	public function __construct ()
	{
		parent :: __construct ();
		$this->load->library(array('PHPExcel','PHPExcel/IOFactory','form_validation','upload'));
		//memanggil model admin_m untuk database 
		$this->load->model(array(
			'user_m',
			'hadiah_m'
		));
	} 
	
	//delete
	public function delete ($idx)
	{
		//var_dump($idx);exit();
		$this->hadiah_m->hapus_data($idx);
		redirect ($this->module[0].'/list_hadiah');
	}
	
	public function tambah (){
		if ($this->input->post('submit')){
			//var_dump($this->input->post('save'));exit();
			$this->hadiah_m->tambah();
			redirect('/hadiah/hadiah/list_hadiah/'); 
		}
		$this->render_page('hadiah/upload');
	}

	public function update ($idx){ 
		if ($this->input->post('submit')){
			$this->hadiah_m->update($idx);
			redirect('/hadiah/hadiah/list_hadiah/'); 
		}


		$this->load->helper('pagination');
		$this->params['data'] = $this->hadiah_m->get_edit($idx);
		$this->render_page('hadiah/edit_hadiah');
	}
	public function list_hadiah (){
		if ($this->input->post('submit'))
			//var_dump(($this->input->post('submit')));exit();
		{
		}
		$this->load->helper('pagination'); 
		$this->params['param'] 	= $this->hadiah_m->data();
		$this->params['data'] = $this->hadiah_m->data_hadiah();
		// loop and implode to create an url exist
		 
		$this->render_page('hadiah/list_hadiah');
	}
}
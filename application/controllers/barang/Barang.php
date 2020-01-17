<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Barang extends MY_Controller {

	public $module = array('barang/barang', 'barang');
	public $url;
	public function __construct ()
	{
		parent :: __construct ();
		$this->load->library('upload');
		//memanggil model admin_m untuk database 
		$this->load->model(array(
			'Barang_m', 
		));
	}
	public function list_barang (){
		$this->load->helper('pagination');
		$this->params['param'] 	= $this->Barang_m->data();
		$this->params['data'] = $this->Barang_m->data_barang();
		// loop and implode to create an url exist
		$this->render_page('barang/barang');
	}

	public function tambah(){
		if ($this->input->post('submit')){
			$this->Barang_m->tambah();
			redirect('/barang/barang/list_barang/'); 
		}
		$this->render_page('barang/tambah');
	}

	public function update ($idx){
		if ($this->input->post('submit')){
			$this->Barang_m->update($idx);
			redirect('/barang/barang/list_barang/'); 
		}


		$this->load->helper('pagination');
		$this->params['data'] = $this->Barang_m->get_edit($idx);
		$this->render_page('barang/update');
	}
	
	//delete
	public function delete ($idx)
	{
		//var_dump($idx);exit();
		$this->Barang_m->hapus_data($idx);
		redirect ($this->module[0].'/list_barang');
	}
}
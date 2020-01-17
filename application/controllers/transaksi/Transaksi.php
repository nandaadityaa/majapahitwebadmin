<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Transaksi extends MY_Controller {
 
	public $module = array('transaksi/transaksi', 'transaksi');
	public $url;
	public function __construct ()
	{
		parent :: __construct ();
		$this->load->library('upload');
		//memanggil model admin_m untuk database  
		$this->load->model(array(
			'transaksi_m', 
			'barang_m',
			'user_m'
		)); 
	}
	
	public function list_transaksi (){
		$this->params['data'] 	= $this->transaksi_m->get_data_transaksi();
		$this->render_page('transaksi/list_transaksi');
	}
	public function lihat_detail ($idx){
		$this->load->helper('pagination');
		$this->params['data'] = $this->transaksi_m->get_detail($idx);
		$this->render_page('transaksi/list_detail');
	}
	public function tambah_transaksi(){
		if ($this->input->post('submit')){
			$this->transaksi_m->tambah_transaksi();
			$this->transaksi_m->tambah_detail_transaksi();
			$this->transaksi_m->tambah_point();
			redirect('/transaksi/transaksi/list_transaksi/'); 
		}
		$this->params['pemiliks'] 	= $this->barang_m->dropdown_barang();
		$this->params['pemilik'] 	= $this->user_m->dropdown_user();
		$this->render_page('transaksi/tambah_transaksi');
	}

	public function ambil_harga_barang()
	{
		$kode_barang = $_GET['kode_barang'];

		$harga= $this->db->query("SELECT * FROM tb_barang WHERE nama_barang='$kode_barang'");
		#var_dump("SELECT * FROM tb_barang WHERE nama_barang='$kode_barang'");exit();
		foreach ($harga->result() as $data)
		{
		    echo $data->harga;
		}
	}
	
	//insert
}
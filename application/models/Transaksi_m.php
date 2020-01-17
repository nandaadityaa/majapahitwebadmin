<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Transaksi_m extends MY_Model{
    public function __construct ()
    {
        parent :: __construct ();
        
        $this->tableName = 'transaksi';
        $this->idx       = 'kode_transaksi';
        $this->fields    = array(
            'nama_cust'    => array('Nama Customer', TRUE),
        );
        $this->data = array(
            'nama_cust'           => $this->input->get('nama_cust'),
        );
        $this->page         = $this->input->get('page') != 0 ? ((int) ($this->input->get('page') - 1) * 100) : 0;
    }
    public function data ()
    {
        return $this->data;
    }

    public function tambah_transaksi(){ 
        $kode_transaksi       = $this->input->post('kode_transaksi'); 
        $kode_user       = $this->input->post('kode_user');
        $tgl_input       = date('Y-m-d H:i:s'); 
        $adm_input       = $this->auth_m->data('nama_admin'); 
        $data= array( 
            'kode_transaksi'        => $kode_transaksi, 
            'nama_cust'  => $kode_user,
            'tgl_input'   => $tgl_input,
            'adm_input'   => $adm_input,
            
        );
        $this->db->insert('transaksi',$data);
    }

    public function tambah_point()
    {
        $kode_user       = $this->input->post('kode_user');
        $query = $this->db->query("SELECT point from tb_user where kode_user='$kode_user'");
        foreach ($query->result() as $key) {
            $point = $key->point;
        }
        if($point==''){
            $points = 5; 
        }else{
            $points = $point+5; 
        }
        $data= array( 
            'point'   => $points 
        );
        $this->db->where('kode_user',$kode_user);
        $this->db->update('user',$data);
    }

    public function tambah_detail_transaksi()
    { 
        $qty_produk= count($this->input->post('kode_barang'));
        $kode_transaksi= $this->input->post('kode_transaksi');
        $kode_barang = $this->input->post('kode_barang');
        $harga       = $this->input->post('harga');
        $tgl_input       = date('Y-m-d H:i:s');
        $adm_input       = $this->auth_m->data('nama_admin'); 
        if ($this->input->post('kode_transaksi'))
        {
            for($i=0; $i<$qty_produk; $i++)
            {
                $this->db->set('kode_transaksi', $kode_transaksi);
                $this->db->set('nama_barang',$kode_barang[$i]);
                $this->db->set('harga',$harga[$i]);
                $this->db->set('tgl_input',$tgl_input);
                $this->db->set('adm_input',$adm_input);
                $this->db->insert('detail_transaksi');
            }
        }
    }

    //update
     public function update($idx){ 
        $kode_hadiah       = $this->input->post('kode_hadiah'); 
        $nama_hadiah       = $this->input->post('nama_hadiah');
        $point         = $this->input->post('point'); 
        $data= array( 
            'kode_hadiah'        => $kode_hadiah, 
            'nama_hadiah'  => $nama_hadiah,
            'point'   => $point, 
            
        );
        $this->db->where('kode_hadiah',$idx);
        $this->db->update('hadiah',$data);
       
    }

    public function dropdown_hadiah() 
    {
        $arr = array();
        $sql = "SELECT kode_hadiah,nama_hadiah from tb_hadiah";
        $query = $this->db->query($sql);
        $data = parent ::get();
        if ($query)
        {
            foreach($query->result() as $d)
            {
                $arr[$d->kode_hadiah][0]= $d->kode_hadiah;
                $arr[$d->kode_hadiah][1] = $d->nama_hadiah;
            }
            
            return $arr;
        }
    }

    public function get_edit ($idx)
    { 
        $this->db->select('*');
        $this->db->from('hadiah');  
        $this->db->where('kode_hadiah',$idx); 
        $this->db->limit('100',$this->page); 
        $data = $this->db->get();
        return $data->result_array();
       
    }

    public function data_hadiah ()
    { 
        $this->db->select('*');
        $this->db->from('hadiah'); 
        $this->db->limit('100',$this->page); 
        $data = $this->db->get();
        return $data->result_array();
       
    }
    public function get_detail($idx)
    {
        $this->db->select('*,tb_transaksi.tgl_input as tgl');
        $this->db->from('detail_transaksi'); 
        $this->db->join('transaksi', 'transaksi.kode_transaksi = detail_transaksi.kode_transaksi'); 
        $this->db->join('user', 'user.kode_user = transaksi.nama_cust','left'); 
        $this->db->where('detail_transaksi.kode_transaksi', $idx);
        $data = $this->db->get();
        return $data->result_array();
    }

    public function get_data_transaksi ()
    { 
        $this->db->select('*,tb_user.nama_cust as nama_custs');
        $this->db->from('transaksi'); 
        $this->db->join('user', 'user.kode_user = transaksi.nama_cust'); 
        $data = $this->db->get();
        return $data->result_array();
    }
}
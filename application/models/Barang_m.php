<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class barang_m extends MY_Model{
    public function __construct ()
    {
        parent :: __construct ();
        
        $this->tableName = 'barang'; 
        $this->idx       = 'kode_barang';
        $this->fields    = array(
            'nama_barang'    => array('Nama barang ', TRUE),
            'harga'             => array('Harga', TRUE),
        );
        $this->data = array(
            'kode_barang'           => $this->input->get('kode_barang'),
            'nama_barang'           => $this->input->get('nama_barang'),
            'harga'           => $this->input->get('harga'),
        );
        $this->page         = $this->input->get('page') != 0 ? ((int) ($this->input->get('page') - 1) * 100) : 0;
    }
    public function data ()
    {
        return $this->data;
    }

    //simpan 
    public function tambah(){ 
        $kode_barang       = $this->input->post('kode_barang'); 
        $nama_barang       = $this->input->post('nama_barang');
        $harga              = $this->input->post('harga');
        $data= array( 
            'kode_barang'        => $kode_barang, 
            'nama_barang'  => $nama_barang,
            'harga'   => $harga
            
        );

        $this->db->insert('barang',$data);
       
    }
    public function dropdown_barang() 
    {
        $arr = array();
        $sql = "SELECT * from tb_barang";
        $query = $this->db->query($sql);
        $data = parent ::get();
        if ($query)
        {
            foreach($query->result() as $d)
            {
                $arr[$d->kode_barang][0] = $d->nama_barang;
            }
            
            return $arr;
        }
    }
    //update
     public function update($idx){ 
        $kode_barang       = $this->input->post('kode_barang'); 
        $nama_barang       = ucwords($this->input->post('nama_barang'));
        $harga              = $this->input->post('harga');
        $data= array( 
            'kode_barang'        => $kode_barang, 
            'nama_barang'  => $nama_barang,
            'harga'   => $harga
            
        );
        //var_dump($segment);exit();
        $this->db->where('kode_barang',$idx);
        $this->db->update('barang',$data);
       
    }

    public function hapus_data($idx)
    {
        $sql    = "DELETE FROM tb_barang WHERE kode_barang='$idx'";
        $query  = $this->db->query($sql);
    }

    public function data_barang ()
    { 
        $this->db->select('*');
        $this->db->from('barang'); 
        $this->db->order_by('nama_barang', 'asc');
        $this->db->limit('100',$this->page); 
        $data = $this->db->get();
        return $data->result_array();
       
    }
    public function get_edit ($idx)
    { 
        $this->db->select('*');
        $this->db->from('barang');  
        $this->db->where('kode_barang',$idx); 
        $this->db->limit('100',$this->page); 
        $data = $this->db->get();
        return $data->result_array();
       
    }

}
?>
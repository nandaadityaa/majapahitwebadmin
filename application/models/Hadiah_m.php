<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Hadiah_m extends MY_Model{
    public function __construct ()
    {
        parent :: __construct ();
        
        $this->tableName = 'hadiah';
        $this->idx       = 'kode_hadiah';
        $this->fields    = array(
            'nama_hadiah'    => array('Nama Hadiah', TRUE),
            'point'             => array('Point', TRUE),
        );
        $this->data = array(
            'kode_hadiah'           => $this->input->get('kode_hadiah'),
            'nama_hadiah'           => $this->input->get('nama_hadiah'),
            'point'           => $this->input->get('point'),
        );
        $this->page         = $this->input->get('page') != 0 ? ((int) ($this->input->get('page') - 1) * 100) : 0;
    }
    public function data ()
    {
        return $this->data;
    }

    public function tambah(){ 
        $kode_hadiah       = $this->input->post('kode_hadiah'); 
        $nama_hadiah       = $this->input->post('nama_hadiah');
        $point         = $this->input->post('point'); 
        $data= array( 
            'kode_hadiah'        => $kode_hadiah, 
            'nama_hadiah'  => $nama_hadiah,
            'point'   => $point, 
            
        );
        #var_dump($data);exit();
        $this->db->insert('hadiah',$data);
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

    public function hapus_data($idx)
    {
        $sql    = "DELETE FROM tb_hadiah WHERE kode_hadiah='$idx'";
        $query  = $this->db->query($sql);
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

    public function get_data_hadiah ()
    { 
        $this->db->select('*');
        $this->db->from('hadiah'); 
        $data = $this->db->get();
        return $data->result_array();
    }
}
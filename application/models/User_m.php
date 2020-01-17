<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_m extends MY_Model{
    public function __construct ()
    {
        parent :: __construct ();
        
        $this->tableName = 'user';
        $this->idx       = 'kode_user';
        $this->fields    = array(
            'nama_cust'    => array('Nama Customer', TRUE),
            'alamat'             => array('Alamat', TRUE),
            'no_tlp'             => array('No Tlp', TRUE),
            'point'             => array('Point', TRUE),
        );
        $this->data = array(
            'kode_user'           => $this->input->get('kode_user'),
            'nama_cust'           => $this->input->get('nama_cust'),
            'alamat'           => $this->input->get('alamat'),
            'no_tlp'           => $this->input->get('no_tlp'),
            'point'           => $this->input->get('point'),        );
        $this->page         = $this->input->get('page') != 0 ? ((int) ($this->input->get('page') - 1) * 100) : 0;
    }
    public function data ()
    {
        return $this->data;
    }

    public function tambah(){ 
        $kode_user       = $this->input->post('kode_user'); 
        $nama_cust       = $this->input->post('nama_cust'); 
        $alamat       = $this->input->post('alamat');
        $no_tlp         = $this->input->post('no_tlp'); 
        $tgl_input         = date('Y-m-d H:i:s');
        $adm_input         = $this->auth_m->data('id_admin');
        $data= array( 
            'nama_cust'        => $nama_cust, 
            'kode_user'  => $kode_user,
            'alamat'   => $alamat, 
            'no_tlp'   => $no_tlp,
            'point'   => 0,
            'tgl_input'   => $tgl_input,
            'adm_input'   => $adm_input,
            
        );
        #var_dump($data);exit();
        $this->db->insert('user',$data);
       
    }

    //update
     public function update($idx){ 
        $nama_cust       = $this->input->post('nama_cust'); 
        $alamat       = $this->input->post('alamat');
        $no_tlp         = $this->input->post('no_tlp'); 
        $data= array( 
            'nama_cust'   => $nama_cust, 
            'alamat'   => $alamat,
            'no_tlp'   => $no_tlp,
            
        );
        //var_dump($segment);exit();
        $this->db->where('kode_user',$idx);
        $this->db->update('user',$data);
       
    }
    public function get_edit ($idx)
    { 
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('kode_user',$idx); 
        $this->db->limit('100',$this->page); 
        $data = $this->db->get();
        return $data->result_array();
    }

    public function hapus_data($idx)
    {
        $sql    = "DELETE FROM tb_user WHERE kode_user='$idx'";
        $query  = $this->db->query($sql);
    }

    public function dropdown_user() 
    {
        $arr = array();
        $sql = "SELECT * from tb_user";
        $query = $this->db->query($sql);
        $data = parent ::get();
        if ($query)
        {
            foreach($query->result() as $d)
            {
                $arr[$d->kode_user][0] = $d->kode_user;
                $arr[$d->kode_user][1] = $d->nama_cust;
            }
            
            return $arr;
        }
    }

    public function data_user ()
    { 
        $this->db->select('*');
        $this->db->from('user');
        $this->db->limit('100',$this->page); 
        $data = $this->db->get();
        return $data->result_array();
       
    }
}
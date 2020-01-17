<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_m extends MY_Model{
    public function __construct ()
    {
        parent :: __construct ();
        
        $this->tableName = 'admin';
        $this->idx       = 'id_admin';
        $this->fields    = array(
            'nama_admin'    => array('Nama Admin', TRUE),
            'email'             => array('Email', TRUE),
            'alamat'             => array('Alamat', TRUE),
            'no_hp'             => array('No Tlp', TRUE),
        );
        $this->data = array(
            'nama_admin'           => $this->input->get('nama_admin'),
            'email'           => $this->input->get('email'),
            'alamat'           => $this->input->get('alamat'),
            'no_hp'           => $this->input->get('no_hp'),       );
        $this->page         = $this->input->get('page') != 0 ? ((int) ($this->input->get('page') - 1) * 100) : 0;
    }
    public function data ()
    {
        return $this->data;
    }

    public function tambah(){ 
        $nama_admin       = $this->input->post('nama_admin'); 
        $alamat       = $this->input->post('alamat');
        $no_hp         = $this->input->post('no_hp'); 
        $email         = $this->input->post('email');
        $password         = md5($this->input->post('password'));
        $data= array( 
            'nama_admin'        => $nama_admin, 
            'no_hp'  => $no_hp,
            'alamat'   => $alamat, 
            'no_hp'   => $no_hp,
            'email'   => $email,
            'password'   => $password,
            
        );
        #var_dump($data);exit();
        $this->db->insert('admin',$data);
       
    }

    //update
     public function update($idx){ 
        $nama_admin       = $this->input->post('nama_admin'); 
        $alamat       = $this->input->post('alamat');
        $no_hp         = $this->input->post('no_hp'); 
        $email         = $this->input->post('email');
        $passwords         = $this->input->post('password'); 
        $password_old         = $this->input->post('password_old');
        if ($passwords != $password_old)
        {
            $password = md5($this->input->post('password'));
        }else{
            $password = $password_old;
        } 
        #var_dump($password);exit();
        $data= array( 
            'nama_admin'        => $nama_admin, 
            'no_hp'  => $no_hp,
            'alamat'   => $alamat, 
            'no_hp'   => $no_hp,
            'email'   => $email,
            'password'   => $password,
            
        );
        //var_dump($segment);exit();
        $this->db->where('id_admin',$idx);
        $this->db->update('admin',$data);
       
    }
    public function get_edit ($idx)
    { 
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('id_admin',$idx); 
        $this->db->limit('100',$this->page); 
        $data = $this->db->get();
        return $data->result_array();
    }

    public function hapus_data($idx)
    {
        $sql    = "DELETE FROM tb_admin WHERE id_admin='$idx'";
        $query  = $this->db->query($sql);
    }


    public function data_admin ()
    { 
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->limit('100',$this->page); 
        $data = $this->db->get();
        return $data->result_array();
       
    }
}
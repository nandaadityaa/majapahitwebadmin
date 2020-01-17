<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_m extends MY_Model {
    private $key = '8bas8wdw';
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
    }
    public function is_secure ()
    {
        if ($this->session->userdata($this->key))
        {
            return TRUE;
        }
    }
    public function is_secure_redirect ()
    {
        if ( ! $this->session->userdata($this->key))
        {
            redirect (base_url().'login');
            exit;
        }
    }
    public function login()
    {
        $query = $this->db
                        ->from('admin')
                        ->where('email', $this->input->post('username'))
                        ->where('password',md5($this->input->post('password')))
                        ->get();
        // cek there is a record
        #var_dump($query->num_rows());exit();
        if ($query->num_rows() > 0)
        {            
            $this->session->set_userdata($this->key, $query->row_array());
            $id_admin=$query->row()->id_admin;
            $nama=$query->row()->nama_admin;
            $alamat=$query->row()->alamat;
            $no_hp=$query->row()->no_hp; 
            $this->session->set_userdata('id_admin',$id_admin);
            $this->session->set_userdata('nama',$nama);
            $this->session->set_userdata('alamat',$alamat);
            $this->session->set_userdata('no_hp',$no_hp);
            
            $query->free_result();
            return TRUE;
        } else{
            return FALSE;
        }
    }
    /**
     * Get value from session
     *
     * return array     data array session
     */
    public function data($userdata)
    {
        $data = $this->session->userdata($this->key); 
        #var_dump($data);exit();
        return $data[$userdata];
    }

    /**
     * Destroy session
     * return array     data array session
     */
    public function logout()
    {
        return $this->session->unset_userdata($this->key);
    }

}


/* End of file auth.php */

/* Location: ./application/model/auth.php */
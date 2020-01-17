<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');
 
class MY_Controller extends CI_Controller {

        public $params = array ();
        public $module = '';
     
    public function render_page($conten, $data = NULL){ 
        $this->title    = ucwords(preg_replace('/[_]+/', ' ', strtolower(trim($this->router->fetch_class()))));
        $this->method   = ucwords(preg_replace('/[_]+/', ' ', strtolower(trim($this->router->fetch_method()))));
 
        $this->params['module']         = $this->module;
        $this->params['method']         = $this->method;

        $data['alt_bar'] = $this->load->view('template/alt_bar', $data, TRUE);
        $data['sidebar'] = $this->load->view('template/sidebar', $data, TRUE);
        $data['header_menu'] = $this->load->view('template/header_menu', $data, TRUE);
        $data['conten'] = $this->load->view($conten, $this->params,TRUE);
        #$data['conten'] = $this->load->view($conten, $data, TRUE);
        $data['footer'] = $this->load->view('template/footer', $data, TRUE);

        

        $this->load->view('template/index', $data);

    } 
        
}
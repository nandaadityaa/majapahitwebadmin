<?php

function show_403()
{
    #get_instance = super global objek (untuk mendapatkan objek)
    $ci=& get_instance();
    
    $ci->load->view('error/error');    
}
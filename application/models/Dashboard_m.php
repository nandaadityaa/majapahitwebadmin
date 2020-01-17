<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard_m extends MY_Model{


    public function data ()
    {
        return $this->data;
    }

    public function get_chart(){
        $date=date('Y-m-d'); 
        /*$data=$this->db->query("select tb_engineer.se_nama as se_nama,tb_engineer.se_id as se_id,
            COUNT(CASE WHEN status_journey ='0'  THEN 1 END) AS status_done,
            COUNT(CASE WHEN status_journey = '2' or status_journey = '1' or status_journey = '4' THEN 1 END) AS status_active,
            status_journey, dba_name
            from tb_join_all_modul
            join tb_engineer on tb_engineer.se_id=tb_join_all_modul.se_id
            WHERE tgl_terima_project='$date'");*/  
        
            /*GROUP BY tb_join_all_modul.se_id*/
        $data=$this->db->query("SELECT * from tb_nasabah where tgl_input like '%$date%'");
        return $data->result_array();
    }
}
?>
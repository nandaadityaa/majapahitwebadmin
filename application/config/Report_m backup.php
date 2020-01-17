<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Report_m extends MY_Model{ 

    public function __construct ()

    {

        parent :: __construct ();
 

        $this->data = array(

            'id_pekebun'     => $this->input->get('id_pekebun'),
            'no_ktp'        => $this->input->get('no_ktp'),
            'no_kk'         => $this->input->get('no_kk'),
            'koperasi'      => $this->input->get('koperasi'),
            'nama_pekebun'  => $this->input->get('nama_pekebun'),
            'status'        => $this->input->get('status'),
        );

        $this->page         = $this->input->get('page') != 0 ? ((int) ($this->input->get('page') - 1) * 100) : 0;

    }

    public function report_koperasi1($start_date,$end_date,$id_koperasi,$no_dokumen){ 
#var_dump($id_koperasi);exit(); 
/* 
        if($job != ''){ 
        $data=$this->db->query("select * from tb_join_all_modul 
                                left join tb_engineer on tb_engineer.se_id =tb_join_all_modul.se_id 
                                left join tb_status_detail on tb_status_detail.det_id=tb_join_all_modul.m_det_id 
                                left join tb_status_job on tb_status_job.id_status=tb_status_detail.id_status 
                                WHERE tgl_terima_project BETWEEN '$start_date' AND '$end_date' and job ='$job' 
                                "); 
        }else{ 
        $data=$this->db->query("select * from tb_join_all_modul 
                                    left join tb_engineer on tb_engineer.se_id =tb_join_all_modul.se_id 
                                    left join tb_status_detail on tb_status_detail.det_id=tb_join_all_modul.m_det_id 
                                    left join tb_status_job on tb_status_job.id_status=tb_status_detail.id_status 
                                    WHERE tgl_terima_project BETWEEN '$start_date' AND '$end_date' 
                                    "); 
        }*/ 
        $data=$this->db->query("select * from tb_koperasix 
                                left join tb_proposal on tb_proposal.id_koperasi =tb_koperasi.id_koperasi 
                                WHERE tgl_terima_project BETWEEN '$start_date' AND '$end_date' and job ='$job' 
                                "); 
        return $data->result_array(); 
    } 
    public function dropdown_proposal() 
    { 
        $arr = array(); 
        $sql = "SELECT * from tb_proposal /*where persetujuan='Setuju' group by koperasi*/ order by no_dokumen asc"; 
        $query = $this->db->query($sql); 
        $data = parent ::get(); 
        if ($query) 
        { 
            foreach($query->result() as $d) 
            { 
                $arr[$d->no_dokumen]= $d->no_dokumen; 
            } 
             
            return $arr; 
        } 
    } 
    /*public function report_pekebun($start_date,$end_date,$id_koperasi){ 
        $start_date = $start_date.' 00:00:00'; 
        $end_date = $end_date.' 59:59:59'; 
        #var_dump($end_date);exit(); 
        $data=$this->db->query("select * from tb_pekebun 
                                WHERE tgl_input BETWEEN '$start_date' AND '$end_date' and id_koperasi ='$id_koperasi' 
                                "); 
        return $data->result_array(); 
    }*/ 
    public function histori_now(){ 
        $now=date('Y-m-d'); 
        $data=$this->db->query("select * from tb_join_all_modul 
                                    left join tb_engineer on tb_engineer.se_id =tb_join_all_modul.se_id 
                                    left join tb_status_detail on tb_status_detail.det_id=tb_join_all_modul.m_det_id 
                                    left join tb_status_job on tb_status_job.id_status=tb_status_detail.id_status 
                                    WHERE tgl_terima_project = '$now' "); 
        return $data->result_array(); 
    } 
    public function get_id_pro($id){ 
            $data=$this->db->query("select * from tb_join_all_modul 
                                    left join tb_engineer on tb_engineer.se_id =tb_join_all_modul.se_id 
                                    WHERE tgl_selesai BETWEEN '$dari' AND '$sampai'  
                                    AND se_nik != ''");  
        return $data->result_array(); 
    } 
    public function get_histori(){ 
        $start=date('Y-m-d'); 
        $end=date('Y-m-d',strtotime('-30 days')); 
        $data=$this->db->query("select * from tb_join_all_modul 
                                    left join tb_engineer on tb_engineer.se_id =tb_join_all_modul.se_id 
                                    left join tb_status_detail on tb_status_detail.det_id=tb_join_all_modul.m_det_id 
                                    left join tb_status_job on tb_status_job.id_status=tb_status_detail.id_status 
                                    WHERE tgl_terima_project BETWEEN '$end' AND '$start'  
                                    AND se_nik != ''");  
        return $data->result_array(); 
    } 
    public function detail_histori($job,$id_pro){ 
        $data=$this->db->query("select *,tb_status_job.nama_status as nama_status from tb_join_all_modul 
                                    left join tb_engineer on tb_engineer.se_id =tb_join_all_modul.se_id 
                                    left join tb_status_detail on tb_status_detail.det_id=tb_join_all_modul.m_det_id 
                                    left join tb_status_job on tb_status_job.id_status=tb_status_detail.id_status 
                                    WHERE job='$job' AND sched_idx='$id_pro' order by job asc ");  
        return $data->result_array(); 
    } 
    public function detail_histori_job($id_pro,$job){ 
        $data=$this->db->query("select *,tb_status_job.nama_status as nama_status from tb_join_all_modul 
                                    left join tb_engineer on tb_engineer.se_id =tb_join_all_modul.se_id 
                                    left join tb_status_detail on tb_status_detail.det_id=tb_join_all_modul.m_det_id 
                                    left join tb_status_job on tb_status_job.id_status=tb_status_detail.id_status 
                                    WHERE job='$job' AND sched_idx='$id_pro' order by job asc ");  
        return $data->result_array(); 
    } 
    public function report_koperasi ($start_date,$end_date,$id_koperasi,$status_koperasi){  
        $this->db->select('*'); 
        $this->db->from('koperasi'); 
        $this->db->join('proposal', 'proposal.id_koperasi = koperasi.id_koperasi'); 
            if($this->input->get('status_koperasi') != ''){ 
                $this->db->where('persetujuan', $status_koperasi); 
            } 
            if($this->input->get('id_koperasi') != ''){ 
                $this->db->where('koperasi.id_koperasi', $id_koperasi); 
            } 
            if($this->input->get('start_date') != ''){ 
                $this->db->where('koperasi.tgl_input >=', date('Y-m-d', strtotime($start_date))); 
                $this->db->where('koperasi.tgl_input <=', date('Y-m-d', strtotime($end_date))); 
            } 
        /*foreach ($this->data as $key => $value)  
        { 
            if ($value && $key == 'koperasi') $this->db->like($key, $value); 
            elseif ($value && $key == 'alamat') $this->db->like($key, $value); 
            elseif ($value && $key == 'pic') $this->db->like($key, $value); 
            elseif ($value && $key == 'kabupaten') $this->db->like($key, $value);  
            elseif ($value && $key == 'persetujuan') $this->db->like($key, $value);  
        }*/ 
        $this->db->group_by('proposal.koperasi'); 
        $data = $this->db->get(); 
        return $data->result_array(); 
    } 
    public function get_data_bpdp_1 ($id_koperasi=false,$start_date=false,$end_date=false) 
    {  
        $this->db->select('*,COUNT(tb_pekebun.id_pekebun) as total_pekebun, SUM(DISTINCT tb_legalitas.luas_lahan_disetujui) as total_lahan,proposal.tgl_input as tgl_input, proposal.id_proposal as id_proposal'); 
        $this->db->from('proposal'); 
        $this->db->join('pekebun', 'pekebun.id_proposal = proposal.id_proposal', 'left'); 
        $this->db->join('legalitas', 'legalitas.id_pekebun = pekebun.id_pekebun', 'left'); 
        #$this->db->where('push_bpdp', NULL ); 
            if($this->input->get('start_date') != ''){ 
                $this->db->where('proposal.tgl_input >=', date('Y-m-d', strtotime($start_date))); 
                $this->db->where('proposal.tgl_input <=', date('Y-m-d', strtotime($end_date))); 
            } 
            if($this->input->get('id_koperasi') != ''){ 
                $this->db->where('proposal.id_koperasi', $id_koperasi); 
            } 
        /*foreach ($this->data as $key => $value)  
        { 
            if ($value && $key == 'koperasi') $this->db->like($key, $value); 
            elseif ($value && $key == 'no_dokumen') $this->db->like($key, $value); 
            elseif ($value && $key == 'provinsi') $this->db->like($key, $value); 
            elseif ($value && $key == 'kabupaten') $this->db->like($key, $value);  
            elseif ($value && $key == 'persetujuan_proposal') $this->db->like($key, $value); 
        }*/ 
        $this->db->group_by('no_dokumen'); 
        #$this->db->limit('100',$this->page);  
        $data = $this->db->get(); 
        return $data->result_array(); 
    } 

    public function get_data_bpdp () 
    {  
        $this->db->select('*,COUNT(tb_pekebun.id_pekebun) as total_pekebun, SUM(DISTINCT tb_legalitas.luas_lahan_disetujui) as total_lahan,proposal.tgl_input as tgl_input, proposal.id_proposal as id_proposal'); 
        $this->db->from('proposal'); 
        $this->db->join('pekebun', 'pekebun.id_proposal = proposal.id_proposal', 'left'); 
        $this->db->join('legalitas', 'legalitas.id_pekebun = pekebun.id_pekebun', 'left'); 
        #$this->db->where('push_bpdp', NULL ); 
        /*foreach ($this->data as $key => $value)  
        { 
            if ($value && $key == 'koperasi') $this->db->like($key, $value); 
            elseif ($value && $key == 'no_dokumen') $this->db->like($key, $value); 
            elseif ($value && $key == 'provinsi') $this->db->like($key, $value); 
            elseif ($value && $key == 'kabupaten') $this->db->like($key, $value);  
            elseif ($value && $key == 'persetujuan_proposal') $this->db->like($key, $value); 
        }*/ 
        $this->db->group_by('no_dokumen'); 
        #$this->db->limit('100',$this->page);  
        $data = $this->db->get(); 
        return $data->result_array(); 
    } 

    public function report_rekap($start_date,$end_date,$id_koperasi){  
        /*$this->db->select('*, SUM(tb_legalitas.luas_lahan) as total_lahan,COUNT(tb_pekebun.id_pekebun) as total_pekebun,koperasi.no_legalitas_koperasi as no_legalitas_koperasi,proposal.alamat_kebun as alamat_kebun_proposal'); 
        $this->db->from('proposal'); 
        $this->db->join('pekebun', 'pekebun.id_proposal = proposal.id_proposal', 'left'); 
        $this->db->join('legalitas', 'legalitas.id_pekebun = pekebun.id_pekebun', 'left'); 
        $this->db->join('koperasi', 'koperasi.id_koperasi = proposal.id_koperasi', 'left'); 
            if($this->input->get('id_koperasi') != ''){ 
                $this->db->where('proposal.id_koperasi', $id_koperasi); 
            } 
            if($this->input->get('start_date') != ''){ 
                $this->db->where('proposal.tgl_input >=', $start_date); 
                $this->db->where('proposal.tgl_input <=', $end_date); 
            } 
        /*foreach ($this->data as $key => $value)  
        { 
            if ($value && $key == 'koperasi') $this->db->like($key, $value); 
            elseif ($value && $key == 'alamat') $this->db->like($key, $value); 
            elseif ($value && $key == 'pic') $this->db->like($key, $value); 
            elseif ($value && $key == 'kabupaten') $this->db->like($key, $value);  
            elseif ($value && $key == 'persetujuan') $this->db->like($key, $value);  
        }*
        $this->db->group_by('no_dokumen'); 
        $this->db->order_by('proposal.provinsi'); 
        $data = $this->db->get(); 
        return $data->result_array(); */
        $this->db->select('*, SUM(tb_legalitas.luas_lahan_disetujui) as total_lahan,COUNT(tb_pekebun.id_pekebun) as total_pekebun,koperasi.no_legalitas_koperasi as no_legalitas_koperasi,proposal.alamat_kebun as alamat_kebun_proposal'); 
        $this->db->from('proposal'); 
        $this->db->join('pekebun', 'pekebun.id_proposal = proposal.id_proposal', 'left'); 
        $this->db->join('legalitas', 'legalitas.id_pekebun = pekebun.id_pekebun', 'left'); 
        $this->db->join('koperasi', 'koperasi.id_koperasi = proposal.id_koperasi', 'left'); 
            if($this->input->get('id_koperasi') != ''){ 
                $this->db->where('proposal.id_koperasi', $id_koperasi); 
            } 
            if($this->input->get('start_date') != ''){ 
                $this->db->where('proposal.tgl_input >=', date('Y-m-d', strtotime($start_date))); 
                $this->db->where('proposal.tgl_input <=', date('Y-m-d', strtotime($end_date))); 
            }  
        $this->db->group_by('proposal.provinsi'); 
        $this->db->order_by('proposal.provinsi'); 
        $data = $this->db->get(); 
        return $data->result_array();
    } 
    public function count_report_koperasi ($start_date,$end_date,$id_koperasi,$status_koperasi) 
    {  
            if($this->input->get('status_koperasi') != ''){ 
                $this->db->where('persetujuan', $status_koperasi); 
            } 
            if($this->input->get('id_koperasi') != ''){ 
                $this->db->where('id_koperasi', $id_koperasi); 
            } 
            if($this->input->get('start_date') != ''){ 
                $this->db->where('tgl_input >=', date('Y-m-d', strtotime($start_date))); 
                $this->db->where('tgl_input <=', date('Y-m-d', strtotime($end_date))); 
            } 
       /* foreach ($this->data as $key => $value)  
        { 
            if ($value && $key == 'koperasi') $this->db->like($key, $value); 
            elseif ($value && $key == 'alamat') $this->db->like($key, $value); 
            elseif ($value && $key == 'pic') $this->db->like($key, $value); 
            elseif ($value && $key == 'kabupaten') $this->db->like($key, $value);  
            elseif ($value && $key == 'persetujuan') $this->db->like($key, $value);  
        }*/ 
        return parent :: count_record(); 
    } 
    public function report_proposal ($start_date,$end_date,$id_koperasi,$status,$no_dokumen=false){  
        $this->db->select('*, SUM(tb_legalitas.luas_lahan_disetujui) as total_lahan,COUNT(tb_pekebun.id_pekebun) as total_pekebun,koperasi.no_legalitas_koperasi as no_legalitas_koperasi,proposal.alamat_kebun as alamat_kebun_proposal,  tb_koperasi.nama_bank as nama_bank, count(DISTINCT tb_legalitas.id_legalitas) as jumlah_lahan'); 
        #count(tb_kordinat.id_kordinat) as kordinat,
        $this->db->from('proposal'); 
        $this->db->join('pekebun', 'pekebun.id_proposal = proposal.id_proposal'); 
        $this->db->join('legalitas', 'legalitas.id_pekebun = pekebun.id_pekebun', 'left') ;
        $this->db->join('koperasi', 'koperasi.id_koperasi = pekebun.id_koperasi');
        #$this->db->join('kordinat', 'kordinat.id_legalitas = legalitas.id_legalitas', 'left'); 
        /*$this->db->join('proposal', 'proposal.id_proposal = pekebun.id_proposal'); 
        $this->db->join('koperasi', 'koperasi.id_koperasi = pekebun.id_koperasi'); 
        $this->db->join('legalitas', 'legalitas.id_pekebun = pekebun.id_pekebun', 'left'); 
        $this->db->join('kordinat', 'kordinat.id_legalitas = legalitas.id_legalitas', 'left'); */
            if($this->input->get('start_date') != ''){ 
                $this->db->where('proposal.tgl_input >=', date('Y-m-d', strtotime($start_date))); 
                $this->db->where('proposal.tgl_input <=', date('Y-m-d', strtotime($end_date))); 
            } 
            if($this->input->get('id_koperasi') != ''){ 
                $this->db->where('proposal.id_koperasi', $id_koperasi); 
            } 
            if($this->input->get('status_koperasi') != ''){ 
                $this->db->where('persetujuan_proposal', $status); 
            } 
            if($this->input->get('no_dokumen') != ''){ 
                $this->db->where('no_dokumen', $no_dokumen); 
            } 
        $this->db->where('pekebun.status_ditjenbun', 'Sesuai'); 
        $this->db->group_by('pekebun.id_pekebun');  
        $data = $this->db->get(); 
        return $data->result_array(); 
    } 
    public function report_proposal1($start_date,$end_date,$id_koperasi,$status,$no_dokumen=false){  
        $this->db->select('*, SUM(tb_legalitas.luas_lahan_disetujui) as total_lahan,COUNT(DISTINCT tb_pekebun.id_pekebun) as total_pekebun,koperasi.no_legalitas_koperasi as no_legalitas_koperasi,proposal.alamat_kebun as alamat_kebun_proposal,  tb_koperasi.nama_bank as nama_bank, count(DISTINCT tb_legalitas.id_legalitas) as jumlah_lahan'); 
        #count(tb_kordinat.id_kordinat) as kordinat,
        $this->db->from('proposal'); 
        $this->db->join('pekebun', 'pekebun.id_proposal = proposal.id_proposal'); 
        $this->db->join('legalitas', 'legalitas.id_pekebun = pekebun.id_pekebun', 'left') ;
        $this->db->join('koperasi', 'koperasi.id_koperasi = pekebun.id_koperasi');
        #$this->db->join('kordinat', 'kordinat.id_legalitas = legalitas.id_legalitas', 'left'); 
        /*$this->db->join('proposal', 'proposal.id_proposal = pekebun.id_proposal'); 
        $this->db->join('koperasi', 'koperasi.id_koperasi = pekebun.id_koperasi'); 
        $this->db->join('legalitas', 'legalitas.id_pekebun = pekebun.id_pekebun', 'left'); 
        $this->db->join('kordinat', 'kordinat.id_legalitas = legalitas.id_legalitas', 'left'); */
            if($this->input->get('start_date') != ''){ 
                $this->db->where('proposal.tgl_input >=', date('Y-m-d', strtotime($start_date))); 
                $this->db->where('proposal.tgl_input <=', date('Y-m-d', strtotime($end_date))); 
            } 
            if($this->input->get('id_koperasi') != ''){ 
                $this->db->where('proposal.id_koperasi', $id_koperasi); 
            } 
            if($this->input->get('status_koperasi') != ''){ 
                $this->db->where('persetujuan_proposal', $status); 
            } 
            if($this->input->get('no_dokumen') != ''){ 
                $this->db->where('no_dokumen', $no_dokumen); 
            } 
        $this->db->where('pekebun.status_ditjenbun', 'Sesuai');  
        $data = $this->db->get(); 
        return $data->result_array();
    } 
    public function report_proposal_dit ($start_date,$end_date,$id_koperasi,$status,$no_dokumen=false){  
        $this->db->select('*, SUM(tb_legalitas.luas_lahan_disetujui) as total_lahan,COUNT(tb_pekebun.id_pekebun) as total_pekebun,koperasi.no_legalitas_koperasi as no_legalitas_koperasi,legalitas.legalitas as legalitasx,proposal.alamat_kebun as alamat_kebun_proposal,  tb_koperasi.nama_bank as nama_bank, count(DISTINCT tb_legalitas.id_legalitas) as jumlah_lahan'); 
        #count(tb_kordinat.id_kordinat) as kordinat,
        $this->db->from('proposal'); 
        $this->db->join('pekebun', 'pekebun.id_proposal = proposal.id_proposal'); 
        $this->db->join('legalitas', 'legalitas.id_pekebun = pekebun.id_pekebun', 'left') ;
        $this->db->join('koperasi', 'koperasi.id_koperasi = pekebun.id_koperasi');
        $this->db->join('disbun', 'disbun.id_disbun= disbun.id_disbun', 'left'); 
        /*$this->db->join('proposal', 'proposal.id_proposal = pekebun.id_proposal'); 
        $this->db->join('koperasi', 'koperasi.id_koperasi = pekebun.id_koperasi'); 
        $this->db->join('legalitas', 'legalitas.id_pekebun = pekebun.id_pekebun', 'left'); 
        $this->db->join('kordinat', 'kordinat.id_legalitas = legalitas.id_legalitas', 'left'); */
            if($this->input->get('start_date') != ''){ 
                $this->db->where('proposal.tgl_input >=', date('Y-m-d', strtotime($start_date))); 
                $this->db->where('proposal.tgl_input <=', date('Y-m-d', strtotime($end_date))); 
            } 
            if($this->input->get('id_koperasi') != ''){ 
                $this->db->where('proposal.id_koperasi', $id_koperasi); 
            } 
            if($this->input->get('status_koperasi') != ''){ 
                $this->db->where('persetujuan_proposal', $status); 
            } 
            if($this->input->get('no_dokumen') != ''){ 
                $this->db->where('no_dokumen', $no_dokumen); 
            } 
        $this->db->where('pekebun.status_ditjenbun', 'Sesuai'); 
        $this->db->group_by('pekebun.id_pekebun');  
        $data = $this->db->get(); 
        return $data->result_array(); 
    } 

    public function report_rekap_kav ($start_date,$end_date,$id_koperasi,$status,$no_dokumen=false){  
        $this->db->select('*, pekebun.anggota_kelompok as kelompok,legalitas.nama_shm as nama,legalitas.legalitas as legal,SUM(luas_lahan_disetujui) as totlan, COUNT(tb_legalitas.id_legalitas) as id, tb_pekebun.id_pekebun as id_pekebun_kab'); 
        #count(tb_kordinat.id_kordinat) as kordinat,
        $this->db->from('pekebun'); 
        $this->db->join('legalitas', 'legalitas.id_pekebun = pekebun.id_pekebun', 'left') ;
        $this->db->join('proposal', 'proposal.id_proposal = pekebun.id_proposal');
        $this->db->join('koperasi', 'koperasi.id_koperasi = proposal.id_koperasi');

        #$this->db->join('pekebun', 'pekebun.id_pekebun = legalitas.id_pekebun'); 
        $this->db->join('disbun', 'disbun.id_disbun= proposal.id_ditjenbun', 'left'); 
        /*$this->db->join('proposal', 'proposal.id_proposal = pekebun.id_proposal'); 
        $this->db->join('koperasi', 'koperasi.id_koperasi = pekebun.id_koperasi'); 
        $this->db->join('legalitas', 'legalitas.id_pekebun = pekebun.id_pekebun', 'left'); 
        $this->db->join('kordinat', 'kordinat.id_legalitas = legalitas.id_legalitas', 'left'); */
            if($this->input->get('start_date') != ''){ 
                $this->db->where('proposal.tgl_input >=', date('Y-m-d', strtotime($start_date))); 
                $this->db->where('proposal.tgl_input <=', date('Y-m-d', strtotime($end_date))); 
            } 
            if($this->input->get('id_koperasi') != ''){ 
                $this->db->where('proposal.id_koperasi', $id_koperasi); 
            } 
            if($this->input->get('status_koperasi') != ''){ 
                $this->db->where('persetujuan_proposal', $status); 
            } 
            if($this->input->get('no_dokumen') != ''){ 
                $this->db->where('no_dokumen', $no_dokumen); 
            } 
        $this->db->where('proposal.no_dokumen', $no_dokumen); 
        $this->db->group_by('tb_pekebun.id_pekebun'); 
        $this->db->having('COUNT(tb_legalitas.id_legalitas) >','1'); 
        $data = $this->db->get(); 
        return $data->result_array(); 
    } 
    public function report_proposal_print_rekening ($start_date,$end_date,$id_koperasi,$no_dokumen=false){  
        $this->db->select('*, SUM(tb_legalitas.luas_lahan_disetujui) as total_lahan,COUNT(tb_pekebun.id_pekebun) as total_pekebun,koperasi.no_legalitas_koperasi as no_legalitas_koperasi,proposal.alamat_kebun as alamat_kebun_proposal, tb_koperasi.nama_bank as nama_bank, count(DISTINCT tb_legalitas.id_legalitas) as jumlah_lahan'); 
        #, count(tb_kordinat.id_kordinat) as kordinat
        $this->db->from('proposal'); 
        $this->db->join('pekebun', 'pekebun.id_proposal = proposal.id_proposal'); 
        $this->db->join('legalitas', 'legalitas.id_pekebun = pekebun.id_pekebun', 'left') ;
        $this->db->join('koperasi', 'koperasi.id_koperasi = pekebun.id_koperasi');
        /*$this->db->join('pekebun', 'pekebun.id_proposal = proposal.id_proposal', 'left'); 
        $this->db->join('legalitas', 'legalitas.id_pekebun = pekebun.id_pekebun', 'left');*/ 
        #$this->db->join('kordinat', 'kordinat.id_legalitas = legalitas.id_legalitas', 'left'); 
            if($this->input->get('start_date') != ''){ 
                $this->db->where('proposal.tgl_input >=', date('Y-m-d', strtotime($start_date))); 
                $this->db->where('proposal.tgl_input <=', date('Y-m-d', strtotime($end_date))); 
            } 
            if($this->input->get('id_koperasi') != ''){ 
                $this->db->where('proposal.id_koperasi', $id_koperasi); 
            } 
            /*if($this->input->get('status_koperasi') != ''){ 
                $this->db->where('persetujuan_proposal', $status); 
            } */
            if($this->input->get('no_dokumen') != ''){ 
                $this->db->where('no_dokumen', $no_dokumen); 
            } 
        #$this->db->where('proposal.status ','Ditjenbun Sesuai'); 
        $this->db->group_by('pekebun.id_pekebun');  
        $data = $this->db->get(); 
        return $data->result_array(); 
    } 
    /*public function report_proposal_rekening ($start_date,$end_date,$id_koperasi,$status,$no_dokumen=false){  
        $this->db->select('*, SUM(tb_legalitas.luas_lahan) as total_lahan,COUNT(tb_pekebun.id_pekebun) as total_pekebun'); 
        $this->db->from('pekebun'); 
        /*$this->db->join('pekebun', 'pekebun.id_proposal = proposal.id_proposal', 'left'); 
        $this->db->join('legalitas', 'legalitas.id_pekebun = pekebun.id_pekebun', 'left');* 
        $this->db->join('proposal', 'proposal.id_proposal = pekebun.id_proposal'); 
        $this->db->join('koperasi', 'koperasi.id_koperasi = pekebun.id_koperasi'); 
        $this->db->join('legalitas', 'legalitas.id_pekebun = pekebun.id_pekebun', 'left'); 
            if($this->input->get('start_date') != ''){ 
                $this->db->where('proposal.tgl_input >=', $start_date); 
                $this->db->where('proposal.tgl_input <=', $end_date); 
            } 
            if($this->input->get('id_koperasi') != ''){ 
                $this->db->where('proposal.id_koperasi', $id_koperasi); 
            } 
            if($this->input->get('status_koperasi') != ''){ 
                $this->db->where('persetujuan_proposal', $status); 
            } 
            if($this->input->get('no_dokumen') != ''){ 
                $this->db->where('no_dokumen', $no_dokumen); 
            } 
        $this->db->where('proposal.status ','Ditjenbun Sesuai'); 
        $this->db->group_by('pekebun.id_pekebun');  
        $data = $this->db->get(); 
        return $data->result_array(); 
    }*/ 
    public function report_pekebun($start_date,$end_date,$id_koperasi,$status,$id_pekebun){ 
        #var_dump($id_pekebun);exit(); 
        $this->db->select('*'); 
        $this->db->from('pekebun'); 
        $this->db->join('koperasi', 'koperasi.id_koperasi = pekebun.id_koperasi', 'left'); 
            if($this->input->get('status') != ''){ 
                $this->db->where('pekebun.status', $status); 
            } 
            if($this->input->get('id_koperasi') != ''){ 
                $this->db->where('pekebun.id_koperasi', $id_koperasi); 
            } 
            if($this->input->get('id_pekebun') != ''){ 
                $this->db->where('pekebun.id_pekebun', $id_pekebun); 
            } 
            if($this->input->get('start_date') != ''){ 
                $start_date = $this->input->get('start_date').' 00:00:00'; 
                $end_date = $this->input->get('end_date').' 23:59:59'; 
                $this->db->where('pekebun.tgl_input >=', date('Y-m-d', strtotime($start_date))); 
                $this->db->where('pekebun.tgl_input <=', date('Y-m-d', strtotime($end_date))); 
            } 
       /* foreach ($this->data as $key => $value)  
        { 
            if ($value && $key == 'no_ktp') $this->db->like($key, $value); 
            elseif ($value && $key == 'no_kk') $this->db->like($key, $value); 
            elseif ($value && $key == 'koperasi') $this->db->like($key, $value);  
            elseif ($value && $key == 'nama_pekebun') $this->db->like($key, $value); 
            elseif ($value && $key == 'status') $this->db->like($key, $value); 
        }*/ 
        $data = $this->db->get(); 
        return $data->result_array(); 
    } 
    public function report_kordinat_all($id_koperasi=false,$no_dokumen=false){ 
        $this->db->select('*');
        $this->db->from('kordinat');
        $this->db->join('legalitas', 'legalitas.id_legalitas = kordinat.id_legalitas', 'left');
        $this->db->join('pekebun', 'pekebun.id_pekebun = legalitas.id_pekebun', 'left');
        $this->db->join('proposal', 'proposal.id_proposal = pekebun.id_proposal', 'left');
            if($this->input->get('id_koperasi') != ''){
                $this->db->where('proposal.id_koperasi', $id_koperasi);
            }
            if($this->input->get('no_dokumen') != ''){
                $this->db->where('proposal.no_dokumen', $no_dokumen);
            }
        $this->db->group_by('id_kordinat');
        #$this->db->order_by('proposal.provinsi'); 
        $data = $this->db->get();
        return $data->result_array();
    }
    public function report_kordinat($id_koperasi=false,$no_dokumen=false){ 
        $this->db->select('*');
        $this->db->from('kordinat');
        $this->db->join('legalitas', 'legalitas.id_legalitas = kordinat.id_legalitas', 'left');
        $this->db->join('pekebun', 'pekebun.id_pekebun = legalitas.id_pekebun', 'left');
        $this->db->join('proposal', 'proposal.id_proposal = pekebun.id_proposal', 'left');
        #$this->db->join('koperasi', 'koperasi.id_koperasi = proposal.id_koperasi', 'left');
            if($this->input->get('id_koperasi') != ''){
                $this->db->where('proposal.id_koperasi', $id_koperasi);
            }
            if($this->input->get('no_dokumen') != ''){
                $this->db->where('proposal.no_dokumen', $no_dokumen);
            }
        $this->db->group_by('id_kordinat');
        #$this->db->order_by('proposal.provinsi');
        $this->db->limit('100',$this->page); 
        $data = $this->db->get();
        return $data->result_array();
    }
    public function count_kordinat($id_koperasi=false,$no_dokumen=false){ 
        $this->db->select('*');
        $this->db->from('kordinat');
        $this->db->join('legalitas', 'legalitas.id_legalitas = kordinat.id_legalitas', 'left');
        $this->db->join('pekebun', 'pekebun.id_pekebun = legalitas.id_pekebun', 'left');
        $this->db->join('proposal', 'proposal.id_proposal = pekebun.id_proposal', 'left');
        if($this->input->get('id_koperasi') != ''){
            $this->db->where('proposal.id_koperasi', $id_koperasi);
        }
        if($this->input->get('no_dokumen') != ''){
            $this->db->where('proposal.no_dokumen', $no_dokumen);
        }
        return parent :: count_record();
    }
    public function report_cpcl ($id_proposal = false)
    {    

        $data=$this->db->query("select *, SUM(DISTINCT tb_legalitas.luas_lahan_disetujui) as luas_lahan, tb_koperasi.koperasi as koperasi, tb_koperasi.no_legalitas_koperasi as no_legalitas 
                            from tb_pekebun
                            left join tb_legalitas on tb_legalitas.id_pekebun=tb_pekebun.id_pekebun
                            join tb_koperasi on tb_koperasi.id_koperasi=tb_pekebun.id_koperasi 
                            where tb_pekebun.id_proposal='$id_proposal' 
                            and tb_pekebun.status='Sesuai' 
                            GROUP BY tb_pekebun.id_pekebun");  
        return $data->result_array();
    }
    public function report_skdirut ($id_proposal){  
        $this->db->select('*, SUM(tb_legalitas.luas_lahan_disetujui) as total_lahan,COUNT(tb_pekebun.id_pekebun) as total_pekebun,koperasi.no_legalitas_koperasi as no_legalitas_koperasi,proposal.alamat_kebun as alamat_kebun_proposal,  tb_koperasi.nama_bank as nama_bank, count(DISTINCT tb_legalitas.id_legalitas) as jumlah_lahan'); 
        #count(tb_kordinat.id_kordinat) as kordinat,
        $this->db->from('proposal'); 
        $this->db->join('pekebun', 'pekebun.id_proposal = proposal.id_proposal'); 
        $this->db->join('legalitas', 'legalitas.id_pekebun = pekebun.id_pekebun', 'left') ;
        $this->db->join('koperasi', 'koperasi.id_koperasi = pekebun.id_koperasi');
        #$this->db->join('kordinat', 'kordinat.id_legalitas = legalitas.id_legalitas', 'left'); 
        /*$this->db->join('proposal', 'proposal.id_proposal = pekebun.id_proposal'); 
        $this->db->join('koperasi', 'koperasi.id_koperasi = pekebun.id_koperasi'); 
        $this->db->join('legalitas', 'legalitas.id_pekebun = pekebun.id_pekebun', 'left'); 
        $this->db->join('kordinat', 'kordinat.id_legalitas = legalitas.id_legalitas', 'left'); */
            /*if($this->input->get('start_date') != ''){ 
                $this->db->where('proposal.tgl_input >=', $start_date); 
                $this->db->where('proposal.tgl_input <=', $end_date); 
            } 
            if($this->input->get('id_koperasi') != ''){ 
                $this->db->where('proposal.id_koperasi', $id_koperasi); 
            } 
            if($this->input->get('status_koperasi') != ''){ 
                $this->db->where('persetujuan_proposal', $status); 
            } 
            if($this->input->get('no_dokumen') != ''){ 
                $this->db->where('no_dokumen', $no_dokumen); 
            } */
        $this->db->where('proposal.id_proposal', $id_proposal);
        $this->db->where('pekebun.status_ditjenbun', 'Sesuai'); 
        $this->db->group_by('pekebun.id_pekebun');  
        $data = $this->db->get(); 
        return $data->result_array(); 
    } 
    public function report_sk_perjanjian($nama_bank,$id_proposal)
    {
        //var_dump($id_proposal);exit;  
        $this->db->select('tb_koperasi.koperasi as koperasix, tb_proposal.koperasi, tb_koperasi.pimpinan, tb_koperasi.provinsi, tb_koperasi.kabupaten, tb_koperasi.kecamatan, tb_koperasi.kelurahan, tb_koperasi.kodepos,tb_proposal.no_dokumen, tb_koperasi.alamat as alamat_koperasi, tb_koperasi.email as email_koperasi, tb_koperasi.hp as hp_koperasi, tb_koperasi.nama_bank, tb_koperasi.cabang_bank, tb_koperasi.no_legalitas_koperasi,tb_koperasi.perusahaan_mitra, tb_verifikasi_bank_proposal.no_legalitas_bank, tb_verifikasi_bank_proposal.tgl_legalitas_bank, tb_proposal.alamat_kebun, tb_verifikasi_bank_proposal.pemimpin_bank, tb_verifikasi_bank_proposal.nama_notaris,tb_verifikasi_bank_proposal.no_kemenkumham, tb_verifikasi_bank_proposal.thn_kemenkumham, tb_verifikasi_bank_proposal.berkedudukan, tb_proposal.penunjukan_ketua, tb_verifikasi_bank_proposal.pemimpin_bank,tb_verifikasi_bank_proposal.no_sk_bank, tb_verifikasi_bank_proposal.tanggal_pemimpin, tb_userbank.tlpn, tb_userbank.alamat, tb_userbank.email, tb_proposal.ket_legalitas, tb_proposal.dasar_penunjukan, tb_proposal.ketua_kelembagaan, tb_proposal.hp_ketua, tb_userbank.no_legalitas_bank as no_legalitas_bankx,tb_userbank.foto');  
        #count(tb_kordinat.id_kordinat) as kordinat,
        $this->db->from('koperasi'); 
        $this->db->join('proposal', 'proposal.id_koperasi = koperasi.id_koperasi', 'left'); 
        $this->db->join('userbank', 'userbank.nama_bank = koperasi.nama_bank', 'left') ;
        $this->db->join('verifikasi_bank_proposal', 'verifikasi_bank_proposal.id_koperasi = koperasi.id_koperasi', 'left');
        $this->db->where('koperasi.nama_bank', $nama_bank); 
        $this->db->where('proposal.id_proposal', $id_proposal); 
        $data = $this->db->get(); 
        return $data->result_array(); 
    }

    public function report_surat_kuasa($id_pekebun)
    {
        //var_dump($id_proposal);exit;
        $this->db->select('nama_pekebun, no_ktp, alamat_pekebun, tb_koperasi.koperasi, tb_proposal.nama_bank, ketua_kelembagaan,nik_kelembagaan, email_ketua, hp_ketua,alamat, cabang_bank'); 
        #count(tb_kordinat.id_kordinat) as kordinat,
        $this->db->from('pekebun'); 
        $this->db->join('proposal', 'proposal.id_proposal = pekebun.id_proposal'); 
        $this->db->join('koperasi', 'koperasi.id_koperasi = pekebun.id_koperasi'); 
        $this->db->where('pekebun.id_pekebun', $id_pekebun); 
        $data = $this->db->get(); 
        return $data->result_array(); 
    }

    public function report_monev_triwulan ($id_proposal=false,$id_koperasi=false,$id_progres=false,$triwulan=false){  
        $this->db->select('*, SUM(tb_legalitas.luas_lahan_disetujui) as total_lahan,COUNT(tb_pekebun.id_pekebun) as total_pekebun,koperasi.no_legalitas_koperasi as no_legalitas_koperasi,proposal.alamat_kebun as alamat_kebun_proposal,  tb_koperasi.nama_bank as nama_bank, count(DISTINCT tb_legalitas.id_legalitas) as jumlah_lahan'); 
        #count(tb_kordinat.id_kordinat) as kordinat,
        $this->db->from('proposal'); 
        $this->db->join('pekebun', 'pekebun.id_proposal = proposal.id_proposal'); 
        $this->db->join('legalitas', 'legalitas.id_pekebun = pekebun.id_pekebun', 'left') ;
        $this->db->join('koperasi', 'koperasi.id_koperasi = pekebun.id_koperasi');
        $this->db->join('disbun', 'disbun.id_disbun= disbun.id_disbun', 'left'); 
        $this->db->join('progres', 'progres.id_proposal = proposal.id_proposal', 'left'); 
        $this->db->where('progres.id_proposal', $id_proposal); 
        $this->db->where('progres.tipe', 'rab');
         $this->db->where('koperasi.id_koperasi', $id_koperasi);
          //$this->db->where('progres.id_progres', $id_progres);  
        $this->db->group_by('progres.nama_po');  
        $data = $this->db->get(); 
        return $data->result_array();  
    } 

    public function report_monev ($id_proposal=false,$id_koperasi=false,$id_progres=false){  
        $this->db->select('*, SUM(tb_legalitas.luas_lahan_disetujui) as total_lahan,COUNT(tb_pekebun.id_pekebun) as total_pekebun,koperasi.no_legalitas_koperasi as no_legalitas_koperasi,proposal.alamat_kebun as alamat_kebun_proposal,  tb_koperasi.nama_bank as nama_bank, count(DISTINCT tb_legalitas.id_legalitas) as jumlah_lahan'); 
        #count(tb_kordinat.id_kordinat) as kordinat,
        $this->db->from('proposal'); 
        $this->db->join('pekebun', 'pekebun.id_proposal = proposal.id_proposal'); 
        $this->db->join('legalitas', 'legalitas.id_pekebun = pekebun.id_pekebun', 'left') ;
        $this->db->join('koperasi', 'koperasi.id_koperasi = pekebun.id_koperasi');
        $this->db->join('disbun', 'disbun.id_disbun= disbun.id_disbun', 'left'); 
        $this->db->join('progres', 'progres.id_progres = progres.id_progres', 'left'); 
        $this->db->where('progres.id_proposal', $id_proposal); 
        $this->db->where('progres.tipe', 'rab');
         $this->db->where('koperasi.id_koperasi', $id_koperasi);
          //$this->db->where('progres.id_progres', $id_progres);  
        $this->db->group_by('progres.nama_po');  
        $data = $this->db->get(); 
        return $data->result_array();  
    } 
} 
?>
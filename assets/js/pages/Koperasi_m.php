<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Koperasi_m extends MY_Model{

    public function __construct ()
    {
        parent :: __construct ();
        
        $this->tableName = 'koperasi';
        $this->idx       = 'id_koperasi';
        $this->fields    = array(
            'nama_bank'         => array('Nama ', TRUE)/*,
            'alamat_provider'         => array('Alamat', TRUE),
            'kota'      => array('kota', TRUE),
            'provinsi'   => array('Provinsi', TRUE),
            'kode_pos'   => array('Kodepos', TRUE),
            'pic'   => array('Kodepos', TRUE),
            'email'   => array('Email', TRUE),
            'jabatan'   => array('Jabatan', TRUE),
            'tlp'   => array('Telepon', TRUE),
            'hp'   => array('HP', TRUE),
            'hp1'   => array('HP 1', TRUE),
            'rekening'   => array('Rekening', TRUE),
            'nama_bank'   => array('Nama bank', TRUE),
            'cabang_bank'   => array('Cabang bank', TRUE),
            'nama_pimpinan'   => array('Nama Pimpinan', TRUE),
            'pengalaman_kerja'   => array('Pengalaman Kerja', TRUE),
            'lembaga'   => array('Lembaga', TRUE),
            'persetujuan'   => array('Persetujuan', TRUE)*/
        );
        $this->data = array(
            'id_koperasi'           => $this->input->get('id_koperasi'),
            'koperasi'           => $this->input->get('koperasi'),
            'alamat'           => $this->input->get('alamat'),
            'pic'           => $this->input->get('pic'),
            'kabupaten'           => $this->input->get('kabupaten'),
            'persetujuan'       => $this->input->get('persetujuan'),
        );
        $this->page         = $this->input->get('page') != 0 ? ((int) ($this->input->get('page') - 1) * 100) : 0;
    }

    public function data ()
    {
        return $this->data;
    }

    public function get_koperasi ()
    { 
        $this->db->select('*');
        $this->db->from('koperasi'); 
        foreach ($this->data as $key => $value) 
        {
            if ($value && $key == 'koperasi') $this->db->like($key, $value);
            elseif ($value && $key == 'alamat') $this->db->like($key, $value);
            elseif ($value && $key == 'pic') $this->db->like($key, $value);
            elseif ($value && $key == 'kabupaten') $this->db->like($key, $value); 
            elseif ($value && $key == 'persetujuan') $this->db->like($key, $value); 
        }
        $this->db->where('verifikasi_email','1'); 
        $this->db->order_by('persetujuan asc');
        $this->db->limit('100',$this->page); 
        $data = $this->db->get();
        return $data->result_array();
        #return parent::get();
    }

    public function count_koperasi ()
    { 
        foreach ($this->data as $key => $value) 
        {
            if ($value && $key == 'koperasi') $this->db->like($key, $value);
            elseif ($value && $key == 'alamat') $this->db->like($key, $value);
            elseif ($value && $key == 'pic') $this->db->like($key, $value);
            //elseif ($value && $key == 'kabupaten') $this->db->like($key, $value); 
            elseif ($value && $key == 'persetujuan') $this->db->like($key, $value); 
        }        
        $this->db->where('verifikasi_email','1');
        return parent :: count_record();
    }

    public function report_koperasi ($start_date,$end_date,$id_koperasi,$status_koperasi){ 
        $this->db->select('*');
        $this->db->from('koperasi');
            if($this->input->get('status_koperasi') != ''){
                $this->db->where('persetujuan', $status_koperasi);
            }elseif($this->input->get('start_date') != ''){
                $this->db->where('tgl_input >=', $start_date);
                $this->db->where('tgl_input <=', $end_date);
            }elseif($this->input->get('start_date') != '' and $this->input->get('end_date') != '' and $this->input->get('status_koperasi') != ''){
                $this->db->where('persetujuan', $status_koperasi);
                $this->db->where('tgl_input >=', $start_date);
                $this->db->where('tgl_input <=', $end_date);
            }elseif($this->input->get('start_date') != '' and $this->input->get('end_date') != '' and $this->input->get('status_koperasi') != '' and $this->input->get('id_koperasi') != ''){
                $this->db->where('id_koperasi', $id_koperasi);
                $this->db->where('persetujuan', $status_koperasi);
                $this->db->where('tgl_input >=', $start_date);
                $this->db->where('tgl_input <=', $end_date);
            }
        foreach ($this->data as $key => $value) 
        {
            if ($value && $key == 'koperasi') $this->db->like($key, $value);
            elseif ($value && $key == 'alamat') $this->db->like($key, $value);
            elseif ($value && $key == 'pic') $this->db->like($key, $value);
            elseif ($value && $key == 'kabupaten') $this->db->like($key, $value); 
            elseif ($value && $key == 'persetujuan') $this->db->like($key, $value); 
        }
        $this->db->limit('100',$this->page); 
        $data = $this->db->get();
        return $data->result_array();
    }

    public function hitung_koperasi(){
        $data=$this->db->query("select * from tb_koperasi where persetujuan = 'Konfirmasi' and verifikasi_email='1'");    
        return $data->num_rows();
    }

    public function count_report_koperasi ($start_date,$end_date,$id_koperasi,$status_koperasi)
    { 
            if($this->input->get('status_koperasi') != ''){
                $this->db->where('persetujuan', $status_koperasi);
            }
            if($this->input->get('start_date') != ''){
                $this->db->where('tgl_input >=', $start_date);
                $this->db->where('tgl_input <=', $end_date);
            }
            if($this->input->get('$id_koperasi') != ''){
                $this->db->where('$id_koperasi', $id_koperasi);
            }
            /*if($this->db->where('persetujuan', $status_koperasi);
            }*/
        foreach ($this->data as $key => $value) 
        {
            if ($value && $key == 'koperasi') $this->db->like($key, $value);
            elseif ($value && $key == 'alamat') $this->db->like($key, $value);
            elseif ($value && $key == 'pic') $this->db->like($key, $value);
            elseif ($value && $key == 'kabupaten') $this->db->like($key, $value); 
            elseif ($value && $key == 'persetujuan') $this->db->like($key, $value); 
        }
        return parent :: count_record();
    }

    public function update_foto($idx,$foto){
        $idx = $this->auth_m->data('idx');
        $foto = $foto;
        $data = array(
            'foto'   => $foto,
        );
        $this->db->where('id_koperasi',$idx);
        $this->db->update('koperasi',$data);
    }

    /*public function update_legalitas($idx,$legalitas){
        $legalitas = $legalitas;
        $data = array(
            'legalitas'   => $legalitas,
        );
        $this->db->where('id_koperasi',$idx);
        $this->db->update('koperasi',$data);
    }*/
    
    public function update_legalitas($legalitas){
        $email=$this->input->post('email');
        #;
        $data = array(
            'legalitas'   => $legalitas,
        );
        $this->db->where('email',$email);
        $this->db->update('koperasi',$data);
    }

    public function update_notaris($idx,$notaris){
        $notaris = $notaris;
        $data = array(
            'notaris'   => $notaris,
        );
        $this->db->where('id_koperasi',$idx);
        $this->db->update('koperasi',$data);
    }

    public function update_pembentukan($idx,$pembentukan){
        $pembentukan = $pembentukan;
        $data = array(
            'pembentukan'   => $pembentukan,
        );
        $this->db->where('id_koperasi',$idx);
        $this->db->update('koperasi',$data);
    }

    public function get_by_nama ($koperasi = false){
        $this->db->where('koperasi', $koperasi);
        return parent :: get ();
    }

    public function get_by_email ($email = false){
        $data=$this->db->query("select * from tb_vw_login where email='$email'");  
        return $data->result_array();
    }

    public function simpandata_koperasi(){       
        $email = $this->input->post('email');
        $password   = md5($this->input->post('password'));
        $koperasi = $this->input->post('koperasi');
        $pimpinan = $this->input->post('pimpinan');
        $pic = $this->input->post('pic');
        $jabatan = $this->input->post('jabatan');
        $provinsi = $this->input->post('provinsi');
        $kabupaten = $this->input->post('kabupaten');
        $kecamatan = $this->input->post('kecamatan');
        $kelurahan = $this->input->post('kelurahan');
        $kodepos = $this->input->post('kodepos');
        $tlp = $this->input->post('tlp');
        $hp = $this->input->post('hp');
        $alamat = $this->input->post('alamat');
        $rekening= $this->input->post('rekening');
        $nama_bank = $this->input->post('nama_bank');
        $cabang_bank = $this->input->post('cabang_bank');
        $legalitas = $this->input->post('legalitas');
        $notaris = $this->input->post('notaris');
        $pembentukan = $this->input->post('pembentukan');
        $no_legalitas_koperasi = $this->input->post('no_legalitas_koperasi');
        $tgl_terbit_legalitas = $this->input->post('tgl_terbit_legalitas');
        $perusahaan_mitra = $this->input->post('perusahaan_mitra');
        $persetujuan = (($this->input->post('persetujuan')) > 0) ? implode(',',$this->input->post('persetujuan')) : ''; 
        $id_input = $this->auth_m->data('idx');
        $tgl_input= date('Y-m-d H:i:s');

        $data = array(
            'email'       => $email,
            'password'    => $password,
            'koperasi'    => $koperasi,
            'pimpinan'    => $pimpinan,
            'pic'         => $pic,
            'jabatan'     => $jabatan,
            'provinsi'    => $provinsi,
            'kabupaten'   => $kabupaten,
            'kecamatan'   => $kecamatan,
            'kelurahan'   => $kelurahan,
            'kodepos'     => $kodepos,
            'tlp'         => $tlp,
            'hp'          => $hp,
            'alamat'      => $alamat,
            'rekening'    => $rekening,
            'nama_bank'   => $nama_bank,
            'cabang_bank' => $cabang_bank,
            'legalitas'   => $legalitas,
            'notaris'     => $notaris,
            'pembentukan' => $pembentukan,
            'persetujuan' => $persetujuan,
            'id_input'    => $id_input,
            'tgl_input'   => $tgl_input,
            'tgl_terbit_legalitas'   => $tgl_terbit_legalitas,
            'no_legalitas_koperasi'   => $no_legalitas_koperasi,
            'perusahaan_mitra'   => $perusahaan_mitra,
        );        
        $this->db->insert('koperasi',$data);
    }

    public function simpandata_register_koperasi(){       
        $email = $this->input->post('email');
        $password   = md5($this->input->post('password'));
        $koperasi = $this->input->post('koperasi');
        $pimpinan = $this->input->post('pimpinan');
        $pic = $this->input->post('pic');
        $jabatan = $this->input->post('jabatan');
        $provinsi = $this->input->post('provinsi');
        $kabupaten = $this->input->post('kabupaten');
        $kecamatan = $this->input->post('kecamatan');
        $kelurahan = $this->input->post('kelurahan');
        $kodepos = $this->input->post('kodepos');
        $tlp = $this->input->post('tlp');
        $hp = $this->input->post('hp');
        $alamat = $this->input->post('alamat');
        $rekening= $this->input->post('rekening');
        $nama_bank = $this->input->post('nama_bank');
        $cabang_bank = $this->input->post('cabang_bank');
        $legalitas = $this->input->post('legalitas');
        $no_legalitas_koperasi = $this->input->post('no_legalitas_koperasi');
        $tgl_terbit_legalitas = $this->input->post('tgl_terbit_legalitas');
        $notaris = $this->input->post('notaris');
        $pembentukan = $this->input->post('pembentukan');
        $perusahaan_mitra = $this->input->post('perusahaan_mitra');
        $tgl_input= date('Y-m-d H:i:s');

        $data = array(
            'email'       => $email,
            'password'    => $password,
            'koperasi'    => $koperasi,
            'pimpinan'    => $pimpinan,
            'pic'         => $pic,
            'jabatan'     => $jabatan,
            'provinsi'    => $provinsi,
            'kabupaten'   => $kabupaten,
            'kecamatan'   => $kecamatan,
            'kelurahan'   => $kelurahan,
            'kodepos'     => $kodepos,
            'tlp'         => $tlp,
            'hp'          => $hp,
            'alamat'      => $alamat,
            'rekening'    => $rekening,
            'nama_bank'   => $nama_bank,
            'cabang_bank' => $cabang_bank,
            'legalitas'   => $legalitas,
            'notaris'     => $notaris,
            'no_legalitas_koperasi'     => $no_legalitas_koperasi,
            'tgl_terbit_legalitas'     => $tgl_terbit_legalitas,
            'pembentukan' => $pembentukan,
            'perusahaan_mitra' => $perusahaan_mitra,
            'persetujuan' => 'Konfirmasi',
            'tgl_input'   => $tgl_input,
        );        
        $this->db->insert('koperasi',$data);
    }

    public function data_koperasi(){
        $data=$this->db->query("select * from tb_koperasi");  
        return $data->result_array();
    }
    
    public function get_data_koperasi ($id_koperasi=false){
        $data=$this->db->query("select * from tb_koperasi where id_koperasi='$id_koperasi'");  
        return $data->result_array();
    }
    
    public function get_legalitas_koperasi ($id_koperasi=false){
        $data=$this->db->query("select * from tb_koperasi where id_koperasi='$id_koperasi'");  
        return $data->result_array();
    }

    public function save_aprove_koperasi($idx){
        $persetujuan = (($this->input->post('persetujuan')) > 0) ? implode(',',$this->input->post('persetujuan')) : '';
        $keterangan_persetujuan = $this->input->post('keterangan_persetujuan');
        
        $data = array(
            'persetujuan' => $persetujuan,            
            'keterangan_persetujuan' => $keterangan_persetujuan,
        );
        $this->db->where('id_koperasi',$idx);
        $this->db->update('koperasi',$data);
    }

    public function update_data($idx){
        $status = (($this->input->post('status')) > 0) ? implode(',',$this->input->post('status')) : '';
        $persetujuan = (($this->input->post('persetujuan')) > 0) ? implode(',',$this->input->post('persetujuan')) : '';
        $keterangan_persetujuan = $this->input->post('keterangan_persetujuan');
        $email = $this->input->post('email');
        $koperasi = $this->input->post('koperasi');
        $pimpinan = $this->input->post('pimpinan');
        $pic = $this->input->post('pic');
        $jabatan = $this->input->post('jabatan');
        $provinsi = $this->input->post('provinsi');
        $kabupaten = $this->input->post('kabupaten');
        $kecamatan = $this->input->post('kecamatan');
        $kelurahan = $this->input->post('kelurahan');
        $kodepos = $this->input->post('kodepos');
        $tlp = $this->input->post('tlp');
        $hp = $this->input->post('hp');
        $alamat = $this->input->post('alamat');
        $rekening= $this->input->post('rekening');
        $nama_bank = $this->input->post('nama_bank');
        $cabang_bank = $this->input->post('cabang_bank');
        $legalitas = $this->input->post('legalitas');
        $notaris = $this->input->post('notaris');
        $pembentukan = $this->input->post('pembentukan');
        $tgl_terbit_legalitas = $this->input->post('tgl_terbit_legalitas');
        $tgl_update= date('Y-m-d H:i:s');
        $id_update = $this->auth_m->data('idx'); 
        if($persetujuan){
            $status = $persetujuan;
        }else{
            $status = 'Konfirmasi';
        }

        $data = array(
            'email'       => $email,
            'koperasi'    => $koperasi,
            'pimpinan'    => $pimpinan,
            'pic'         => $pic,
            'jabatan'     => $jabatan,
            'provinsi'    => $provinsi,
            'kabupaten'   => $kabupaten,
            'kecamatan'   => $kecamatan,
            'kelurahan'   => $kelurahan,
            'kodepos'     => $kodepos,
            'tlp'         => $tlp,
            'hp'          => $hp,
            'alamat'      => $alamat,
            'rekening'    => $rekening,
            'nama_bank'   => $nama_bank,
            'cabang_bank' => $cabang_bank,
            'legalitas'   => $legalitas,
            'notaris'     => $notaris,
            'pembentukan' => $pembentukan,
            'persetujuan' => $status,
            'keterangan_persetujuan' => $keterangan_persetujuan,
            'id_update'   => $id_update,
            'tgl_update'   => $tgl_update,
            'tgl_terbit_legalitas'   => $tgl_terbit_legalitas,
        );        
        $this->db->where('id_koperasi',$idx);
        $this->db->update('koperasi',$data);
    }

    public function edit_profil_koperasi_password($idx){
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $koperasi = $this->input->post('koperasi');
        $pimpinan = $this->input->post('pimpinan');
        $pic = $this->input->post('pic');
        $jabatan = $this->input->post('jabatan');
        $provinsi = $this->input->post('provinsi');
        $kabupaten = $this->input->post('kabupaten');
        $kecamatan = $this->input->post('kecamatan');
        $kelurahan = $this->input->post('kelurahan');
        $kodepos = $this->input->post('kodepos');
        $tlp = $this->input->post('tlp');
        $hp = $this->input->post('hp');
        $alamat = $this->input->post('alamat');
        $rekening= $this->input->post('rekening');
        $nama_bank = $this->input->post('nama_bank');
        $cabang_bank = $this->input->post('cabang_bank');
        $legalitas = $this->input->post('legalitas');
        $notaris = $this->input->post('notaris');
        $pembentukan = $this->input->post('pembentukan');
        $tgl_update= date('Y-m-d H:i:s');
        $id_update = $this->auth_m->data('idx');

        $data = array(
            'email'       => $email,
            'password'    => $password,
            'koperasi'    => $koperasi,
            'pimpinan'    => $pimpinan,
            'pic'         => $pic,
            'jabatan'     => $jabatan,
            'provinsi'    => $provinsi,
            'kabupaten'   => $kabupaten,
            'kecamatan'   => $kecamatan,
            'kelurahan'   => $kelurahan,
            'kodepos'     => $kodepos,
            'tlp'         => $tlp,
            'hp'          => $hp,
            'alamat'      => $alamat,
            'rekening'    => $rekening,
            'nama_bank'   => $nama_bank,
            'cabang_bank' => $cabang_bank,
            'legalitas'   => $legalitas,
            'notaris'     => $notaris,
            'pembentukan' => $pembentukan,
            'id_update'   => $id_update,
            'tgl_update'   => $tgl_update,
        );        
        $this->db->where('id_koperasi',$idx);
        $this->db->update('koperasi',$data);
    }

    public function edit_profil_koperasi($idx){
        $keterangan_persetujuan = $this->input->post('keterangan_persetujuan');
        $email = $this->input->post('email');
        $koperasi = $this->input->post('koperasi');
        $pimpinan = $this->input->post('pimpinan');
        $pic = $this->input->post('pic');
        $jabatan = $this->input->post('jabatan');
        $provinsi = $this->input->post('provinsi');
        $kabupaten = $this->input->post('kabupaten');
        $kecamatan = $this->input->post('kecamatan');
        $kelurahan = $this->input->post('kelurahan');
        $kodepos = $this->input->post('kodepos');
        $tlp = $this->input->post('tlp');
        $hp = $this->input->post('hp');
        $alamat = $this->input->post('alamat');
        $rekening= $this->input->post('rekening');
        $nama_bank = $this->input->post('nama_bank');
        $cabang_bank = $this->input->post('cabang_bank');
        $legalitas = $this->input->post('legalitas');
        $notaris = $this->input->post('notaris');
        $pembentukan = $this->input->post('pembentukan');
        $tgl_update= date('Y-m-d H:i:s');
        $id_update = $this->auth_m->data('idx');

        $data = array(
            'email'       => $email,
            'koperasi'    => $koperasi,
            'pimpinan'    => $pimpinan,
            'pic'         => $pic,
            'jabatan'     => $jabatan,
            'provinsi'    => $provinsi,
            'kabupaten'   => $kabupaten,
            'kecamatan'   => $kecamatan,
            'kelurahan'   => $kelurahan,
            'kodepos'     => $kodepos,
            'tlp'         => $tlp,
            'hp'          => $hp,
            'alamat'      => $alamat,
            'rekening'    => $rekening,
            'nama_bank'   => $nama_bank,
            'cabang_bank' => $cabang_bank,
            'legalitas'   => $legalitas,
            'notaris'     => $notaris,
            'pembentukan' => $pembentukan,
            'id_update'   => $id_update,
            'tgl_update'   => $tgl_update,
        );        
        $this->db->where('id_koperasi',$idx);
        $this->db->update('koperasi',$data);
    }

    
	/*public function reset_email($email){

        $this->db->where('email',$email);
        return $this->db->get('koperasi');
	}*/

    public function email_registrasi($email){
		#$cek = $this->Koperasi_m->reset_email($email);
 
		#if($cek->num_rows()>0){
			$data=$this->db->query("select * from tb_koperasi where email='$email'");
			foreach ($data->result() as $sess) {					
				$id_user= $sess->id_koperasi;
				$user_name= $sess->email;/*
				$user_akses= $sess->user_akses;
				$level= $sess->level;
				$foto= $sess->foto;
				$email= $sess->email;
				$status= $sess->status;*/
			}

			$emails=$this->db->query("select * from tb_email");
			foreach ($emails->result() as $data) {					
				$username 	= $data->email;
				$password 	= $data->password;
				$port 		= $data->port;
				$host 		= $data->host;
				$protocol 	= $data->protocol;
			}

			  //enkripsi id
    		$encrypted_id = md5($id_user);
			$from 	= 'from : No-Replay <'.$username.'>';
			$subjek	= 'verifikasi Email';
			/*$pesan 	=	"Yang terhormat Bapak/Ibu ".strtoupper($user_name).",	<br/><br/>

						Terima kasih telah melakukan registrasi, untuk memverifikasi silahkan klik tautan dibawah ini.<br> ".
						site_url("index.php/koperasi/koperasi/verification/$encrypted_id"). "
						";*/
			$pesan  =   '
                            <html>
                                <head>
                                  <title>Notifikasi</title>
                                </head>
                                <body>
                                  <p>Yth '.strtoupper($user_name).'</p>
                                  <p> Terima kasih telah melakukan registrasi, untuk memverifikasi silahkan klik tautan dibawah ini.&nbsp;&nbsp;</p>
                                  <p>'. site_url("index.php/koperasi/koperasi/verification/$encrypted_id"). '</p>
                                   
                                <hr /> 
                                <p>&nbsp;* Email ini dikirimkan secara otomatis oleh aplikasi BPDP, mohon untuk tidak mengirimkan balasan ke alamat email ini.</p> <p>&nbsp;</p> <hr />  
                                <p  style=\'text-align: left;\'><img style=\'display: block; margin-left: auto; margin-right: auto;text-align: left;\'
                                    src=\'http://pelatihan.bpdp.or.id/assets/img/logo_bpdp.png\' alt=""
                                    width=\'200\' height=\'44\' /></p>
                                <p style=\'text-align: center;\'>Copyrights 2017 &ndash; BPDP-KS</p>
                                </body>
                                </html>
                            ';
				    $url 					= $_SERVER['HTTP_REFERER'];
					$config['protocol'] 	= $protocol; 
					$config['smtp_host'] 	= $host; 
					$config['smtp_port'] 	= $port; 
					$config['smtp_user'] 	= $username;
					$config['smtp_pass'] 	= $password;
					$config['charset'] 		= 'iso-8859-1';
					$config['mailtype'] 	= 'html';
					$config['wordwrap'] 	= TRUE;

				    $this->load->library('email', $config);
			#var_dump($email);exit;
				 
					$this->email->from($from, 'No-Reply');
					$this->email->to($email);
					$this->email->subject($subjek);
					$this->email->message($pesan);
					$this->email->send();
		#}
	}
	public function changeActiveState($key)
	{
		//$this->load->database();
		$data = array(
           'verifikasi_email' => 1
        );

		$this->db->where('md5(id_koperasi)', $key);
		$this->db->update('koperasi', $data);

		return true;
	}
    public function dropdown_status_koperasi()
    {
        $arr = array();
        $sql = "SELECT * from tb_koperasi group by persetujuan order by persetujuan asc";
        $query = $this->db->query($sql);
        $data = parent ::get();
        if ($query)
        {
            foreach($query->result() as $d)
            {
                $arr[$d->persetujuan][0]= $d->persetujuan; 
            }
            
            return $arr;
        }
    }
}
?>
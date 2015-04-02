<?php

class M_home extends CI_Model {
    
    function load_data_berita_highlight($start = NULL, $limit = NULL, $search = NULL) {
        $limitation = NULL; $q = NULL;
        if ($start !== NULL) {
            $limitation = " limit $start, $limit";
        }
        if ($search['id'] !== NULL) {
            $q.=" and id = '".$search['id']."'";
        }
        $sql = "select * from berita where id is not NULL $q order by id desc $limitation";
        
        return $this->db->query($sql);
    }
    
    function load_data_perusahaan($search = NULL) {
        $q = NULL;
        if ($search !== NULL && $search['id'] !== '') {
            $q.=" and id = '".$search['id']."'";
        }
        $sql = "select * from perusahaan where id is not NULL $q order by nama asc";
        return $this->db->query($sql);
    }
    
    function load_data_lowongan_highlight($start = NULL, $limit = NULL, $search = NULL) {
        $limitation = ""; $q = NULL;
        if ($start !== NULL) {
            $limitation = " limit $start, $limit";
        }
        if ($search['id'] !== NULL) {
            $q.=" and l.id = '".$search['id']."'";
        }
        $sql = "select p.*, l.id, l.isi, l.berlaku, l.tanggal, l.status, l.tgl_tes, l.judul from lowongan l join perusahaan p on (l.id_perusahaan = p.id) where l.id is not NULL $q order by l.id desc $limitation";
        //echo $sql."<br/>";
        return $this->db->query($sql);
    }
    
    function load_data_slider() {
        $sql = "select * from slider order by id desc";
        return $this->db->query($sql);
    }
    
    function load_data_contact() {
        $sql = "select * from contact";
        return $this->db->query($sql);
    }
    
    function load_data_jurusan() {
        $sql = "select * from jurusan order by nama asc";
        return $this->db->query($sql);
    }
    
    function save_data_alumni() {
        $this->db->trans_begin();
        $data_post = array(
            'nama' => post_safe('name'),
            'tinggi' => post_safe('tb'),
            'berat' => post_safe('bb'),
            'ortu' => post_safe('pkjortu'),
            'penyakit' => post_safe('riwayatsakit'),
            'jurusan' => post_safe('jurusan'),
            'tahun' => post_safe('thnlulus'),
            'telp' => post_safe('notelp'),
            'cita' => post_safe('citacita'),
            'status' => post_safe('stllulus')
        );
        $this->db->insert('alumni', $data_post);
        if ($this->db->trans_status() === FALSE) {
            $result['status'] = FALSE;
        } else {
            $this->db->trans_commit();
            $result['status'] = TRUE;
        }
        return $result;
    }
    
    function save_pendaftaran() {
        $this->db->trans_begin();
        $nama_lengkap       = post_safe('nama_lengkap');
        $nama_panggilan     = post_safe('nama_panggilan');
        $jenis_kelamin      = post_safe('jenis_kelamin');
        $tempat_lahir       = post_safe('tempat_lahir');
        $tanggal_lahir      = post_safe('tanggal_lahir');
        $agama              = post_safe('agama');
        $status_pernikahan  = post_safe('status_pernikahan');
        $tinggi_badan       = post_safe('tinggi_badan');
        $berat_badan        = post_safe('berat_badan');
        $no_ktp             = post_safe('no_ktp');
        $masa_ktp           = post_safe('masa_ktp');
        $alamat_rumah       = post_safe('alamat_rumah');
        $kab_kota           = post_safe('kab_kota');
        $provinsi           = post_safe('provinsi');
        $kodepos            = post_safe('kodepos');
        $telp               = post_safe('telp');
        $ponsel             = post_safe('ponsel');
        $alamat_saat_ini    = post_safe('alamat_saat_ini');
        $kab_kota1          = post_safe('kab_kota1');
        $provinsi1          = post_safe('provinsi1');
        $kodepos1           = post_safe('kodepos1');
        $pendidikan         = post_safe('pendidikan');
        $nama_sekolah       = post_safe('nama_sekolah');
        $nama_kota          = post_safe('nama_kota');
        $jurusan            = post_safe('jurusan');
        $nilai_rata_ijazah  = post_safe('nilai_rata_ijazah');
        $semester1          = post_safe('semester1');
        $semester2          = post_safe('semester2');
        $semester3          = post_safe('semester3');
        $semester4          = post_safe('semester4');
        $semester5          = post_safe('semester5');
        $semester6          = post_safe('semester6');
        $tahun_kelulusan    = post_safe('tahun_kelulusan');
        $bkk_asal           = post_safe('bkk_asal');

        $username  = post_safe('username');
        $password  = post_safe('password');
        $password1 = post_safe('password1');
        
        $data_array = array(
            'username' => $username,
            'password' => md5($password1),
            'nama_lengkap' => $nama_lengkap,
            'nama_panggilan' => $nama_panggilan,
            'jenis_kelamin' => $jenis_kelamin,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'agama' => $agama,
            'status_pernikahan' => $status_pernikahan,
            'tinggi_badan' => $tinggi_badan,
            'berat_badan' => $berat_badan,
            'no_ktp' => $no_ktp,
            'masa_ktp' => $masa_ktp,
            'alamat_rumah' => $alamat_rumah,
            'kab_kota' => $kab_kota,
            'provinsi' => $provinsi,
            'kode_pos' => $kodepos,
            'telp' => $telp,
            'ponsel' => $ponsel,
            'alamat_saat_ini' => $alamat_saat_ini,
            'kab_kota1' => $kab_kota1,
            'provinsi1' => $provinsi1,
            'kodepos1' => $kodepos1,
            'pendidikan' => $pendidikan,
            'nama_sekolah' => $nama_sekolah,
            'nama_kota' => $nama_kota,
            'jurusan' => $jurusan,
            'nilai_rata_ijazah' => $nilai_rata_ijazah,
            'semester1' => $semester1,
            'semester2' => $semester2,
            'semester3' => $semester3,
            'semester4' => $semester4,
            'semester5' => $semester5,
            'semester6' => $semester6,
            'tahun_kelulusan' => $tahun_kelulusan,
            'bkk_asal' => $bkk_asal
        );
        $this->db->insert('pendaftar', $data_array);
        if ($this->db->trans_status() === FALSE) {
            $result['status'] = FALSE;
        } else {
            $this->db->trans_commit();
            $result['status'] = TRUE;
        }
        return $result;
    }
}
<?php

class M_member extends CI_Model {
    
    function get_data_member($id_member) {
        $sql = "select p.*, j.nama as nama_jurusan, b.nama as asal_sekolah 
            from pendaftar p 
            join jurusan j on (p.jurusan = j.id) 
            join bkk b on (p.bkk_asal = b.id)
            where p.id = '$id_member'";
        return $this->db->query($sql);
    }
    
    function save_apply_me() {
        
        $data_array = array(
            'id_pendaftar' => $this->session->userdata('id_member'),
            'id_lowongan' => post_safe('id_lowongan')
        );
        $sql = "select id,waktu_daftar from lamaran where id_pendaftar = '".$this->session->userdata('id_member')."' and id_lowongan = '".post_safe('id_lowongan')."'";
        //echo $sql;
        $check = $this->db->query($sql)->row();
        if (empty($check->id)) {
            $this->db->insert('lamaran', $data_array);
            $result['id'] = $this->db->insert_id();
            $result['act'] = 'add';
        } else {
            $result['act'] = 'sudah terdaftar';
            $result['time']= $check->waktu_daftar;
        }
        return $result;
    }
    
    function get_list_jobvacancy($limit, $start, $search) {
        //$limitation = null; 
        $q = NULL;
        if ($search['id'] !== '') {
            $q.=" and l.id = '".$search['id']."'";
        }
        $limitation =" limit $start , $limit";
        
        $sql = "select l.*, p.nama as perusahaan, p.logo, p.deskripsi,
            (select count(id) from lamaran where id_lowongan = l.id) as pelamar,
            datediff(l.berlaku, NOW()) as selisih
            from lowongan l 
            join perusahaan p on (l.id_perusahaan = p.id) 
            where l.id is not NULL $q order by l.id desc";
        $query = $this->db->query($sql.$limitation);
        //echo $sql . $limitation;
        $queryAll = $this->db->query($sql);
        $data['data'] = $query->result();
        $data['jumlah'] = $queryAll->num_rows();
        return $data;
    }
    
    function get_list_data_lamaran_kerja($limit, $start, $search) {
        $q = NULL;
        if ($search['id'] !== '') {
            $q.=" and l.id = '".$search['id']."'";
        }
        $limitation =" limit $start , $limit";
        
        $sql = "select lm.*, p.nama as perusahaan, p.logo, p.deskripsi, l.judul, IFNULL(lm.status,'Processing') as status,
            l.berlaku, l.id,
            (select count(id) from lamaran where id_lowongan = l.id) as pelamar,
            datediff(l.berlaku, NOW()) as selisih
            from lamaran lm
            join lowongan l on (lm.id_lowongan = l.id)
            join perusahaan p on (l.id_perusahaan = p.id) 
            where lm.id_pendaftar = '".$this->session->userdata('id_member')."' $q order by l.id desc";
        $query = $this->db->query($sql.$limitation);
        //echo $sql . $limitation;
        $queryAll = $this->db->query($sql);
        $data['data'] = $query->result();
        $data['jumlah'] = $queryAll->num_rows();
        return $data;
    }
}
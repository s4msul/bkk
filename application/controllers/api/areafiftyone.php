<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Areafiftyone extends REST_Controller {
    
    function __construct() {
        parent::__construct();
        $this->limit = 10;
        $this->load->model(array('m_masterdata'));

        $id_user = $this->session->userdata('id_user');
        if (empty($id_user)) {
            $this->response(array('error' => 'Anda belum login'), 401);
        }
    }
    
    /*BERITA*/
    function beritas_get() {
        if (!$this->get('page')) {
            $this->response(NULL, 400);
        }
        
        $start = ($this->get('page') - 1) * $this->limit;
        
        $search= array(
            'id' => $this->get('id')
        );
        
        $data = $this->m_masterdata->get_list_berita($this->limit, $start, $search);
        $data['page'] = (int)$this->get('page');
        $data['limit'] = $this->limit;
        
        if($data){
            $this->response($data, 200); // 200 being the HTTP response code
        }else{
            $this->response(array('error' => 'Data tidak ditemukan'), 404);
        }
    }
    
    function berita_post() {
        $data = $this->m_masterdata->save_berita();
        $this->response($data, 200);
    }
    
    function berita_delete() {
        $data = $this->db->query("select gambar from berita where id = '".$this->get('id')."'")->row();
        @unlink('assets/images/projects/'.$data->gambar);
        $this->db->delete('berita', array('id' => $this->get('id')));
    }
    
    /*LOWONGAN PEKERJAAN*/
    function jobvacancys_get() {
        if (!$this->get('page')) {
            $this->response(NULL, 400);
        }
        
        $start = ($this->get('page') - 1) * $this->limit;
        
        $search= array(
            'id' => $this->get('id')
        );
        
        $data = $this->m_masterdata->get_list_jobvacancy($this->limit, $start, $search);
        $data['page'] = (int)$this->get('page');
        $data['limit'] = $this->limit;
        
        if($data){
            $this->response($data, 200); // 200 being the HTTP response code
        }else{
            $this->response(array('error' => 'Data tidak ditemukan'), 404);
        }
    }
    
    function jobvacancy_post() {
        $data = $this->m_masterdata->save_jobvacancy();
        $this->response($data, 200);
    }
    
    function jobvacancy_delete() {
        $this->db->delete('lowongan', array('id' => $this->get('id')));   
    }
    
    /*PERUSAHAAN*/
    function perusahaans_get() {
        if (!$this->get('page')) {
            $this->response(NULL, 400);
        }
        
        $start = ($this->get('page') - 1) * $this->limit;
        
        $search= array(
            'id' => $this->get('id')
        );
        
        $data = $this->m_masterdata->get_list_perusahaan($this->limit, $start, $search);
        $data['page'] = (int)$this->get('page');
        $data['limit'] = $this->limit;
        
        if($data){
            $this->response($data, 200); // 200 being the HTTP response code
        }else{
            $this->response(array('error' => 'Data tidak ditemukan'), 404);
        }
    }
    
    function perusahaan_post() {
        $data = $this->m_masterdata->save_perusahaan();
        $this->response($data, 200);
    }
    
    function perusahaan_delete() {
        $data = $this->db->query("select logo from perusahaan where id = '".$this->get('id')."'")->row();
        @unlink('assets/images/articles/'.$data->logo);
        $this->db->delete('perusahaan', array('id' => $this->get('id')));
    }
    
    /*MITRA*/
    function mitras_get() {
        if (!$this->get('page')) {
            $this->response(NULL, 400);
        }
        
        $start = ($this->get('page') - 1) * $this->limit;
        
        $search= array(
            'id' => $this->get('id')
        );
        
        $data = $this->m_masterdata->get_list_mitra($this->limit, $start, $search);
        $data['page'] = (int)$this->get('page');
        $data['limit'] = $this->limit;
        
        if($data){
            $this->response($data, 200); // 200 being the HTTP response code
        }else{
            $this->response(array('error' => 'Data tidak ditemukan'), 404);
        }
    }
    
    function mitra_post() {
        $data = $this->m_masterdata->save_mitra();
        $this->response($data, 200);
    }
    
    function mitra_delete() {
        $this->db->delete('bkk', array('id' => $this->get('id')));   
    }
    
    /*JURUSAN*/
    function jurusans_get() {
        if (!$this->get('page')) {
            $this->response(NULL, 400);
        }
        
        $start = ($this->get('page') - 1) * $this->limit;
        
        $search= array(
            'id' => $this->get('id')
        );
        
        $data = $this->m_masterdata->get_list_jurusan($this->limit, $start, $search);
        $data['page'] = (int)$this->get('page');
        $data['limit'] = $this->limit;
        
        if($data){
            $this->response($data, 200); // 200 being the HTTP response code
        }else{
            $this->response(array('error' => 'Data tidak ditemukan'), 404);
        }
    }
    
    function jurusan_post() {
        $data = $this->m_masterdata->save_jurusan();
        $this->response($data, 200);
    }
    
    function jurusan_delete() {
        $this->db->delete('bkk', array('id' => $this->get('id')));   
    }
    
    /*PENDAFTAR*/
    function pendaftars_get() {
        if (!$this->get('page')) {
            $this->response(NULL, 400);
        }
        
        $start = ($this->get('page') - 1) * $this->limit;
        
        $search= array(
            'id' => $this->get('id')
        );
        
        $data = $this->m_masterdata->get_list_pendaftar($this->limit, $start, $search);
        $data['page'] = (int)$this->get('page');
        $data['limit'] = $this->limit;
        
        if($data){
            $this->response($data, 200); // 200 being the HTTP response code
        }else{
            $this->response(array('error' => 'Data tidak ditemukan'), 404);
        }
    }
    
    function pendaftar_post() {
        $data = $this->m_masterdata->save_pendaftar();
        $this->response($data, 200);
    }
    
    function pendaftar_delete() {
        $this->db->delete('pendaftar', array('id' => $this->get('id')));   
    }
    
    /*ALUMNI*/
    function alumnis_get() {
        if (!$this->get('page')) {
            $this->response(NULL, 400);
        }
        
        $start = ($this->get('page') - 1) * $this->limit;
        
        $search= array(
            'id' => $this->get('id')
        );
        
        $data = $this->m_masterdata->get_list_alumni($this->limit, $start, $search);
        $data['page'] = (int)$this->get('page');
        $data['limit'] = $this->limit;
        
        if($data){
            $this->response($data, 200); // 200 being the HTTP response code
        }else{
            $this->response(array('error' => 'Data tidak ditemukan'), 404);
        }
    }
    
    function alumni_post() {
        $data = $this->m_masterdata->save_alumni();
        $this->response($data, 200);
    }
    
    function alumni_delete() {
        $this->db->delete('alumni', array('id' => $this->get('id')));   
    }
    
    /*SLIDER IMAGE*/
    function slides_get() {
        if (!$this->get('page')) {
            $this->response(NULL, 400);
        }
        
        $start = ($this->get('page') - 1) * $this->limit;
        
        $search= array(
            'id' => $this->get('id')
        );
        
        $data = $this->m_masterdata->get_list_slide($this->limit, $start, $search);
        $data['page'] = (int)$this->get('page');
        $data['limit'] = $this->limit;
        
        if($data){
            $this->response($data, 200); // 200 being the HTTP response code
        }else{
            $this->response(array('error' => 'Data tidak ditemukan'), 404);
        }
    }
    
    function slide_post() {
        $data = $this->m_masterdata->save_slide();
        $this->response($data, 200);
    }
    
    function slide_delete() {
        $data = $this->db->query("select gambar from slider where id = '".$this->get('id')."'")->row();
        @unlink('assets/images/slider-cycle/'.$data->gambar);
        $this->db->delete('slide', array('id' => $this->get('id')));
    }
    
    /*DATA LAMARAN PELAMAR*/
    function lamarans_get() {
        if (!$this->get('page')) {
            $this->response(NULL, 400);
        }
        
        $start = ($this->get('page') - 1) * $this->limit;
        
        $search= array(
            'id' => $this->get('id')
        );
        
        $data = $this->m_masterdata->get_list_lamaran($this->limit, $start, $search);
        $data['page'] = (int)$this->get('page');
        $data['limit'] = $this->limit;
        
        if($data){
            $this->response($data, 200); // 200 being the HTTP response code
        }else{
            $this->response(array('error' => 'Data tidak ditemukan'), 404);
        }
    }
    
    function lamaran_post() {
        $data = $this->m_masterdata->save_lamaran();
        $this->response($data, 200);
    }
    
    function lamaran_delete() {
        $this->db->delete('lamaran', array('id' => $this->get('id')));   
    }
}
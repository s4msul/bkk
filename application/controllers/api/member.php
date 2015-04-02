<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Member extends REST_Controller {
    
    function __construct() {
        parent::__construct();
        $this->limit = 10;
        $this->load->model(array('m_masterdata','m_member'));

        $id_user = $this->session->userdata('id_member');
        if (empty($id_user)) {
            $this->response(array('error' => 'Anda belum login'), 401);
        }
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
        
        $data = $this->m_member->get_list_jobvacancy($this->limit, $start, $search);
        $data['page'] = (int)$this->get('page');
        $data['limit'] = $this->limit;
        
        if($data){
            $this->response($data, 200); // 200 being the HTTP response code
        }else{
            $this->response(array('error' => 'Data tidak ditemukan'), 404);
        }
    }
    
    function applyme_post() {
        $data = $this->m_member->save_apply_me();
        $this->response($data,200);
    }
    
    function data_lamaran_kerjas_get() {
        if (!$this->get('page')) {
            $this->response(NULL, 400);
        }
        
        $start = ($this->get('page') - 1) * $this->limit;
        
        $search= array(
            'id' => $this->get('id')
        );
        
        $data = $this->m_member->get_list_data_lamaran_kerja($this->limit, $start, $search);
        $data['page'] = (int)$this->get('page');
        $data['limit'] = $this->limit;
        
        if($data){
            $this->response($data, 200); // 200 being the HTTP response code
        }else{
            $this->response(array('error' => 'Data tidak ditemukan'), 404);
        }
    }
    
}
<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Main extends REST_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model(array('m_home'));
    }
    
    function save_alumni_post() {
        $data = $this->m_home->save_data_alumni();
        $this->response($data, 200);
    }
    
    function save_pendaftaran_post() {
        $data = $this->m_home->save_pendaftaran();
        $this->response($data, 200);
    }
}
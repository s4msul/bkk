<?php

class Member extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model(array('m_home','m_member'));
        $this->load->library('pagination');
        $this->title = 'MEMBER AREA';
        $this->brand = 'BKK | MEMBER';
        $this->active=  $this->uri->segment(2);
        $id_user = $this->session->userdata('id_member');
        if (empty($id_user)) {
            redirect('/');
        }
    }
    
    function index() {
        $data['segment'] = $this->active;
        $id_user = $this->session->userdata('id_member');
        if (!empty($id_user)) {
            $data['title'] = 'Member Area';
            $data['brand'] = $this->brand;
            $data['profile'] = $this->m_member->get_data_member($id_user)->row();
            $this->load->view('member/dashboard', $data);
        } else {
            redirect('/');
        }
    }
    
    function jobvacancy() {
        $data['title'] = 'Lowongan Pekerjaan';
        $data['segment'] = $this->active;
        $data['brand'] = $this->brand;
        $data['perusahaan'] = $this->m_home->load_data_perusahaan()->result();
        //$data['list_lowongan'] = $this->m_home->load_data_lowongan_highlight()->result();
        $this->load->view('member/jobvacancy', $data);
    }
    
    function lamaran() {
        $data['title'] = 'Data Lamaran Pekerjaan';
        $data['segment'] = $this->active;
        $data['brand'] = $this->brand;
        //$data['perusahaan'] = $this->m_home->load_data_perusahaan()->result();
        $this->load->view('member/lamaran', $data);
    }
}
<?php

class Main extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model(array('m_home'));
        $this->load->library('pagination');
        $this->title = 'Bursa Kerja Khusus | SMK N 1 Purwokerto';
    }
    
    function index() {
        $data['title'] = $this->title;
        $data['list_berita'] = $this->m_home->load_data_berita_highlight(0, 5)->result();
        $data['list_prsh'] = $this->m_home->load_data_perusahaan()->result();
        $data['list_lowongan'] = $this->m_home->load_data_lowongan_highlight()->result();
        $data['slider'] = $this->m_home->load_data_slider()->result();
        $this->load->view('home', $data);
    }
    
    function news($page = NULL) {
        $data['title'] = $this->title;
        $limit = 5;
        $start = ($page) * $limit;
        
        $data['list_berita'] = $this->m_home->load_data_berita_highlight($start, $limit)->result();
        $total = $this->m_home->load_data_berita_highlight()->num_rows();
        $data['list_prsh'] = $this->m_home->load_data_perusahaan()->result();
        $config['base_url'] = base_url('main/news');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit; 
        $this->pagination->initialize($config); 
        $data['paging'] = $this->pagination->create_links();
        $this->load->view('visitor/berita', $data);
    }
    
    function detailnews($id) {
        $data['title'] = $this->title;
        $search = array(
            'id' => $id
        );
        $data['list_prsh'] = $this->m_home->load_data_perusahaan()->result();
        $data['data'] = $this->m_home->load_data_berita_highlight(NULL, NULL, $search)->row(); 
        $this->load->view('visitor/berita-detail', $data);
    }
    
    function jobvacancy($page = NULL) {
        $data['title'] = $this->title;
        $limit = 2;
        $start = ($page) * $limit;
        $data['list_prsh'] = $this->m_home->load_data_perusahaan()->result();
        $data['list_lowongan'] = $this->m_home->load_data_lowongan_highlight($start, $limit)->result();
        $total = $this->m_home->load_data_lowongan_highlight()->num_rows();
        $config['base_url'] = base_url('main/jobvacancy');
        $config['total_rows'] = $total;
        $config['per_page'] = $limit; 
        $this->pagination->initialize($config); 
        $data['paging'] = $this->pagination->create_links();
        $this->load->view('visitor/jobvacancy', $data);
    }
    
    function jobvacancydetail($id) {
        $data['title'] = $this->title;
        $search = array(
            'id' => $id
        );
        $data['list_prsh'] = $this->m_home->load_data_perusahaan()->result();
        $data['data'] = $this->m_home->load_data_lowongan_highlight(NULL, NULL, $search)->row(); 
        $this->load->view('visitor/jobvacancy-detail', $data);
    }
    
    function contact() {
        $data['title'] = $this->title;
        $data['data'] = $this->m_home->load_data_contact()->row();
        $this->load->view('visitor/contact', $data);
    }
    
    function alumni() {
        $data['title'] = $this->title;
        $data['data'] = $this->m_home->load_data_contact()->row();
        $data['jurusan'] = $this->m_home->load_data_jurusan()->result();
        $this->load->view('visitor/alumni', $data);
    }
    
    function daftar() {
        $data['title'] = $this->title;
        $data['data'] = $this->m_home->load_data_contact()->row();
        $data['jurusan'] = $this->m_home->load_data_jurusan()->result();
        $this->load->view('visitor/pendaftaran', $data);
    }
    
    function login() {
        $data['title'] = 'Login | '.$this->title;
        $data['subtitle'] = $this->title;
        $data['log'] = 'member';
        $this->load->view('login', $data);
    }
    
    function perusahaandetail($id) {
        $data['title'] = $this->title;
        $search = array(
            'id' => $id
        );
        $data['list_prsh'] = $this->m_home->load_data_perusahaan(NULL)->result();
        $data['data'] = $this->m_home->load_data_perusahaan($search)->row(); 
        $this->load->view('visitor/perusahaan-detail', $data);
    }
}
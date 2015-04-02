<?php

class Areafiftyone extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model(array('m_masterdata','m_home'));
        $this->brand = 'BKK | AREA 51';
        $this->active=  $this->uri->segment(2);
        $id_user = $this->session->userdata('id_user');
        if (empty($id_user)) {
            redirect('/');
        }
    }
    
    function index() {
        $data['segment'] = $this->active;
        $id_user = $this->session->userdata('id_user');
        if (!empty($id_user)) {
            $data['title'] = 'Restricted Area';
            $data['brand'] = $this->brand;
            $this->load->view('auth/dashboard', $data);
        } else {
            redirect('/');
        }
    }
    
    function news() {
        $data['title'] = 'Berita';
        $data['segment'] = $this->active;
        $data['brand'] = $this->brand;
        
        $this->load->view('auth/adm-berita', $data);
    }
    
    function jobvacancy() {
        $data['title'] = 'Lowongan Pekerjaan';
        $data['segment'] = $this->active;
        $data['brand'] = $this->brand;
        $data['perusahaan'] = $this->m_home->load_data_perusahaan()->result();
        $this->load->view('auth/adm-jobvacancy', $data);
    }
    
    function perusahaan() {
        $data['title'] = 'Perusahaan / Instansi';
        $data['segment'] = $this->active;
        $data['brand'] = $this->brand;
        
        $this->load->view('auth/adm-perusahaan', $data);
    }
    
    function mitra() {
        $data['title'] = 'Mitra Bursa Kerja Khusus';
        $data['segment'] = $this->active;
        $data['brand'] = $this->brand;
        $this->load->view('auth/adm-mitra', $data);
    }
    
    function jurusan() {
        $data['title'] = 'Jurusan';
        $data['segment'] = $this->active;
        $data['brand'] = $this->brand;
        $this->load->view('auth/adm-jurusan', $data);
    }
    
    function pendaftar() {
        $data['title'] = 'Data Pendaftar';
        $data['segment'] = $this->active;
        $data['brand'] = $this->brand;
        $this->load->view('auth/adm-pendaftar', $data);
    }
    
    function laporan() {
        $data['title'] = 'Laporan Statistika';
        $data['segment'] = $this->active;
        $data['brand'] = $this->brand;
        $this->load->view('auth/adm-pendaftar', $data);
    }
    
    function alumni() {
        $data['title'] = 'Data Alumni';
        $data['segment'] = $this->active;
        $data['brand'] = $this->brand;
        $this->load->view('auth/adm-alumni', $data);
    }
    
    function slide_image() {
        $data['title'] = 'Image Slide';
        $data['segment'] = $this->active;
        $data['brand'] = $this->brand;
        
        $this->load->view('auth/adm-slide-image', $data);
    }
    
    function lamaran() {
        $data['title'] = 'Data Lamaran Pekerjaan';
        $data['segment'] = $this->active;
        $data['brand'] = $this->brand;
        $this->load->view('auth/adm-lamaran', $data);
    }
}
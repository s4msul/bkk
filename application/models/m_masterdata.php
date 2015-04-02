<?php

class M_masterdata extends CI_Model {
    
    /*BERITA*/
    function get_list_berita($limit, $start, $search) {
        //$limitation = null; 
        $q = NULL;
        if ($search['id'] !== '') {
            $q.=" and id = '".$search['id']."'";
        }
        $limitation =" limit $start , $limit";
        
        $sql = "select * from berita where id is not NULL $q order by id desc";
        $query = $this->db->query($sql.$limitation);
        //echo $sql . $limitation;
        $queryAll = $this->db->query($sql);
        $data['data'] = $query->result();
        $data['jumlah'] = $queryAll->num_rows();
        return $data;
    }
    
    function save_berita() {
        $id = post_safe('id');
        $UploadDirectory	= 'assets/images/projects/'; //Upload Directory, ends with slash & make sure folder exist
        $NewFileName= "";
        $data_array = array(
            'judul' => post_safe('judul'),
            'berlaku' => date2mysql(post_safe('berlaku')),
            'isi' => post_safe('isi_berita'),
            //'gambar' => (!empty(strtolower($_FILES['mFile']['name']))?strtolower($_FILES['mFile']['name']):'')
        );
        //die($UploadDirectory);
            // replace with your mysql database details
        if (!@file_exists($UploadDirectory)) {
                //destination folder does not exist
                die('No upload directory');
        }
        if ($id === '') {
            $this->db->insert('berita', $data_array);
            $result['act'] = 'add';
            $result['id'] = $this->db->insert_id();
        } else {
            $this->db->where('id', $id);
            $this->db->update('berita', $data_array);
            $result['act'] = 'edit';
            $result['id'] = $id;
        }
        if(isset($_FILES['mFile']['name'])) {

                $foto               = post_safe('gambar');
                $FileName           = strtolower($_FILES['mFile']['name']); //uploaded file name
                $FileTitle		= $FileName;
                $ImageExt		= substr($FileName, strrpos($FileName, '.')); //file extension
                $FileType		= $_FILES['mFile']['type']; //file type
                //$FileSize		= $_FILES['mFile']["size"]; //file size
                $RandNumber   		= rand(0, 99999); //Random number to make each filename unique.
                //$uploaded_date		= date("Y-m-d H:i:s");
                if ($foto !== '') {
                    @unlink('assets/images/projects/'.$foto);
                }
                switch(strtolower($FileType))
                {
                        //allowed file types
                        case 'image/png': //png file
                        case 'image/gif': //gif file 
                        case 'image/jpeg': //jpeg file
//                        case 'application/pdf': //PDF file
//                        case 'application/msword': //ms word file
//                        case 'application/vnd.ms-excel': //ms excel file
//                        case 'application/x-zip-compressed': //zip file
//                        case 'text/plain': //text file
//                        case 'text/html': //html file
                                break;
                        default:
                                die('Unsupported File!'); //output error
                }


                //File Title will be used as new File name
                $NewFileName = preg_replace(array('/\s/', '/\.[\.]+/', '/[^\w_\.\-]/'), array('_', '.', ''), strtolower($FileTitle));
                $NewFileName = $NewFileName.'_'.$RandNumber.$ImageExt;
           //Rename and save uploded file to destination folder.
           if(move_uploaded_file($_FILES['mFile']["tmp_name"], $UploadDirectory . $NewFileName ))
           {
                $this->db->where('id', $result['id']);
                $this->db->update('berita', array('gambar' => $NewFileName));
           } else {
                die('error uploading File!');
           }
        }
        die(json_encode($result));
        
    } 
    
    /*LOWONGAN PEKERJAAN*/
    function get_list_jobvacancy($limit, $start, $search) {
        //$limitation = null; 
        $q = NULL;
        if ($search['id'] !== '') {
            $q.=" and l.id = '".$search['id']."'";
        }
        $limitation =" limit $start , $limit";
        
        $sql = "select l.*, p.nama as perusahaan, p.logo, p.deskripsi,
            (select count(id) from lamaran where id_lowongan = l.id) as pelamar
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
    
    function save_jobvacancy() {
         $data_post = array(
             'id' => post_safe('id'),
             'id_perusahaan' => post_safe('perusahaan'),
             'judul' => post_safe('lowongan'),
             'isi' => post_safe('isi_jobvacancy'),
             'berlaku' => date2mysql(post_safe('berlaku')),
             'status' => post_safe('status'),
             'tgl_tes' => date2mysql(post_safe('tgl_test'))
         );
         if ($data_post['id'] === '') {
             $this->db->insert('lowongan', $data_post);
             $result['act'] = 'add';
         } else {
             $this->db->where('id', $data_post['id']);
             $this->db->update('lowongan', $data_post);
             $result['act'] = 'edit';
         }
         return $result;
    }
    
    /*PERUSAHAAN*/
    function get_list_perusahaan($limit, $start, $search) {
        //$limitation = null; 
        $q = NULL;
        if ($search['id'] !== '') {
            $q.=" and id = '".$search['id']."'";
        }
        $limitation =" limit $start , $limit";
        
        $sql = "select * from perusahaan where id is not NULL $q order by id desc";
        $query = $this->db->query($sql.$limitation);
        //echo $sql . $limitation;
        $queryAll = $this->db->query($sql);
        $data['data'] = $query->result();
        $data['jumlah'] = $queryAll->num_rows();
        return $data;
    }
    
    function save_perusahaan() {
        $id = post_safe('id');
        $UploadDirectory	= 'assets/images/articles/'; //Upload Directory, ends with slash & make sure folder exist
        $NewFileName= "";
        $data_array = array(
            'nama' => post_safe('judul'),
            'alamat' => post_safe('alamat'),
            'bidang' => post_safe('bidang'),
            'deskripsi' => post_safe('isi_perusahaan')
            //'gambar' => (!empty(strtolower($_FILES['mFile']['name']))?strtolower($_FILES['mFile']['name']):'')
        );
        //die($UploadDirectory);
            // replace with your mysql database details
        if (!@file_exists($UploadDirectory)) {
                //destination folder does not exist
                die('No upload directory');
        }
        if ($id === '') {
            $this->db->insert('perusahaan', $data_array);
            $result['act'] = 'add';
            $result['id'] = $this->db->insert_id();
        } else {
            $this->db->where('id', $id);
            $this->db->update('perusahaan', $data_array);
            $result['act'] = 'edit';
            $result['id'] = $id;
        }
        if(isset($_FILES['mFile']['name'])) {

                $foto               = post_safe('gambar');
                $FileName           = strtolower($_FILES['mFile']['name']); //uploaded file name
                $FileTitle		= $FileName;
                $ImageExt		= substr($FileName, strrpos($FileName, '.')); //file extension
                $FileType		= $_FILES['mFile']['type']; //file type
                //$FileSize		= $_FILES['mFile']["size"]; //file size
                $RandNumber   		= rand(0, 99999); //Random number to make each filename unique.
                //$uploaded_date		= date("Y-m-d H:i:s");
                if ($foto !== '') {
                    @unlink('assets/images/articles/'.$foto);
                }
                switch(strtolower($FileType))
                {
                        //allowed file types
                        case 'image/png': //png file
                        case 'image/gif': //gif file 
                        case 'image/jpeg': //jpeg file
//                        case 'application/pdf': //PDF file
//                        case 'application/msword': //ms word file
//                        case 'application/vnd.ms-excel': //ms excel file
//                        case 'application/x-zip-compressed': //zip file
//                        case 'text/plain': //text file
//                        case 'text/html': //html file
                                break;
                        default:
                                die('Unsupported File!'); //output error
                }


                //File Title will be used as new File name
                $NewFileName = preg_replace(array('/\s/', '/\.[\.]+/', '/[^\w_\.\-]/'), array('_', '.', ''), strtolower($FileTitle));
                $NewFileName = $NewFileName.'_'.$RandNumber.$ImageExt;
           //Rename and save uploded file to destination folder.
           if(move_uploaded_file($_FILES['mFile']["tmp_name"], $UploadDirectory . $NewFileName ))
           {
                $this->db->where('id', $result['id']);
                $this->db->update('perusahaan', array('logo' => $NewFileName));
           } else {
                die('error uploading File!');
           }
        }
        die(json_encode($result));
        
    } 
    
    /*MITRA BKK*/
    function get_list_mitra($limit, $start, $search) {
        //$limitation = null; 
        $q = NULL;
        if ($search['id'] !== '') {
            $q.=" and id = '".$search['id']."'";
        }
        $limitation =" limit $start , $limit";
        
        $sql = "select * from bkk where id is not NULL $q order by id desc";
        $query = $this->db->query($sql.$limitation);
        //echo $sql . $limitation;
        $queryAll = $this->db->query($sql);
        $data['data'] = $query->result();
        $data['jumlah'] = $queryAll->num_rows();
        return $data;
    }
    
    function save_mitra() {
         $data_post = array(
             'id' => post_safe('id'),
             'nama' => post_safe('mitra')
         );
         if ($data_post['id'] === '') {
             $this->db->insert('bkk', $data_post);
             $result['act'] = 'add';
         } else {
             $this->db->where('id', $data_post['id']);
             $this->db->update('bkk', $data_post);
             $result['act'] = 'edit';
         }
         return $result;
    }
    
    /*JURUSAN*/
    function get_list_jurusan($limit, $start, $search) {
        //$limitation = null; 
        $q = NULL;
        if ($search['id'] !== '') {
            $q.=" and id = '".$search['id']."'";
        }
        $limitation =" limit $start , $limit";
        
        $sql = "select * from jurusan where id is not NULL $q order by id desc";
        $query = $this->db->query($sql.$limitation);
        //echo $sql . $limitation;
        $queryAll = $this->db->query($sql);
        $data['data'] = $query->result();
        $data['jumlah'] = $queryAll->num_rows();
        return $data;
    }
    
    function save_jurusan() {
         $data_post = array(
             'id' => post_safe('id'),
             'nama' => post_safe('jurusan')
         );
         if ($data_post['id'] === '') {
             $this->db->insert('jurusan', $data_post);
             $result['act'] = 'add';
         } else {
             $this->db->where('id', $data_post['id']);
             $this->db->update('jurusan', $data_post);
             $result['act'] = 'edit';
         }
         return $result;
    }
    
    /*PENDAFTAR*/
    function get_list_pendaftar($limit, $start, $search) {
        //$limitation = null; 
        $q = NULL;
        if ($search['id'] !== '') {
            $q.=" and p.id = '".$search['id']."'";
        }
        $limitation =" limit $start , $limit";
        
        $sql = "select p.*, j.nama as nama_jurusan, b.nama as asal_sekolah 
            from pendaftar p 
            join jurusan j on (p.jurusan = j.id) 
            join bkk b on (p.bkk_asal = b.id)
            where p.id is not NULL $q order by p.id desc";
        $query = $this->db->query($sql.$limitation);
        //echo $sql . $limitation;
        $queryAll = $this->db->query($sql);
        $data['data'] = $query->result();
        $data['jumlah'] = $queryAll->num_rows();
        return $data;
    }
    
    function save_pendaftar() {
         $data_post = array(
             'id' => post_safe('id'),
             'status' => post_safe('route')
         );
         if ($data_post['id'] === '') {
             $this->db->insert('pendaftar', $data_post);
             $result['act'] = 'add';
         } else {
             $this->db->where('id', $data_post['id']);
             $this->db->update('pendaftar', $data_post);
             $result['act'] = 'edit';
         }
         return $result;
    }
    
    /*ALUMNI*/
    function get_list_alumni($limit, $start, $search) {
        //$limitation = null; 
        $q = NULL;
        if ($search['id'] !== '') {
            $q.=" and a.id = '".$search['id']."'";
        }
        $limitation =" limit $start , $limit";
        
        $sql = "select a.*, IFNULL(j.nama,'-') as jurusan from alumni a left join jurusan j on (a.jurusan = j.id) where a.id is not NULL $q order by a.id desc";
        $query = $this->db->query($sql.$limitation);
        //echo $sql . $limitation;
        $queryAll = $this->db->query($sql);
        $data['data'] = $query->result();
        $data['jumlah'] = $queryAll->num_rows();
        return $data;
    }
    
    /*IMAGE SLIDER*/
    function get_list_slide($limit, $start, $search) {
        //$limitation = null; 
        $q = NULL;
        if ($search['id'] !== '') {
            $q.=" and id = '".$search['id']."'";
        }
        $limitation =" limit $start , $limit";
        
        $sql = "select * from slider where id is not NULL $q order by id desc";
        $query = $this->db->query($sql.$limitation);
        //echo $sql . $limitation;
        $queryAll = $this->db->query($sql);
        $data['data'] = $query->result();
        $data['jumlah'] = $queryAll->num_rows();
        return $data;
    }
    
    function save_slide() {
        $id = post_safe('id');
        $UploadDirectory	= 'assets/images/slider-cycle/'; //Upload Directory, ends with slash & make sure folder exist
        $NewFileName= "";
        $data_array = array(
            'judul' => post_safe('judul'),
            'keterangan' => post_safe('isi_slide'),
            //'gambar' => (!empty(strtolower($_FILES['mFile']['name']))?strtolower($_FILES['mFile']['name']):'')
        );
        //die($UploadDirectory);
            // replace with your mysql database details
        if (!@file_exists($UploadDirectory)) {
                //destination folder does not exist
                die('No upload directory');
        }
        if ($id === '') {
            $this->db->insert('slider', $data_array);
            $result['act'] = 'add';
            $result['id'] = $this->db->insert_id();
        } else {
            $this->db->where('id', $id);
            $this->db->update('slider', $data_array);
            $result['act'] = 'edit';
            $result['id'] = $id;
        }
        if(isset($_FILES['mFile']['name'])) {

                $foto               = post_safe('gambar');
                $FileName           = strtolower($_FILES['mFile']['name']); //uploaded file name
                $FileTitle		= $FileName;
                $ImageExt		= substr($FileName, strrpos($FileName, '.')); //file extension
                $FileType		= $_FILES['mFile']['type']; //file type
                //$FileSize		= $_FILES['mFile']["size"]; //file size
                $RandNumber   		= rand(0, 99999); //Random number to make each filename unique.
                //$uploaded_date		= date("Y-m-d H:i:s");
                if ($foto !== '') {
                    @unlink('assets/images/slider-cycle/'.$foto);
                }
                switch(strtolower($FileType))
                {
                        //allowed file types
                        case 'image/png': //png file
                        case 'image/gif': //gif file 
                        case 'image/jpeg': //jpeg file
//                        case 'application/pdf': //PDF file
//                        case 'application/msword': //ms word file
//                        case 'application/vnd.ms-excel': //ms excel file
//                        case 'application/x-zip-compressed': //zip file
//                        case 'text/plain': //text file
//                        case 'text/html': //html file
                                break;
                        default:
                                die('Unsupported File!'); //output error
                }


                //File Title will be used as new File name
                $NewFileName = preg_replace(array('/\s/', '/\.[\.]+/', '/[^\w_\.\-]/'), array('_', '.', ''), strtolower($FileTitle));
                $NewFileName = $NewFileName.'_'.$RandNumber.$ImageExt;
           //Rename and save uploded file to destination folder.
           if(move_uploaded_file($_FILES['mFile']["tmp_name"], $UploadDirectory . $NewFileName ))
           {
                $this->db->where('id', $result['id']);
                $this->db->update('slider', array('gambar' => $NewFileName));
           } else {
                die('error uploading File!');
           }
        }
        die(json_encode($result));
        
    } 
    
    /*DATA LAMARAN*/
    function get_list_lamaran($limit, $start, $search) {
        //$limitation = null; 
        $q = NULL;
        if ($search['id'] !== '') {
            $q.=" and lm.id = '".$search['id']."'";
        }
        $limitation =" limit $start , $limit";
        
        $sql = "select lm.*, p.nama as perusahaan, p.logo, p.deskripsi, l.judul, 
            IFNULL(lm.status,'Processing') as status, l.berlaku, l.id, lm.id as id_lamaran,
            (select count(id) from lamaran where id_lowongan = l.id) as pelamar,
            pdf.nama_lengkap, b.nama as asal_sekolah,
            datediff(l.berlaku, NOW()) as selisih
            from lamaran lm
            join lowongan l on (lm.id_lowongan = l.id)
            join perusahaan p on (l.id_perusahaan = p.id) 
            join pendaftar pdf on (lm.id_pendaftar = pdf.id)
            join bkk b on (pdf.bkk_asal = b.id)
            where lm.id is not NULL $q order by l.id desc";
        $query = $this->db->query($sql.$limitation);
        //echo $sql . $limitation;
        $queryAll = $this->db->query($sql);
        $data['data'] = $query->result();
        $data['jumlah'] = $queryAll->num_rows();
        return $data;
    }
    
    function save_lamaran() {
        $data_array = array(
            'id' => post_safe('id'),
            'status' => (post_safe('status') !== '')?post_safe('status'):NULL,
            'berhak_ujian' => (post_safe('berhak_ujian') !== '')?post_safe('berhak_ujian'):NULL,
        );
        $this->db->where('id', $data_array['id']);
        $this->db->update('lamaran', $data_array);
        $result['act'] = 'edit';
        return $result;
    }
}
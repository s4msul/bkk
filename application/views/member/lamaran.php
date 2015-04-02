<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= base_url('assets/css/sb-admin.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/css/datepicker3.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/js/pnotify/jquery.pnotify.default.css') ?>" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="<?= base_url('assets/css/plugins/morris.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">
    <!-- Custom Fonts -->
    
    <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/pnotify/jquery.pnotify.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootbox.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.blockUI.js') ?>"></script>
    <script src="<?= base_url('assets/js/library.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap-datepicker.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.form.js') ?>"></script>
    <script src="<?= base_url('assets/tinymce/tinymce.min.js') ?>"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: "textarea",
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        });
        $(function() {
            get_list_data_lamaran_kerja(1);
            $('#reset').click(function() {
                reset_form();
                get_list_data_lamaran_kerja(1);
            });
            
            $('#bt_tambah').click(function() {
                $('#form_add').modal('show');
                tinyMCE.activeEditor.setContent('');
                reset_form();
                $('#form_add .title h4').html('Form Tambah data_lamaran_kerja');
            });
            
            $('#awal, #akhir').datepicker({
                format: "dd/mm/yyyy"
            }).on('changeDate', function(){
                $(this).datepicker('hide');
            });
        });
        
        function reset_form() {
            $('input[type=text], input[type=hidden], textarea, select').val('');
            $('#oldpict').html('');
        }
        
        function get_list_data_lamaran_kerja(p) {
            $('#form-pencarian').modal('hide');
            var id = '';
            $.ajax({
                type : 'GET',
                url: '<?= base_url("api/member/data_lamaran_kerjas") ?>/page/'+p+'/id/'+id,
                data: '',
                cache: false,
                dataType: 'json',
                beforeSend: function() {
                    show_ajax_indicator();
                },
                success: function(data) {
                    if ((p > 1) & (data.data.length === 0)) {
                        get_list_data_lamaran_kerja(p-1);
                        return false;
                    };

                    $('#pagination_no').html(pagination(data.jumlah, data.limit, data.page, 1));
                    $('#page_summary_no').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

                    $('#table_data tbody').empty();          
                    var str = '';

                    $.each(data.data,function(i, v){
                        var ppn  = (v.ppn/100)*v.total_asli;
                        var highlight = 'odd';
                        if ((i % 2) === 1) {
                            highlight = 'even';
                        };
                        str = '<tr class="'+highlight+'">'+
                                '<td align="center">'+((i+1) + ((data.page - 1) * data.limit))+'</td>'+
                                '<td align="center">'+datetimefmysql(v.waktu_daftar)+'</td>'+
                                '<td>'+v.perusahaan+'</td>'+
                                '<td>'+v.judul+'</td>'+
                                '<td align="center">'+datefmysql(v.berlaku)+'</td>'+
                                '<td>'+v.status+'</td>'+
                                '<td align="center">'+((v.berhak_ujian !== null)?v.berhak_ujian:'-')+'</td>'+
                                '<td align="right" class=aksi>'+
                                    '<button type="button" class="btn btn-default btn-xs" onclick="detail_lowongan('+v.id+');"><i class="fa fa-eye"></i></button>'+
                                '</td>'+
                            '</tr>';
                        $('#table_data tbody').append(str);
                        no = v.id;
                    });                
                },
                complete: function() {
                    hide_ajax_indicator();
                },
                error: function(e){
                    access_failed(e.status);
                    hide_ajax_indicator();
                }
            });
        }
        
        function detail_lowongan(id) {
            $('#form_add').modal('show');
            $.ajax({
                type : 'GET',
                url: '<?= base_url("api/member/jobvacancys") ?>/page/1/id/'+id,
                cache: false,
                dataType: 'json',
                beforeSend: function() {
                    show_ajax_indicator();
                },
                success: function(data) {
                    $('#id_lowongan').val(data.data[0].id);
                    $('#nama_lowongan').html(data.data[0].judul);
                    $('#form_add .title h4, #nama_prsh').html(data.data[0].perusahaan);
                    $('#closing_date').html(datefmysql(data.data[0].berlaku));
                    $('#totalpendaftar').html(data.data[0].total_pendaftar);
                    $('#logoprsh').html('<img src="<?= base_url('assets/images/articles') ?>/'+data.data[0].logo+'" style="width: 100px; border: 1px solid #ccc;" />');
                    $('#profile').html(data.data[0].deskripsi);
                    $('#isi_lowongan').html(data.data[0].isi);
                    $('#totalpendaftar').html(data.data[0].pelamar);
                    if (parseFloat(data.data[0].selisih) < 0) {
                        $('#labelbutton').html('Sudah Tutup');
                        $('#apply').attr('disabled','disabled');
                    } else {
                        $('#labelbutton').html('Apply');
                        $('#apply').removeAttr('disabled');
                    }
                },
                complete: function() {
                    hide_ajax_indicator();
                }
            });
        }
        
        function paging(p) {
            get_list_data_lamaran_kerja(p);
        }
        
        function konfirmasi_save() {
            $('#isi_data_lamaran_kerja').val(tinyMCE.get('isi').getContent());
            bootbox.dialog({
                message: "Anda yakin akan menyimpan data ini?",
                title: "Konfirmasi Simpan",
                buttons: {
                  batal: {
                    label: '<i class="fa fa-times-circle"></i> Tidak',
                    className: "btn-default",
                    callback: function() {

                    }
                  },
                  ya: {
                    label: '<i class="fa fa-save"></i>  Ya',
                    className: "btn-primary",
                    callback: function() {
                        save_data_lamaran_kerja();
                    }
                  }
                }
              });
          }
        
        function save_data_lamaran_kerja() {
            $('#formadd').ajaxSubmit({
                target: '#output',
                dataType: 'json',
                data: $('#formadd').serialize()+'&isi='+tinyMCE.activeEditor.getContent(),
                beforeSend: function() {
                    show_ajax_indicator();
                },
                success: function(msg) {
                    var page = $('.pagination .active a').html();
                    $('#form_add').modal('hide');
                    hide_ajax_indicator();
                    $('input[type=text],input[type=file], select').val('');
                    if (msg.act === 'add') {
                        message_add_success();
                        get_list_data_lamaran_kerja(1);
                    } else {
                        message_edit_success();
                        get_list_data_lamaran_kerja(page);
                    }
                },
                error: function(e) {
                    access_failed(e.status);
                    hide_ajax_indicator();
                }
            });
        }
        
        function delete_data_lamaran_kerja(id, page) {
            bootbox.dialog({
                message: "Anda yakin akan menghapus data ini?",
                title: "Konfirmasi Hapus",
                buttons: {
                  batal: {
                    label: '<i class="fa fa-times-circle"></i> Tidak',
                    className: "btn-default",
                    callback: function() {

                    }
                  },
                  ya: {
                    label: '<i class="fa fa-save"></i>  Ya',
                    className: "btn-primary",
                    callback: function() {
                        $.ajax({
                            type: 'DELETE',
                            url: '<?= base_url('api/areafiftyone/data_lamaran_kerja') ?>/id/'+id,
                            dataType: 'json',
                            success: function(data) {
                                message_delete_success();
                                get_list_data_lamaran_kerja(page);
                            }
                        });
                    }
                  }
                }
              });
          }
    </script>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php $this->load->view('auth/nav') ?>
        <div id="page-wrapper">

            <div class="container-fluid" style="min-height: 590px;">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="page-header">
                            <?= $title ?>
                        </h4>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?= base_url('member') ?>">Headquarter</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> <?= $title ?>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12 page-header">
                        <!--<?= form_button('cari', '<i class="fa fa-search"></i> Cari' ,'id=bt_cari class="btn" data-target=".bs-modal-lg"')?>-->
                        <?= form_button('reset', '<i class="fa fa-refresh"></i> Reload Data' ,'id=reset class="btn"')?>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-bordered table-stripped table-hover" id="table_data" width="100%">
                            <thead>
                                <tr>
                                    <th width="3%">No.</th>
                                    <th width="10%">Tgl Daftar</th>
                                    <th width="20%" class="left">PERUSAHAAN</th>
                                    <th width="30%" class="left">Lowongan</th>
                                    <th width="10%">Tgl Tutup</th>
                                    <th width="5%" class="left">Status</th>
                                    <th width="10%">Lulus Adm.</th>
                                    <th width="3%"></th>
                                </tr>
                            </thead>

                            <tbody></tbody>
                        </table>
                        <div id="pagination_no" class="pagination"></div>
                        <div class="page_summary" id="page_summary_no"></div>
                    </div>
                    
                </div>
                
                <div class="row">
                    &nbsp;
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    
    <div id="form_add" class="modal fade">
        <div class="modal-dialog" style="width: 800px; height: 100%;">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <div class="widget-header">
                <div class="title">
                    <h4></h4>
                </div>
            </div>
          </div>

          <div class="modal-body">
              <form id="form_lamar">
                  <input type="hidden" name="id_lowongan" id="id_lowongan" />
            <div class="row">
              <ol class="breadcrumb">
                  <li>
                      <i class="fa fa-info-circle"></i> <b id="nama_lowongan"></b>
                  </li>
                  <li>
                      <i class="fa fa-warning"></i>  Penutupan Pendaftaran: <b id="closing_date"></b>
                  </li>
                  <li class="active">
                      <i class="fa fa-users"></i> Total Pendaftar <b id="totalpendaftar"></b>
                  </li>
              </ol>
            </div>
            <div class="row">
                <div class="col-md-12">
                <table width="100%">
                    <tr valign="top">
                        <td id="logoprsh" width="110px"></td>
                        <td>
                            <h4 id="nama_prsh"></h4>
                            <span id="profile"></span>
                        </td>
                    </tr>
                </table>
                </div>
            </div>
              <hr/>
            <div class="row">
                <div class="col-md-12" id="isi_lowongan">
                    
                </div>
            </div>
              </form>
          </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-refresh"></i> Close</button>
            </div>
        </div>
        </div>
    </div>
    
    <!-- /#wrapper -->

    <!-- jQuery -->
    

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?= base_url('assets/js/plugins/morris/raphael.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/plugins/morris/morris.min.js') ?>"></script>
    
    
</body>

</html>

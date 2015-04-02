<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title ?></title>

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
        $(function() {
            get_list_jobvacancy(1);
            $('#reset').click(function() {
                reset_form();
                get_list_jobvacancy(1);
            });
            
            $('#bt_tambah').click(function() {
                reset_form();
                $('#form_add .title h4').html('Form Tambah jobvacancy');
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
        
        function get_list_jobvacancy(p) {
            var id = '';
            $.ajax({
                type : 'GET',
                url: '<?= base_url("api/member/jobvacancys") ?>/page/'+p+'/id/'+id,
                data: '',
                cache: false,
                dataType: 'json',
                beforeSend: function() {
                    show_ajax_indicator();
                },
                success: function(data) {
                    if ((p > 1) & (data.data.length === 0)) {
                        get_list_jobvacancy(p-1);
                        return false;
                    };

                    $('#pagination_no').html(pagination(data.jumlah, data.limit, data.page, 1));
                    $('#page_summary_no').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

                    $('#loaddata').empty();          
                    var str = '';

                    $.each(data.data,function(i, v){
                        str = '<table class="list-jobvacancy">'+
                                    '<tr valign="top"><td colspan="2">'+
                                        '<h4 class="post-title"><a href="">'+v.perusahaan+'</a></h4>'+
                                        '<p class="date">TANGGAL POSTING '+datetimefmysql(v.tanggal)+' // Lowongan Tutup pada '+indo_tgl(v.berlaku)+'</p>'+
                                        '</td>'+
                                    '</tr>'+
                                    '<tr valign="top"><td width="205px">'+
                                            '<img src="<?= base_url('assets/images/articles') ?>/'+v.logo+'" style="width: 205px; height: 185px;" />'+
                                        '</td>'+
                                        '<td>'+
                                        '<b>'+v.judul+'</b>'+
                                         ''+strip_tags(v.isi).substr(0,550)+'[...]'+
                                        '<p><button class="btn btn-primary btn-sm" onclick="detail_lowongan('+v.id+')">→ Read more</button></p>'+
                                        '</td>'+
                                    '</tr>'+
                                '</table>';
                        $('#loaddata').append(str);
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
        
        function paging(p) {
            get_list_jobvacancy(p);
        }
        
        function konfirmasi_save() {
            bootbox.dialog({
                message: "Anda yakin akan melamar pekerjaan ini?",
                title: "Konfirmasi Data",
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
                        save_lamaran();
                    }
                  }
                }
              });
          }
          
            function save_lamaran() {
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '<?= base_url('api/member/applyme') ?>',
                    data: $('#form_lamar').serialize(),
                    beforeSend: function() {
                        show_ajax_indicator();
                    },
                    success: function(msg) {
                        var page = $('.pagination .active a').html();
                        if (msg.act === 'add') {
                            $('#form_add').modal('hide');
                            message_add_success();
                            get_list_jobvacancy(page);
                        } else {
                            dinamic_alert('Anda sudah melakukan pendaftaran lowongan ini pada '+datetimefmysql(msg.time)+' !');
                        }
                    },
                    complete: function() {
                        hide_ajax_indicator();
                    },
                    error: function(e) {
                        access_failed(e.status);
                        hide_ajax_indicator();
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

            <div class="container-fluid">

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
                    <div class="col-lg-12" id="loaddata">
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div id="pagination_no" class="pagination"></div>
                        <div class="page_summary" id="page_summary_no"></div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
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
                <button type="button" class="btn btn-primary" id="apply" onclick="konfirmasi_save();"><i class="fa fa-check-circle-o"></i> <span id="labelbutton">Apply</span></button>
            </div>
        </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?= base_url('assets/js/plugins/morris/raphael.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/plugins/morris/morris.min.js') ?>"></script>
    

</body>

</html>

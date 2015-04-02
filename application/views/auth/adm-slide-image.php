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
        $(function() {
            get_list_slide(1);
            $('#reset').click(function() {
                reset_form();
                get_list_slide(1);
            });
            
            $('#bt_tambah').click(function() {
                $('#form_add').modal('show');
                reset_form();
                $('#form_add .title h4').html('Form Tambah slide');
            });
            
            $('#awal').datepicker({
                format: "dd/mm/yyyy"
            }).on('changeDate', function(){
                $(this).datepicker('hide');
            });
        });
        
        function reset_form() {
            $('input[type=text], input[type=hidden], textarea, select').val('');
            $('#oldpict').html('');
        }
        
        function get_list_slide(p) {
            $('#form-pencarian').modal('hide');
            var id = '';
            $.ajax({
                type : 'GET',
                url: '<?= base_url("api/areafiftyone/slides") ?>/page/'+p+'/id/'+id,
                data: '',
                cache: false,
                dataType: 'json',
                beforeSend: function() {
                    show_ajax_indicator();
                },
                success: function(data) {
                    if ((p > 1) & (data.data.length === 0)) {
                        get_list_slide(p-1);
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
                                '<td>'+v.judul+'</td>'+
                                '<td>'+v.keterangan.substr(0,80)+' ...</td>'+
                                '<td align="center" class=aksi>'+
                                    '<button type="button" class="btn btn-default btn-xs" onclick="edit_slide(\''+v.id+'\')"><i class="fa fa-pencil"></i></button> '+
                                    '<button type="button" class="btn btn-default btn-xs" onclick="delete_slide(\''+v.id+'\','+data.page+');"><i class="fa fa-trash-o"></i></button>'+
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
        
        function edit_slide(id) {
            $('#oldpict').html('');
            $('#form_add').modal('show');
            $('#form_add .title h4').html('Form Edit slide');
            $.ajax({
                type: 'GET',
                url: '<?= base_url('api/areafiftyone/slides') ?>/page/1/id/'+id,
                dataType: 'json',
                success: function(data) {
                    $('#id').val(data.data[0].id);
                    $('#judul').val(data.data[0].judul);
                    $('#isi').val(data.data[0].keterangan);
                    $('#gambar').val(data.data[0].gambar);
                    $('#oldpict').html('<img src="<?= base_url('assets/images/slider-cycle') ?>/'+data.data[0].gambar+'" width="80%" />')
                }
            });
        }
        
        function paging(p) {
            get_list_slide(p);
        }
        
        function konfirmasi_save() {
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
                        save_slide();
                    }
                  }
                }
              });
          }
        
        function save_slide() {
            $('#formadd').ajaxSubmit({
                target: '#output',
                dataType: 'json',
                data: $('#formadd').serialize(),
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
                        get_list_slide(1);
                    } else {
                        message_edit_success();
                        get_list_slide(page);
                    }
                },
                error: function(e) {
                    access_failed(e.status);
                    hide_ajax_indicator();
                }
            });
        }
        
        function delete_slide(id, page) {
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
                            url: '<?= base_url('api/areafiftyone/slide') ?>/id/'+id,
                            dataType: 'json',
                            success: function(data) {
                                message_delete_success();
                                get_list_slide(page);
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
                                <i class="fa fa-dashboard"></i>  <a href="<?= base_url('areafiftyone') ?>">Home</a>
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
                        <?= form_button('tambah', '<i class="fa fa-plus"></i> Tambah' ,'id=bt_tambah class="btn btn-primary" data-target=".bs-modal-lg"')?>
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
                                    <th width="30%">Judul</th>
                                    <th width="40%">Keterangan</th>
                                    <th width="5%"></th>
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
        <div class="modal-dialog" style="width: 900px; height: 100%;">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <div class="widget-header">
                <div class="title">
                    <h4>Form Tambah slide</h4>
                </div>
            </div>
          </div>

          <div class="modal-body">
            <?= form_open('api/areafiftyone/slide','method="post" id=formadd enctype="multipart/form-data" role=form class=form-horizontal') ?>
              <input type="hidden" name="id" id="id" />
              <input type="hidden" name="gambar" id="gambar" />
              <div class="row">
                <div class="col-md-12">
                    <div class="widget-body">
                        <div class="form-group">
                            <label for="nosppb" class="col-lg-3 control-label">Judul slide:</label>
                            <div class="col-lg-8">
                                <input type="text" name="judul"  class="form-control" id="judul">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nosppb" class="col-lg-3 control-label">Keterangan:</label>
                            <div class="col-lg-8">
                                <textarea id="isi" class="form-control" rows="10" name="isi_slide"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Gambar <br/>(recomended 1920 x 483):</label>
                            <div class="col-lg-9">
                              <input type="file" name="mFile"  id="mFile" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label"></label>
                            <div class="col-lg-9" id="oldpict">
                                
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              <?= form_close() ?>
          </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-refresh"></i> Batal</button>
                <button type="button" class="btn btn-primary" onclick="konfirmasi_save();"><i class="fa fa-save"></i> Simpan</button>
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

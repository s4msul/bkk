<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" class="ie" dir="ltr" lang="en-US">
<![endif]-->
<!--[if IE 7]>
<html id="ie7" class="ie" dir="ltr" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html id="ie8" class="ie" dir="ltr" lang="en-US">
<![endif]-->
<!--[if IE 9]>
<html id="ie9" class="ie" dir="ltr" lang="en-US">
<![endif]-->
<!--[if gt IE 9]>
<html class="ie" dir="ltr" lang="en-US">
<![endif]-->
<!--[if !IE]>
<html dir="ltr" lang="en-US">
<![endif]-->
    
    <!-- START HEAD -->
    <head>
        
        <meta charset="UTF-8" />
        <!-- this line will appear only if the website is visited with an iPad -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />
        
        <title><?= $title ?></title>
        
        <!-- [favicon] begin -->
        <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/images/fav.png') ?>" />
        <!-- Touch icons more info: http://mathiasbynens.be/notes/touch-icons -->
        <!-- For iPad3 with retina display: -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="apple-touch-icon-144x.png" />
        <!-- For first- and second-generation iPad: -->
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="apple-touch-icon-114x.png" />
        <!-- For first- and second-generation iPad: -->
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="apple-touch-icon-72x.png" />
        <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
        <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-57x.png" />
        <!-- [favicon] end -->
        
        <!-- CSSs -->
        <link rel="stylesheet" type="text/css" media="all" href="<?= base_url('assets/css/reset.css') ?>" /> <!-- RESET STYLESHEET -->
        <link rel="stylesheet" type="text/css" media="all" href="<?= base_url('assets/style.css')?>" /> <!-- MAIN THEME STYLESHEET -->
        <link rel="stylesheet" id="max-width-1024-css" href="<?= base_url('assets/css/max-width-1024.css')?>" type="text/css" media="screen and (max-width: 1240px)" />
        <link rel="stylesheet" id="max-width-768-css" href="<?= base_url('assets/css/max-width-768.css') ?>" type="text/css" media="screen and (max-width: 987px)" />
        <link rel="stylesheet" id="max-width-480-css" href="<?= base_url('assets/css/max-width-480.css') ?>" type="text/css" media="screen and (max-width: 480px)" />
        <link rel="stylesheet" id="max-width-320-css" href="<?= base_url('assets/css/max-width-320.css') ?>" type="text/css" media="screen and (max-width: 320px)" />
        
        <!-- CSSs Plugin -->
        <link rel="stylesheet" id="thickbox-css" href="<?= base_url('assets/css/thickbox.css') ?>" type="text/css" media="all" />
        <link rel="stylesheet" id="styles-minified-css" href="<?= base_url('assets/css/style-minifield.css') ?>" type="text/css" media="all" />
        <link rel="stylesheet" id="buttons" href="<?= base_url('assets/css/buttons.css') ?>" type="text/css" media="all" />
        <link rel="stylesheet" id="cache-custom-css" href="<?= base_url('assets/css/cache-custom.css') ?>" type="text/css" media="all" />
        <link rel="stylesheet" id="custom-css" href="<?= base_url('assets/css/custom.css') ?>" type="text/css" media="all" />
	<link rel="stylesheet" id="custom-css" href="<?= base_url('assets/js/pnotify/jquery.pnotify.default.css') ?>" type="text/css" media="all" />
        <!-- FONTs -->
        <link rel="stylesheet" id="google-fonts-css" href="" type="text/css" media="all" />
        <link rel='stylesheet' href='<?= base_url('assets/css/font-awesome.css') ?>' type='text/css' media='all' />
        
        <!-- JAVASCRIPTs -->
        <script type="text/javascript" src="<?= base_url('assets/js/jquery.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/comment-reply.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/jquery.quicksand.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/jquery.tipsy.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/jquery.prettyPhoto.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/jquery.cycle.min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/jquery.anythingslider.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/jquery.eislideshow.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/jquery.easing.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/jquery.flexslider-min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/jquery.aw-showcase.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/layerslider.kreaturamedia.jquery-min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/shortcodes.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/jquery.colorbox-min.js') ?>"></script> <!-- nav -->
        <script type="text/javascript" src="<?= base_url('assets/js/jquery.tweetable.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/jquery.nicescroll.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/library.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/pnotify/jquery.pnotify.min.js') ?>"></script>
        <script type="text/javascript">
            function reset_form() {
                $('input[type=text], input[type=hidden], select, textarea').val('');
                $('input[type=radio]').removeAttr('checked');
            }
            
            function save_pendaftaran() {
                
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url('api/main/save_pendaftaran') ?>',
                    data: $('#data-alumni').serialize(),
                    success: function(data) {
                        if (data.status === false) {
                            message_add_failed();
                        } else {
                            message_add_success();
                            reset_form();
                        }
                    }
                });
            }
            
            $('input[type=text], select').blur(function() {
                dc_validation_remove('.required');
            });
        </script>
    </head> 
    <!-- END HEAD -->
    
    <!-- START BODY -->
    <body class="no_js responsive stretched">
        
        <!-- START BG SHADOW -->
        <div class="bg-shadow">
            
            <!-- START WRAPPER -->
            <div id="wrapper" class="group">
                
                <!-- START HEADER -->
                <div id="header" class="group">
                    
                    <div class="group inner">
                        
                        <?php $this->load->view('visitor/header') ?>
                        
                        <!-- START MAIN NAVIGATION -->
                        <div class="menu classic">
                            <?php $this->load->view('visitor/menu') ?>
                        </div>
                        <!-- END MAIN NAVIGATION -->
                        <div id="header-shadow"></div>
                        <div id="menu-shadow"></div>
                    </div>
                    
                </div>
                <!-- END HEADER -->
                
                <!-- START PAGE META -->
				<div id="page-meta">
				    
				</div>
				<!-- END PAGE META -->
				<!-- START PRIMARY -->
				<div id="primary" class="sidebar-left">
				    <div class="inner group">
				        <!-- START CONTENT -->
				        <div id="content-page" class="content group">
				            <div class="hentry group">
				                <form id="data-alumni" class="contact-form" method="post" action="sendmail.PHP" enctype="multipart/form-data">
				                    <div class="usermessagea"></div>
				                    <fieldset>
				                        <ul>
                                                            <li class="text-field" style="width: 100%;">
                                                                <h2>Pendaftaran Member</h2>
				                                <table class="formulir">
                                                                    <tr><td width="40%">NAMA LENGKAP</td><td><input type='text' name='nama_lengkap' size='40'></td></tr>
                                                                    <tr><td>NAMA PANGGILAN</td><td><input type='text' name='nama_panggilan'></td></tr>
                                                                    <tr><td>JENIS KELAMIN</td><td><select name="jenis_kelamin" style="width: 104%;">
                                                                            <option selected="selected" value=''>Silahkan Pilih</option>
                                                                            <option value="laki-laki">laki-laki</option>
                                                                            <option value="perempuan">perempuan</option>
                                                                            </select></td></tr>
                                                                    <tr><td>TEMPAT LAHIR</td><td><input type='text' name='tempat_lahir'></td></tr>
                                                                    <tr><td>TANGGAL LAHIR</td><td><input type='text' name='tanggal_lahir' size=10 id="datepicker"></td></tr>
                                                                    <tr><td>AGAMA</td><td><input type='text' name='agama'></td></tr>
                                                                    <tr><td>STATUS PERNIKAHAN</td><td><select name="status_pernikahan" style="width: 104%;">
                                                                            <option selected="selected" value=''>Silahkan Pilih</option>
                                                                            <option value="belum menikah">belum menikah</option>
                                                                            <option value="sudah menikah">sudah menikah</option></td></tr>
                                                                    <tr><td>TINGGI BADAN (cm)</td><td><input type='text' name='tinggi_badan' size=3 style="width: 50%;"> cm</td></tr>
                                                                    <tr><td>BERAT BADAN (kg)</td><td><input type='text' name='berat_badan' size=2 style="width: 50%;"> kg</td></tr>
                                                                    <tr><td>NO. KTP</td><td><input type='text' name='no_ktp'></td></tr>
                                                                    <tr><td>MASA KTP</td><td><input type='text' name='masa_ktp'></td></tr>
                                                                    <tr><td>ALAMAT RUMAH SESUAI KTP</td><td><input type='text' name='alamat_rumah' size=50></td></tr>
                                                                    <tr><td>KAB/KOTA</td><td><input type='text' name='kab_kota'></td></tr>
                                                                    <tr><td>PROVINSI</td><td><input type='text' name='provinsi'></td></tr>
                                                                    <tr><td>KODEPOS</td><td><input type='text' name='kodepos' size=5></td></tr>
                                                                    <tr><td>TELP</td><td><input type='text' name='telp'></td></tr>
                                                                    <tr><td>PONSEL</td><td><input type='text' name='ponsel'></td></tr>
                                                                    <tr><td>ALAMAT SAAT INI / KOST</td><td><input type='text' name='alamat_saat_ini' size=50></td></tr>
                                                                    <tr><td>KAB/KOTA</td><td><input type='text' name='kab_kota1'></td></tr>
                                                                    <tr><td>PROVINSI</td><td><input type='text' name='provinsi1'></td></tr>
                                                                    <tr><td>KODEPOS</td><td><input type='text' name='kodepos1' size=5></td></tr>
                                                                    <tr><td>PENDIDIKAN</td><td><input type='text' name='pendidikan'></td></tr>
                                                                    <tr><td>NAMA SEKOLAH</td><td><input type='text' name='nama_sekolah'></td></tr>
                                                                    <tr><td>NAMA KOTA</td><td><input type='text' name='nama_kota'></td></tr>
                                                                    <tr><td>JURUSAN</td><td><select name="jurusan" style="width: 104%;">
                                                                            <option selected="selected" value=''>Silahkan Pilih</option>
                                                                            <?php
                                                                             foreach ($jurusan as $datax) { ?>
                                                                                <option value="<?= $datax->id ?>"><?= $datax->nama ?></option>";
                                                                            <?php }
                                                                            ?>
                                                                    </select></td></tr>
                                                                    <tr><td>NILAI RATA-TARA IJAZAH</td><td><input type='text' name='nilai_rata_ijazah' size=3></td></tr>
                                                                    <tr><td>Nilai Matematika :</td><td>&nbsp;</td></tr>
                                                                    <tr><td>semester 1</td><td><input type='text' name='semester1' size=3></td></tr>
                                                                    <tr><td>semester 2</td><td><input type='text' name='semester2' size=3></td></tr>
                                                                    <tr><td>semester 3</td><td><input type='text' name='semester3' size=3></td></tr>
                                                                    <tr><td>semester 4</td><td><input type='text' name='semester4' size=3></td></tr>
                                                                    <tr><td>semester 5</td><td><input type='text' name='semester5' size=3></td></tr>
                                                                    <tr><td>semester 6</td><td><input type='text' name='semester6' size=3></td></tr>
                                                                    <tr><td>TAHUN KELULUSAN</td><td><input type='text' size=4 name='tahun_kelulusan'></td></tr>
                                                                    <tr><td>BKK ASAL</td><td><select name="bkk_asal" style="width: 104%;">
                                                                            <option selected="selected" value=''>Silahkan Pilih</option>
                                                                            <?php
                                                                                            $q5 = "SELECT * FROM bkk";
                                                                                            $r5 = mysql_query($q5) or die ($q5);
                                                                                            while ($datay = mysql_fetch_array($r5)) {
                                                                                                            echo "<option value='".$datay[0]."'>".$datay[1]."</option>";
                                                                                                    $i++;
                                                                                            }
                                                                            ?>
                                                                            </select></td></tr>
                                                                    <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                                                    <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                                                    <tr><td>USERNAME</td><td><input type='text' name='username'></td></tr>
                                                                    <tr><td>PASSWORD</td><td><input type='password' name='password'></td></tr>
                                                                    <tr><td>ULANGI PASSWORD</td><td><input type='password' name='password1'></td></tr>
                                                            </table>
				                            </li>
				                            <li class="submit-button">
				                                <input type="text" name="yit_bot" id="yit_bot" />
				                                <input type="hidden" name="yit_action" value="sendmail" id="yit_action" />
				                                <input type="hidden" name="id_form" value="126" />
                                                                <input type="button" name="yit_sendmail" value="Daftar" onclick="save_pendaftaran();" class="sendmail" />			
				                            </li>
				                        </ul>
				                    </fieldset>
				                </form>
				                <script type="text/javascript">
				                    var messages_form_126 = {
				                    	name: "Please, fill in your name",
				                    	email: "Please, insert a valid email address",
				                    	message: "Please, insert your message"
				                    };
				                </script>
				            </div>
				            <!-- START COMMENTS -->
				            <div id="comments">
				            </div>
				            <!-- END COMMENTS -->
				        </div>
				        <!-- END CONTENT -->
				        <!-- START SIDEBAR -->
				        <div id="sidebar-contact" class="sidebar group">
				            <div class="widget-first widget contact-info">
				                <h3>Contacts</h3>
				                <div class="sidebar-nav">
				                    <ul>
				                        <li>
				                            <i class="icon-map-marker" style="color:#979797;font-size:20pxpx"></i> Location: <?= $data->alamat ?>
				                        </li>
				                        <li>
				                            <i class="icon-info-sign" style="color:#979797;font-size:20pxpx"></i> Phone: <?= $data->telp ?>
				                        </li>
				                        <li>
				                            <i class="icon-print" style="color:#979797;font-size:20pxpx"></i> Fax: <?= $data->fax ?>
				                        </li>
				                        <li>
				                            <i class="icon-envelope" style="color:#979797;font-size:20pxpx"></i> Email: <?= $data->email ?>
				                        </li>
				                    </ul>
				                </div>
				            </div>
				            <div class="widget-last widget text-image">
				                <h3>Member Support</h3>
				                <div class="text-image" style="text-align:left"><img src="<?= base_url('assets/images/callus.gif') ?>" alt="Customer Support" /></div>
				                <p>Untuk keterangan lebih lanjut bisa menghubungi administrator, pada nomor diatas</p>
				            </div>
				        </div>
				        <!-- END SIDEBAR -->
				        <!-- START EXTRA CONTENT -->
				        <!-- END EXTRA CONTENT -->
				    </div>
				</div>
				<!-- END PRIMARY -->
				
				
				<!-- START COPYRIGHT -->
                <div id="copyright">
                    <div class="inner group">
                        <div class="left">
                            <a href="http://yithemes.com/?ddownload=2046&ap_id=pinkrio-html"><strong>copy &copy; 2015 All right reserved</strong></a>
                        </div>
                        <div class="right">
                            <a href="#" class="socials-small facebook-small" title="Facebook">facebook</a>
                            <a href="#" class="socials-small rss-small" title="Rss">rss</a>
                            <a href="#" class="socials-small twitter-small" title="Twitter">twitter</a>
                            <a href="#" class="socials-small flickr-small" title="Flickr">flickr</a>
                            <a href="#" class="socials-small skype-small" title="Skype">skype</a>
                            <a href="#" class="socials-small google-small" title="Google">google</a>
                            <a href="#" class="socials-small pinterest-small" title="Pinterest">pinterest</a>
                        </div>
                    </div>
                </div>
                <!-- END COPYRIGHT -->
            </div>
            <!-- END WRAPPER -->
        </div>
        <!-- END BG SHADOW -->
        
        <script type="text/javascript" src="<?= base_url('assets/js/jquery.custom.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/contact.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/jquery.mobilemenu.js') ?>"></script>
        
    </body>
    <!-- END BODY -->
</html>
<!DOCTYPE html>

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
        <script type="text/javascript">
            $(function() {
                $("#daftarprsh").niceScroll({
                    touchbehavior:false,
                    cursorcolor:"#666",
                    cursoropacitymax:0.7,
                    cursorwidth:6,
                    cursorborder:"1px solid #2848BE",
                    cursorborderradius:"8px",
                    background:"#ccc",
                    autohidemode:true
                }).cursor.css({
                    //'background-image':'url(<?= base_url('') ?>)'
                }); // MAC like scrollbar
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
                
                <!-- START PRIMARY -->
				<div id="primary" class="sidebar-right">
				    <div class="inner group">
				        <!-- START CONTENT -->
				        <div id="content-single" class="content group">
				            <div class="hentry hentry-post blog-big group ">
				                <!-- post featured & title -->
                                                <table width="100%">
                                                    <tr valign="top" style="background: none;">
                                                        <td width="120px;"><img src="<?= base_url('assets/images/articles/'.$data->logo) ?>" alt="0061" style="width: 100px; height: 100px; padding: 5px;" /></td>
                                                        <td style="vertical-align: top;">
                                                            <b class="post-title"><?= $data->nama ?></b>
                                                            <p><?= $data->alamat ?>, <br/>Jenis Industri: <?= $data->bidang ?></p>
                                                        </td>
                                                    </tr>
                                                </table>

				                <!-- post meta -->
				                <!-- post content -->
				                <div class="the-content single group">
                                                    <?= $data->deskripsi ?>
                                                    
				                </div>
				                
				                <div class="clear"></div>
				            </div>
				            <!-- START COMMENTS -->
				            
				            <!-- END COMMENTS -->
				        </div>
				        <!-- END CONTENT -->
				        
                        <!-- START SIDEBAR -->
				        <div id="sidebar-blog-sidebar" class="sidebar group">
				            <?php $this->load->view('visitor/daftar-prsh-2') ?>
				        </div>
				        <!-- END SIDEBAR -->
				    </div>
				</div>
				<!-- END PRIMARY -->
				
				<!-- START COPYRIGHT -->
                <div id="copyright">
                    <div class="inner group">
                        <div class="left">
                            <a href=""><strong>copy &copy; 2015 All right reserved</strong></a>
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
        
        <script type="text/javascript" src="js/jquery.custom.js"></script>
        <script type="text/javascript" src="js/contact.js"></script>
        <script type="text/javascript" src="js/jquery.mobilemenu.js"></script> 
        
    </body>
    <!-- END BODY -->
</html>
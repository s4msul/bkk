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
                                                <img src="<?= base_url('assets/images/jv.jpg') ?>" />
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
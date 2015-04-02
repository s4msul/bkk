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
        <link rel="icon" type="image/x-icon" href="images/favicon.ico" />
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
    <?php
    //include_once './conn/connect.php';
    ?>
    <!-- START BODY -->
    <body class="no_js responsive page-template-home-php stretched">
        
        <!-- START BG SHADOW -->
        <div class="bg-shadow">
            
            <!-- START WRAPPER -->
            <div id="wrapper" class="group">
                
                <!-- START HEADER -->
                <div id="header" class="group">
                    
                    <div class="group inner">
                        
                        <!-- START LOGO -->
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
                
                <!-- START SLIDER -->
				<div id="slider-cycle" class="slider cycle no-responsive slider_cycle group" style="height:485px;">
				    <ul class="slider">
                                        <?php foreach ($slider as $data) { ?>
				        <li>
				            <div class="slide-holder" style="background:  url('<?= base_url('assets/images/slider-cycle/'.$data->gambar) ?>') no-repeat center center" style="height:483px;">
				                <div class="slide-content-holder inner" style="height:483px;">
				                    <div class="slide-content-holder-content" style="position: absolute; top:30px;right:650px;">
				                        <div class="slide-title">
                                                            <h2 style="color:#fff"><span><?= $data->judul ?></span></h2>
				                        </div>
				                        <div class="slide-content" style="color:#fff">
				                            <p><?= $data->keterangan ?></p>
				                        </div>
				                    </div>
				                </div>
				            </div>
				        </li>
                                        <?php } ?>
				    </ul>
				    
				    <div id="yit-widget-area" class="group">
				        <div class="yit-widget-content inner group">
				            <div class="widget-first yit-widget widget col1_4 one-fourth col widget-icon-text group">
                                                <img class="icon-img" src="<?= base_url('assets/images/icons/set_icons/new32.png') ?>" alt="" />		
				                <h3>Lowongan Terbaru</h3>
				                <p>Berisi data lowongan terbaru dari beberapa instansi .</p>
				            </div>
				            <div class="yit-widget widget col1_4 one-fourth col widget-last-post group">
                                                <img class="icon-img" src="<?= base_url('assets/images/icons/set_icons/chart-line.png') ?>" alt="" />        
				                <div>
				                    <h3><a class="text-color" href="#" title="">Lowongan Terpopuler</a></h3>
                                                    <p>Berisi lowongan yang paling banyak diminati para pelamar kerja! <a href="<?= base_url('main/jobvacancy') ?>"> | more →</a></p>
				                </div>
				            </div>
				            <div class="widget-last yit-widget widget col1_4 one-fourth col yit_text_quote">
				                <blockquote class="text-quote-quote">“Anyone who has never made a mistake has never tried anything new.”</blockquote>
				                <cite class="text-quote-author">Albert Einstein</cite>
				            </div>
				        </div>
				    </div>
				</div>
				<script type="text/javascript">
				    jQuery(document).ready(function($){
				        
				        var     yit_slider_cycle_fx = 'easing',
				                yit_slider_cycle_speed = 800,
				                yit_slider_cycle_timeout = 3000,
				                yit_slider_cycle_directionNav = true,
				                yit_slider_cycle_directionNavHide = true, 
				                yit_slider_cycle_autoplay = true;
				                
				        var yit_widget_area_position = function(){
				            $('#yit-widget-area').css({ top: 33 - $('#yit-widget-area').height() });
				        };
				        $(window).resize(yit_widget_area_position);
				        yit_widget_area_position();
				        
				        if( $.browser.msie && parseInt($.browser.version.substr(0,1),10) <= '8' ) {
				            $('#slider-cycle ul.slider').anythingSlider({
				                 expand              : true,
				                 startStopped        : false,
				                 buildArrows         : yit_slider_cycle_directionNav,
				                 buildNavigation     : false,
				                 buildStartStop      : false,
				                 delay               : yit_slider_cycle_timeout,
				                 animationTime       : yit_slider_cycle_speed,
				                 easing              : yit_slider_cycle_fx,
				                 autoPlay            : yit_slider_cycle_autoplay ? true : false,
				                 pauseOnHover        : true, 
				                 toggleArrows        : false,
				                 resizeContents      : true
				            });
				        } else {
				            $('#slider-cycle ul.slider').anythingSlider({
				                 expand              : true,
				                 startStopped        : false,
				                 buildArrows         : yit_slider_cycle_directionNav,
				                 buildNavigation     : false,
				                 buildStartStop      : false,
				                 delay               : yit_slider_cycle_timeout,
				                 animationTime       : yit_slider_cycle_speed,
				                 easing              : yit_slider_cycle_fx,
				                 autoPlay            : yit_slider_cycle_autoplay ? true : false,
				                 pauseOnHover        : true, 
				                 toggleArrows        : yit_slider_cycle_directionNavHide ? true : false,
				                 onSlideComplete     : function(slider){},
				                 resizeContents      : true,
				                 onSlideBegin        : function(slider) {},
				                 onSlideComplete     : function(slider) {}
				            });
				            
				        }
				    });
				</script>
				<div class="mobile-slider">
				    <div class="slider fixed-image inner"><img src="<?= base_url('assets/images/slider-cycle/slider_one.jpg') ?>" alt="" /></div>
				</div>
				
				<!-- START PRIMARY -->
				<div id="primary" class="sidebar-right">
				    <div class="inner group">
				        <!-- START CONTENT -->
				        <div id="content-home" class="content group">
				            <div class="hentry group">
				                <div class="section portfolio">
				                    
				                    <h3 class="title">Berita Terbaru</h3>
				                    <?php foreach ($list_berita as $data) { ?>
				                    <div class="hentry work group portfolio-sticky portfolio-full-description">
				                        <div class="work-thumbnail">
				                            <a class="thumb"><img src="<?= base_url('assets/images/projects/'.$data->gambar) ?>" alt="0081" title="0081" /></a>
				                            <div class="work-overlay">
				                                <h3><a href="<?= base_url('main/detailnews/'.$data->id) ?>"><?= $data->judul ?></a></h3>
				                                
				                            </div>
				                        </div>
				                        <div class="work-description">
                                                            <h2><a href="<?= base_url('main/detailnews/'.$data->id.'/'.  str_replace(' ','_',$data->judul)) ?>"><?= $data->judul ?></a></h2>
                                                            <p class="work-categories">Tanggal Posting: <?= indo_tgl(date2mysql(datetimefmysql($data->tanggal))) ?></p>
				                            <?= substr($data->isi, 0, 300) ?> [...]
				                                <a href="<?= base_url('main/detailnews/'.$data->id) ?>" class="read-more">|| Read more</a>
				                        </div>
				                    </div>
                                                    <?php } ?>
                                                    
				                    <!--<div class="clear"></div>-->
				                    <h3 class="title">Lowongan Terbaru</h3>
				                    <div class="portfolio-projects">
				                        <?php 
                                                        $no = 1;
                                                        foreach ($list_lowongan as $data) { 
                                                            $no++;
                                                            $kelas = 'related_project';
                                                            if ($no%4===1) {
                                                                $kelas = 'related_project_last related_project';
                                                            }
                                                            ?>
                                                        <div class="<?= $kelas ?>">
				                            <div class="overlay_a related_img">
				                                <div class="overlay_wrapper">
                                                                    <img src="<?= base_url('assets/images/articles/'.$data->logo) ?>" alt="0061" style="width: 175px; height: 175px;" />
				                                    <div class="overlay">
				                                        <a class="overlay_img" href="<?= base_url('assets/images/articles/'.$data->logo) ?>" rel="lightbox" title=""></a>
                                                                        <a class="overlay_project" target="blank" href="<?= base_url('main/jobvacancydetail/'.$data->id) ?>"></a>
				                                        <span class="overlay_title"><?= $data->nama ?></span>
				                                    </div>
				                                </div>
				                            </div>
                                                            <h4><a style="font-size: 11px;" href="<?= base_url('main/jobvacancydetail/'.$data->id) ?>"><?= $data->nama ?> ( <?= $data->judul ?> Lowongan )</a></h4>
                                                            <p><b><a href="<?= base_url('main/jobvacancydetail/'.$data->id) ?>">more →</a></b></p>
				                        </div>
                                                        <?php } ?>
				                    </div>
				                </div>
				                <div class="clear"></div>
				            </div>
				            <!-- START COMMENTS -->
				            <div id="comments">
				            </div>
				            <!-- END COMMENTS -->
				        </div>
				        <!-- END CONTENT -->
				        <!-- START SIDEBAR -->
				        <div class="sidebar group">
				            
				            <?php $this->load->view('visitor/daftar-prsh') ?>
				            
				            <div class="widget-last widget text-image">
				                <h3>Member support</h3>
				                <div class="text-image" style="text-align:left"><img src="<?= base_url('assets/images/callus.gif') ?>" alt="Customer support" /></div>
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
                            <a href="#"><strong>copy &copy; 2015 All right reserved</strong></a>
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
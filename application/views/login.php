<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title><?= $title ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/images/fav.png') ?>" />
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/login/demo.css') ?>" />
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/login/style.css') ?>" />
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/login/animate-custom.css') ?>" />
        <link href="<?= base_url('assets/js/pnotify/jquery.pnotify.default.css') ?>" rel="stylesheet">
        <script type="text/javascript" src="<?= base_url('assets/js/jquery.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
        <script src="<?= base_url('assets/js/pnotify/jquery.pnotify.min.js') ?>"></script>
        <script src="<?= base_url('assets/js/bootbox.js') ?>"></script>
        <script src="<?= base_url('assets/js/jquery.blockUI.js') ?>"></script>
        <script src="<?= base_url('assets/js/library.js') ?>"></script>
        <script type="text/javascript">
            function logmein() {
                var status = '<?= $log ?>';
                var url = '<?= base_url("users/memberlogmein") ?>';
                if (status === 'auth') {
                    url = '<?= base_url("users/logmein") ?>';
                }
                $.ajax({
                    url: url,
                    data: $('#formlogin').serialize(),
                    type: 'POST',
                    dataType: 'json',
                    success: function(data) {
                        if (data.status === true) {
                            if (data.level === '0') {
                                location.href='<?= base_url('areafiftyone') ?>';
                            }
                            if (data.level === '1') {
                                location.href='<?= base_url('areafiftyone') ?>';
                            }
                            if (data.level === '2') {
                                location.href='<?= base_url('member') ?>';
                            }
                        } else {
                            message_custom('Error','Peringatan','Username & Password tidak terdaftar !');
                        }
                    }
                });
            }
        </script>
    </head>
    <body>
        <div class="container">
            <!-- Codrops top bar -->
            <div class="codrops-top">
                <a href="<?= base_url('main') ?>">
                    <strong>&laquo; Halaman Utama </strong>
                </a>
                <span class="right">
                    <a href="">
                        <strong></strong>
                    </a>
                </span>
                <div class="clr"></div>
            </div><!--/ Codrops top bar -->
            <header>
                <h1>Login dan Form Registrasi <br/><span><?= $subtitle ?></span></h1>
				
            </header>
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="" id="formlogin" autocomplete="on"> 
                                <h1>Log in</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Your username </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="myusername"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                <p class="keeplogin"> 
									<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
									<label for="loginkeeping">Keep me logged in</label>
								</p>
                                <p class="login button"> 
                                    <input type="button" value="Login" onclick="logmein();" /> 
								</p>
                                <p class="change_link">
									Belum mendaftar ?
                                                                        <a href="<?= base_url('main/daftar') ?>" class="to_register">Daftar</a>
								</p>
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            <form  action="mysuperscript.php" autocomplete="on"> 
                                <h1> Sign up </h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Your username</label>
                                    <input id="usernamesignup" name="usernamesignup" required="required" type="text" placeholder="mysuperusername690" />
                                </p>
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > Your email</label>
                                    <input id="emailsignup" name="emailsignup" required="required" type="email" placeholder="mysupermail@mail.com"/> 
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
                                    <input id="passwordsignup" name="passwordsignup" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please confirm your password </label>
                                    <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p class="signin button"> 
									<input type="submit" value="Sign up"/> 
								</p>
                                <p class="change_link">  
									Already a member ?
									<a href="#tologin" class="to_register"> Go and log in </a>
								</p>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>
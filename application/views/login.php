<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="kmg">
    <meta name="keywords" content="kmg">
    <meta name="author" content="kmg">
    <title>Login Page KMG</title>
    <link rel="icon" href="<?php echo base_url();?>assets/images/logo-bri.png" type="image/ico">
    <link href="<?php echo base_url();?>assets/css/googleapis.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/themes/semi-dark-layout.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/pages/authentication.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">

</head>
<body class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-8 col-11 d-flex justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                                    <img src="<?php echo base_url();?>assets/images/pages/login.png" alt="branding logo">
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 px-2">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">Login</h4>
                                            </div>
                                        </div>
                                        <p class="px-2">Welcome back, please login to your account.</p>
                                        <div class="card-content">
                                            <div class="card-body pt-1">
                                                <form action="<?php echo base_url()?>auth/login" method="POST">
                                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                        <input type="text" class="form-control" id="user-name" 
                                                        name="username" placeholder="Username" required>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-user"></i>
                                                        </div>
                                                        <label for="user-name">Username</label>
                                                    </fieldset>

                                                    <fieldset class="form-label-group position-relative has-icon-left">
                                                        <input type="password" class="form-control" id="user-password"name="password" placeholder="Password" minlength="6" required>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-lock"></i>
                                                        </div>
                                                        <label for="user-password">Password</label>
                                                    </fieldset>

                                                    <div class="form-group d-flex justify-content-between align-items-center">
                                                        <div class="text-left"><a href="<?php echo base_url('home') ?>" class="card-link">Back to Dashboard</a></div>
                                                        <div class="text-right"><a href="<?php echo base_url('forgot_password') ?>" class="card-link">Forgot Password?</a></div>
                                                    </div>
                                                    <a href="<?php echo base_url('register') ?>" class="btn btn-outline-primary float-left btn-inline">Register</a>
                                                    <button type="submit" class="btn btn-primary float-right btn-inline">Login</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="login-footer">
                                            <div class="divider">
                                                <div class="divider-text">OR</div>
                                            </div>
                                            <div class="footer-btn d-inline">
                                                <a href="#" class="btn btn-facebook"><span class="fa fa-facebook"></span></a>
                                                <a href="#" class="btn btn-twitter white"><span class="fa fa-twitter"></span></a>
                                                <a href="#" class="btn btn-google"><span class="fa fa-google"></span></a>
                                                <a href="#" class="btn btn-github"><span class="fa fa-github-alt"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <script src="<?php echo base_url();?>assets/vendors/js/vendors.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/core/app-menu.js"></script>
    <script src="<?php echo base_url();?>assets/js/core/app.js"></script>
    <script src="<?php echo base_url();?>assets/js/scripts/components.js"></script>
</body>
</html>
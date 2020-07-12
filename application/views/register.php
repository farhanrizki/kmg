<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
	<head>
	    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	    <meta name="description" content="kmg">
	    <meta name="keywords" content="kmg">
	    <meta name="author" content="kmg">
	    <title>Register KMG</title>
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

    <body class="vertical-layout vertical-menu-modern semi-dark-layout 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column" data-layout="semi-dark-layout">
        <div class="app-content content">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <section class="row flexbox-container">
                        <div class="col-xl-8 col-10 d-flex justify-content-center">
                            <div class="card bg-authentication rounded-0 mb-0">
                                <div class="row m-0">
                                    <div class="col-lg-6 d-lg-block d-none text-center align-self-center pl-0 pr-3 py-0">
                                        <img src="<?php echo base_url();?>assets/images/pages/register.jpg" alt="branding logo">
                                    </div>
                                    <div class="col-lg-6 col-12 p-0">
                                        <div class="card rounded-0 mb-0 p-2">
                                            <div class="card-header pt-50 pb-1">
                                                <div class="card-title">
                                                    <h4 class="mb-0">Create Account</h4>
                                                </div>
                                            </div>
                                            <p class="px-2">Fill the below form to create a new account.</p>
                                            <div class="card-content">
                                                <div class="card-body pt-0">
                                                    <form action="<?php echo base_url()?>register/input" method="POST">
                                                        <div class="form-label-group">
                                                            <input type="text" name="namalengkap" class="form-control" placeholder="Nama Lengkap" value="<?php echo $namalengkap; ?>" required>
                                                            <label>Nama Lengkap</label>
                                                        </div>
                                                        <div class="form-label-group">
                                                            <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $username; ?>" required>
                                                            <label>Username</label>
                                                        </div>
                                                        <?php if(isset($userexist)) { echo $userexist; } ?>
                                                        <div class="form-label-group">
                                                            <select name="roleuser" class="form-control" required>
    				                                            <option class="option" value="">Pilih Role User</option>
    				                                            <?php foreach($roleuser as $row) { ?>
    				                                                <option value="<?php echo $row['id_role']; ?>">
    				                                                    <?php echo $row['keterangan']; ?>
    				                                                </option>
    				                                            <?php } ?>
    				                                        </select>
                                                            <label>Role User</label>
                                                        </div>
                                                        <div class="form-label-group">
                                                            <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo $password; ?>" minlength="6" required>
                                                            <label>Password</label>
                                                        </div>
                                                        <div class="form-label-group">
                                                            <input type="password" name="confpassword" class="form-control" placeholder="Confirm Password" value="<?php echo $confpassword; ?>" minlength="6" required>
                                                            <label>Confirm Password</label>
                                                        </div>
                                                        <?php if(isset($confpass)) { echo $confpass; } ?>
                                                        <?php if(isset($error)) { echo $error; } ?>
                                                        <a href="<?php echo base_url('auth') ?>" class="btn btn-outline-primary float-left btn-inline mb-50">Login</a>
                                                        <button type="submit" class="btn btn-primary float-right btn-inline mb-50">Register</a>
                                                    </form>
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
<?php use_helper('I18N') ?>

<!-- Page Content -->
<div class="bg-image" style="background-image: url('<?php echo sfConfig::get('app_gs_dashmix_plugin_login_background_image', '/assets/media/photos/photo14.jpg'); ?>');">
    <div class="row no-gutters bg-primary-op">
        <!-- Main Section -->
        <div class="hero-static col-md-6 d-flex align-items-center bg-white">
            <div class="p-3 w-100">
                <!-- Header -->
                <div class="mb-3 text-center">
                    <a class="navbar-brand js-scroll-trigger" href="#page-top">
                        <img src="<?php echo sfConfig::get('app_gs_dashmix_plugin_login_logo', '/assets/media/favicons/favicon-192x192.png'); ?>" style="max-width: 300px;"></a>
                    <p class="text-uppercase font-w700 font-size-sm text-muted">Login</p>
                </div>
                <!-- END Header -->

                <!-- Sign In Form -->
                <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _es6/pages/op_auth_signin.js) -->
                <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                <div class="row no-gutters justify-content-center">
                    <div class="col-sm-8 col-xl-6">
                        <?php echo get_partial('gsDashmixAuth/signin_form', array('form' => $form)) ?>
                    </div>
                </div>
                <!-- END Sign In Form -->
            </div>
        </div>
        <!-- END Main Section -->

        <!-- Meta Info Section -->
        <div class="hero-static col-md-6 d-none d-md-flex align-items-md-center justify-content-md-center text-md-center">
            <div class="p-3">
                <p class="display-4 font-w700 text-white mb-4">
                    <?php echo sfConfig::get('app_gs_dashmix_plugin_project_title', 'Project Title'); ?>
                </p>
                <p class="font-size-lg font-w600 text-white-75 mb-0">
                    Copyright &copy; <span class="js-year-copy"><?php echo date("Y"); ?></span>
                </p>
            </div>
        </div>
        <!-- END Meta Info Section -->
    </div>
</div>
<!-- END Page Content -->
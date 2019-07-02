<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?php echo sfConfig::get('app_gs_dashmix_plugin_project_title', 'Project Title'); ?></title>

    <meta name="description" content="<?php echo sfConfig::get('app_gs_dashmix_plugin_project_title', 'Project Title'); ?>">
    <!-- Open Graph Meta -->
    <meta property="og:title" content="<?php echo sfConfig::get('app_gs_dashmix_plugin_project_title', 'Project Title'); ?>">
    <meta property="og:site_name" content="<?php echo sfConfig::get('app_gs_dashmix_plugin_project_title', 'Project Title'); ?>">
    <meta property="og:description" content="<?php echo sfConfig::get('app_gs_dashmix_plugin_project_title', 'Project Title'); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo sfConfig::get('app_gs_dashmix_plugin_url', '#'); ?>">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="<?php echo sfConfig::get('app_gs_dashmix_plugin_icon_shortcut_icon', '/assets/media/favicons/favicon.png'); ?>">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo sfConfig::get('app_gs_dashmix_plugin_icon_icon', '/assets/media/favicons/favicon-192x192.png'); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo sfConfig::get('app_gs_dashmix_plugin_icon_apple_touch_icon', '/assets/media/favicons/apple-touch-icon-180x180.png'); ?>">
    <!-- END Icons -->
    <!-- Stylesheets -->
    <!-- Fonts and Dashmix framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
    <link rel="stylesheet" id="css-main" href="<?php echo sfConfig::get('app_gs_dashmix_plugin_theme_files', '/assets'); ?>/css/dashmix.min.css">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <link rel="stylesheet" id="css-theme" href="<?php echo sfConfig::get('app_gs_dashmix_plugin_theme_files', '/assets'); ?>/css/themes/xwork.min.css">
    <!-- END Stylesheets -->
  </head>
  <body>
    <div id="page-container">
      <!-- Main Container -->
      <main id="main-container">
        <?php echo $sf_content ?>
      </main>
    </div>
    <!--
      Dashmix JS Core

      Vital libraries and plugins used in all pages. You can choose to not include this file if you would like
      to handle those dependencies through webpack. Please check out assets/_es6/main/bootstrap.js for more info.

      If you like, you could also include them separately directly from the assets/js/core folder in the following
      order. That can come in handy if you would like to include a few of them (eg jQuery) from a CDN.

      assets/js/core/jquery.min.js
      assets/js/core/bootstrap.bundle.min.js
      assets/js/core/simplebar.min.js
      assets/js/core/jquery-scrollLock.min.js
      assets/js/core/jquery.appear.min.js
      assets/js/core/js.cookie.min.js
    -->
    <script src="<?php echo sfConfig::get('app_gs_dashmix_plugin_theme_files', '/assets'); ?>/js/dashmix.core.min.js"></script>

    <!--
        Dashmix JS

        Custom functionality including Blocks/Layout API as well as other vital and optional helpers
        webpack is putting everything together at assets/_es6/main/app.js
    -->
    <script src="<?php echo sfConfig::get('app_gs_dashmix_plugin_theme_files', '/assets'); ?>/js/dashmix.app.min.js"></script>

    <!-- Page JS Plugins -->
    <script src="<?php echo sfConfig::get('app_gs_dashmix_plugin_theme_files', '/assets'); ?>/js/plugins/jquery-validation/jquery.validate.min.js"></script>

    <!-- Page JS Code -->
    <script src="<?php echo sfConfig::get('app_gs_dashmix_plugin_theme_files', '/assets'); ?>/js/pages/op_auth_signup.min.js"></script>
    <?php
    if (sfContext::getInstance()->getUser()->hasNotification()) {
      include_partial('gsDashmixCore/notification');
      sfContext::getInstance()->getUser()->clearNotification();
    }
    ?>
  </body>
</html>

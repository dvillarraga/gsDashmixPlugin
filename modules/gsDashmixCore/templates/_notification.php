<script src="<?php echo sfConfig::get('app_gs_dashmix_plugin_theme_files', '/assets'); ?>/js/plugins/es6-promise/es6-promise.auto.min.js"></script>
<script src="<?php echo sfConfig::get('app_gs_dashmix_plugin_theme_files', '/assets'); ?>/js/plugins/sweetalert2/sweetalert2.min.js"></script>
<link rel="stylesheet" href="<?php echo sfConfig::get('app_gs_dashmix_plugin_theme_files', '/assets'); ?>/js/plugins/sweetalert2/sweetalert2.min.css">
<script>
	$( document ).ready(function() {
		Swal.fire(
  			'',
			'<?php echo sfContext::getInstance()->getUser()->getNotificationMessage();?>',
			'<?php echo sfContext::getInstance()->getUser()->getNotificationType(); ?>'
		);
	});
</script>
<script src="<?php echo sfConfig::get('app_gs_dashmix_plugin_theme_files', '/assets'); ?>/js/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo sfConfig::get('app_gs_dashmix_plugin_theme_files', '/assets'); ?>/js/plugins/jquery-validation/additional-methods.js"></script>

<script>
    function initModalUploadForm() {
        //JS Form Validation
        $("#upload_form").validate({
            rules: {
                f_file: {
                    required: true,
                    accept: "<?php echo $dataModal['mimetype'] ?>"
                }
            }
        });
    };
</script>

<!-- Vertically Centered Block Modal -->
<div class="modal" id="modal-upload-form" role="dialog" aria-labelledby="modal-block-vcenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="<?php echo $dataModal['modalStyle'] ?>">
        <div class="modal-content">
            <div class="block block-themed block-transparent">
                <div class="block-header bg-primary-dark">
                    <h3 id="modal-upload-form-title" class="block-title"><?php echo html_entity_decode($dataModal['title']) ?></h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div id="block-content-modal" class="block-content">
                    <?php echo html_entity_decode($dataModal['description']); ?>
                    <br/>
                    <form id="upload_form" method="post" action="<?php echo url_for($dataModal['formAction']) ?>" enctype="multipart/form-data">
                        <div class="form-group text-center">
                            <input type="file" class="ml-auto mr-auto" id="f_file" name="f_file" require>
                        </div>
                        <div class="row">
                            <input type="submit" class="btn btn-primary ml-auto mr-auto" value="Cargar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Vertically Centered Block Modal -->
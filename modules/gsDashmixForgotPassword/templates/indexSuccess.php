<?php use_helper('I18N') ?>

<div class="content">
    <div class="row row-deck">
        <div class="col-12 js-appear-enabled animated fadeIn" data-toggle="appear">
            <div class="block block-rounded block-bordered">
                <div class="block-header block-header-default">
                    <h3 class="block-title"><?php echo __('Forgot your password?', null, 'sf_guard') ?></h3>
                </div>
                <div class="block-content block-content-full">
                  <div class="alert alert-primary" role="alert">
                    <p class="mb-0"><?php echo __('Do not worry, we can help you get back in to your account safely!', null, 'sf_guard') ?></p>
                  </div>
                  <div class="alert alert-secondary" role="alert">
                    <p class="mb-0"><?php echo __('Fill out the form below to request an e-mail with information on how to reset your password.', null, 'sf_guard') ?></p>
                  </div>
                  <div class="alert alert-warning" role="alert">
                    <p class="mb-0"><?php echo __('It will work only if your account is active, otherwise contact the administrator.', null, 'sf_guard') ?></p>
                  </div>
                </div>
                
                
                <form id="f_recover_password" action="<?php echo url_for('@sf_guard_forgot_password') ?>" method="post">
                    <?php echo $form->renderHiddenFields(false) ?>
                    <div class="block-content block-content-full">
                        <div class="row">
                            <?php echo $form->renderGlobalErrors() ?>
                            <div class="col form-group pt-2 text-right">
                                <?php echo $form['email_address']->renderLabel() ?>
                            </div>
                            <div class="col form-group">
                                <?php echo $form['email_address']->renderError() ?>
                                <?php echo $form['email_address'] ?>
                            </div>
                            <div class="col-lg-2"></div>
                        </div>
                        <div class="row items-push">
                            <div class="col text-center">
                                <input class="btn btn-primary" type="submit" value="<?php echo __('Request', null, 'sf_guard') ?>" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
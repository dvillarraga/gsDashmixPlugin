<?php use_helper('I18N') ?>
<div class="content">
    <div class="row row-deck">
        <div class="col-12 js-appear-enabled animated fadeIn" data-toggle="appear">
            <div class="block block-rounded block-bordered">
                <div class="block-header block-header-default">
                    <h3 class="block-title"><?php echo __('Enter your new password in the form below.', null, 'sf_guard') ?></h3>
                </div>
                <form id="f_recover_password" action="<?php echo url_for('@sf_guard_forgot_password_change?unique_key='.$sf_request->getParameter('unique_key')) ?>" method="post">
                    <?php echo $form->renderHiddenFields(false) ?>
                    <div class="block-content block-content-full">
                        <div class="row">
                            <?php echo $form->renderGlobalErrors() ?>
                            <div class="col form-group pt-2 text-right">
                                <?php echo $form['password']->renderLabel() ?>
                            </div>
                            <div class="col form-group">
                                <?php echo $form['password']->renderError() ?>
                                <?php echo $form['password'] ?>
                            </div>
                            <div class="col-lg-2"></div>
                        </div>
                        <div class="row">
                            <?php echo $form->renderGlobalErrors() ?>
                            <div class="col form-group pt-2 text-right">
                                <?php echo $form['password_again']->renderLabel() ?>
                            </div>
                            <div class="col form-group">
                                <?php echo $form['password_again']->renderError() ?>
                                <?php echo $form['password_again'] ?>
                            </div>
                            <div class="col-lg-2"></div>
                        </div>
                        <div class="row items-push">
                            <div class="col text-center">
                                <input class="btn btn-primary" type="submit" value="<?php echo __('Change', null, 'sf_guard') ?>" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
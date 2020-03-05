<?php use_helper('I18N') ?>
  <table>
    <tbody>
      <form class="js-validation-signin" action="<?php echo url_for('gsDashmixAuth/signin') ?>" method="POST">
      <div class="alert alert-danger text-center" style="<?php if(!$form->renderGlobalErrors()) echo 'display:none;' ?>" role="alert"><?php echo $form->renderGlobalErrors() ?></div>
        <?php echo $form->renderHiddenFields() ?>
        <div class="py-3">
          <div class="form-group">
            <div class="alert alert-danger" style="<?php if(!$form['username']->renderError()) echo 'display:none;' ?>" role="alert"><?php echo $form['username']->renderError() ?></div>
            <?php echo $form['username'] ?>
          </div>
          <div class="form-group">
            <?php echo $form['password'] ?>
          </div>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-block btn-hero-lg btn-hero-primary">
            <i class="fa fa-fw fa-sign-in-alt mr-1"></i> <?php echo __('Signin', null, 'sf_guard') ?>
          </button>
          <!-- <p class="mt-3 mb-0 d-lg-flex justify-content-lg-between">
            <a class="btn btn-sm btn-light d-block d-lg-inline-block mb-1" href="<?php //echo url_for('gsDashmixAuth/forgotPassword') ?>">
              <i class="fa fa-exclamation-triangle text-muted mr-1"></i> Olvidé mi Constraseña
            </a>
            <a class="btn btn-sm btn-light d-block d-lg-inline-block mb-1" href="<?php //echo url_for('gsDashmixAuth/signup') ?>">
              <i class="fa fa-plus text-muted mr-1"></i> Registrarme
            </a>
          </p> -->
        </div>
      </form>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php if ($sf_context->getRouting()->hasRouteName('sf_guard_forgot_password')) : ?>
            <a href="<?php echo url_for('@sf_guard_forgot_password') ?>"><?php echo __('Forgot your password?', null, 'sf_guard') ?></a>
          <?php endif; ?>

          <?php if ($sf_context->getRouting()->hasRouteName('sf_guard_register')) : ?>
            &nbsp; <a href="<?php echo url_for('@sf_guard_register') ?>"><?php echo __('Want to register?', null, 'sf_guard') ?></a>
          <?php endif; ?>
        </td>
      </tr>
    </tfoot>
  </table>
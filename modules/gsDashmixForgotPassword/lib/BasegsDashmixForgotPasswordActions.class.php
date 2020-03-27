<?php

/**
 * Base actions for the gsDashmixForgotPasswordPlugin gsDashmixForgotPassword module.
 *
 * @package     gsDashmixForgotPasswordPlugin
 * @subpackage  gsDashmixForgotPassword
 * @author      Your name here
 * @version     SVN: $Id$
 */
abstract class BasegsDashmixForgotPasswordActions extends sfActions
{
  public function preExecute()
  {
    if ($this->getUser()->isAuthenticated())
    {
      $this->redirect('@homepage');
    }
  }

  public function executeIndex($request)
  {
    $class = sfConfig::get('app_sf_guard_plugin_request_forgot_password_form', 'gsDashmixRequestForgotPasswordForm');
    $this->form = new $class();

    if ($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter($this->form->getName()));
      if ($this->form->isValid())
      {
        $this->user = Doctrine_Core::getTable('sfGuardUser')
          ->retrieveByUsernameOrEmailAddress($this->form->getValue('email_address'));

        Doctrine_Core::getTable('sfGuardForgotPassword')
          ->deleteByUser($this->user);

        $forgotPassword = new sfGuardForgotPassword();
        $forgotPassword->user_id = $this->user->id;
        $forgotPassword->unique_key = md5(rand() + time());
        $forgotPassword->expires_at = new Doctrine_Expression('NOW()');
        $forgotPassword->save();

        $this->sendRequestMail($this->user, $forgotPassword);

        $this->getUser()->setNotification('Listo, Revisa tu Email', 'success');

        $this->redirect(sfConfig::get('app_sf_guard_plugin_password_request_url', '@sf_guard_signin'));
      }
    }
  }

  /**
   * Send the request password email to the user
   *
   * @param object                $user           the user object
   * @param sfGuardForgotPassword $forgotPassword the forgot password record
   *
   * @return void
   */
  protected function sendRequestMail($user, $forgotPassword)
  {
    $i18n = $this->getContext()->getI18N();

    $message = $this->getMailer()->compose(
      sfConfig::get('app_sf_guard_plugin_default_from_email', 'from@noreply.com'),
      $user->email_address,
      $i18n->__('Forgot Password Request for %name%', array('%name%' => $user->username), 'sf_guard'),
      $this->getPartial('sfGuardForgotPassword/send_request', array('user' => $user, 'forgot_password' => $forgotPassword))
    )->setContentType('text/html');

    $this->getMailer()->send($message);
  }

  public function executeChange($request)
  {
    $this->forgotPassword = $this->getRoute()->getObject();
    $this->user = $this->forgotPassword->User;
    $this->form = new gsDashmixChangeUserPasswordForm($this->user);

    if ($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter($this->form->getName()));
      if ($this->form->isValid())
      {
        $this->form->save();

        $this->forgotPassword->delete();

        $this->sendChangeMail($this->user, $request['sf_guard_user']['password']);

        $this->getUser()->setNotification('Tu Contraseña se ha Actualizado', 'success');

        $this->redirect(sfConfig::get('app_sf_guard_plugin_password_change_url', '@sf_guard_signin'));
      }
    }
  }

  /**
   * Send email to the user with new password
   *
   * @param object $user     user object
   * @param string $password user password
   *
   * @return void
   */
  protected function sendChangeMail($user, $password)
  {
    $i18n = $this->getContext()->getI18N();

    $message = $this->getMailer()->compose(
      sfConfig::get('app_sf_guard_plugin_default_from_email', 'from@noreply.com'),
      $user->email_address,
      $i18n->__('New Password for %name%', array('%name%' => $user->username) , 'sf_guard'),
      $this->getPartial('sfGuardForgotPassword/new_password', array('user' => $user, 'password' => $password))
    )->setContentType('text/html');

    $this->getMailer()->send($message);
  }
}

<?php

/**
 * sfGuardFormSignin for sfGuardAuth signin action
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage form
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id$
 */
class gsDashmixFormSignin extends sfGuardFormSignin
{
  /**
   * @see sfForm
   */
  public function configure()
  {
    $this->setWidgets(array(
      'username' => new sfWidgetFormInputText(array(), array(
        'class' => 'form-control form-control-lg form-control-alt',
        'placeholder' => 'User',
        'required' => 'true'
      )),
      'password' => new sfWidgetFormInputPassword(array('type' => 'password'), array(
        'class' => 'form-control form-control-lg form-control-alt',
        'placeholder' => 'Password',
        'required' => 'true'
      )),
      'remember' => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'username' => new sfValidatorString(),
      'password' => new sfValidatorString(),
      'remember' => new sfValidatorBoolean(),
    ));

    if (sfConfig::get('app_sf_guard_plugin_allow_login_with_email', true))
    {
      $this->widgetSchema['username']->setLabel('Username or E-Mail');
    }

    $this->validatorSchema->setPostValidator(new sfGuardValidatorUser());

    $this->widgetSchema->setNameFormat('signin[%s]');

    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('sf_guard');
  }
}

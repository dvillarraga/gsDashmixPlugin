<?php

/**
 * BasesfGuardRequestForgotPasswordForm for requesting a forgot password email
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage form
 * @author     Jonathan H. Wage <jonwage@gmail.com>
 * @version    SVN: $Id$
 */
class gsDashmixRequestForgotPasswordForm extends BasesfGuardRequestForgotPasswordForm
{
  /**
   * @see sfForm
   */
  public function configure()
  {
  	$this->widgetSchema['email_address'] = new sfWidgetFormInputText(array(), array(
  		'class'=>'form-control',
  		'required' => 'required'
  	));
  	$this->widgetSchema['email_address']->setLabel('Correo Electrónico');
  	$this->widgetSchema->getFormFormatter()->setTranslationCatalogue('sf_guard');
  }
}
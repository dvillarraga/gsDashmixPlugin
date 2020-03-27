<?php

/**
 * gsDashmixChangeUserPasswordForm for changing a users password
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage form
 * @author     Jonathan H. Wage <jonwage@gmail.com>
 * @version    SVN: $Id$
 */
class gsDashmixChangeUserPasswordForm extends BasesfGuardChangeUserPasswordForm
{
  /**
   * @see sfForm
   */
  public function configure()
  {
  	$this->widgetSchema['password'] = new sfWidgetFormInputPassword(
  		array(), 
  		array(
  			'class' => 'form-control',
  			'required' => 'required'
  		)
  	);
  	$this->widgetSchema['password_again'] = new sfWidgetFormInputPassword(
  		array(),
  		array(
  			'class' => 'form-control',
  			'required' => 'required'
  		)
  	);
  	$this->widgetSchema['password']->setLabel('Contraseña');
  	$this->widgetSchema['password_again']->setLabel('Repita Contraseña');
  	$this->widgetSchema->getFormFormatter()->setTranslationCatalogue('sf_guard');
  }
}
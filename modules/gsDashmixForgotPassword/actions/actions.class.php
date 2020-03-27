<?php

require_once dirname(__FILE__).'/../lib/BasegsDashmixForgotPasswordActions.class.php';

/**
 * gsDashmixForgotPassword actions.
 * 
 * @package    gsDashmixForgotPasswordPlugin
 * @subpackage gsDashmixForgotPassword
 * @author     dvillarraga
 * @version    SVN: $Id$
 */
class gsDashmixForgotPasswordActions extends BasegsDashmixForgotPasswordActions
{
	public function preExecute(){
        $this->setLayout(sfConfig::get('app_gs_dashmix_plugin_forgotpassword_layout', 'dashmix_public'));
        parent::preExecute();
    }
}

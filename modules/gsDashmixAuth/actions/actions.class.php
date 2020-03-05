<?php

/**
 * gsDashmixAuth actions.
 *
 * @package    gsDashmixPlugin
 * @subpackage gsDashmixAuth
 * @author     GsoftColombia
 * @version    SVN: $Id$
 */

require_once(dirname(__FILE__).'/../../../../sfDoctrineGuardPlugin/modules/sfGuardAuth/actions/actions.class.php');

class gsDashmixAuthActions extends sfGuardAuthActions
{
    public function executeSecure($request)
    {
        $this->getResponse()->setStatusCode(403);
        $class = sfConfig::get('app_sf_guard_plugin_signin_form', 'sfGuardFormSignin'); 
        $this->form = new $class();
    }
}

<?php

/**
 * Represents the Leaf in the Composite pattern.
 * Represents a menu item.
 *
 * @author GsoftColombia
 */
class gsDashmixMenuItem extends gsDashmixMenuComponent
{
  /**
   * Renders the gsDashmixMenuItem.
   *
   * @return string
   */
  public function render()
  {
    $context = sfContext::getInstance();
    $context->getConfiguration()->loadHelpers(array("I18N", "Url"));
    
    $url = url_for($this->getUrl());
    $target = $this->getTarget();
    $icon_class = $this->getIconClass();
    $name = __($this->getName());
    $has_credentials = $context->getUser()->hasCredential($this->getCredentials(),$this->andMode);
    
    if($has_credentials){
      return <<<EOF
<li class="nav-main-item">
  <a class="nav-main-link" href="$url" target="$target">
    <i class="nav-main-link-icon $icon_class"></i>
    <span class="nav-main-link-name">$name</span>
  </a>
</li>
EOF;
    }else{
      return "";
    }
  }
}
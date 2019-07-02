<?php

/**
 * Abstract class that represents the Component in the Composite pattern.
 * Provides the basic functionality of Composite and Leaf objects.
 *
 * @author GsoftColombia
 */
abstract class gsDashmixMenuComponent
{
  /**
   * The credentials.
   * Just authenticated users that has these credentials should
   * be able to use this component.
   * @var array
   */
  protected $credentials;
  
  /**
   * The component name.
   * If the component is a leaf (gsDashmixMenuItem), the name represents
   * the link label.
   * If the component is a composite (gsDashmixMenu), the name represents
   * the group label.
   * @var string
   */
  protected $name;
  
  /**
   * The component link.
   * If the component is a leaf (gsDashmixMenuItem), the name represents
   * the link href.
   * If the component is a composite (gsDashmixMenu), the name represents
   * the group href.
   * @var string
   */
  protected $url;

  /**
   * andMode for Credentials validation
   * default True
   * @var boolean
   */
  protected $andMode;
  
  /**
   * Icon Class for the menu item 
   * such as "fa fa-bookmark"
   * @var boolean
   */
  protected $icon_class;

  /**
   * Constructor.
   */
  public function __construct()
  {
    $this->credentials = array();
    $this->name = "";
    $this->url = "";
    $this->target = "";
    $this->andMode = TRUE;
  }
  
  /**
   * Renders the component.
   *
   * @return string
   */
  abstract public function render();
  
  /**
	 * Set the value of credentials attribute.
	 * 
	 * @param array $v The credentials array
   * @param boolean $andMode andMode for Credentials
	 * @return gsDashmixMenuComponent The current object (for fluent API support)
	 */
  public function setCredentials($v, $andMode = TRUE)
  {
    $this->credentials = $v;
    $this->andMode = $andMode;
    return $this;
  }

  /**
	 * Get the credentials attribute value.
	 * 
	 * @return string
	 */
  public function getCredentials()
  {
    return $this->credentials;
  }
  
  /**
	 * Set the value of name attribute.
	 * 
	 * @param string $v The new name
	 * @return gsDashmixMenuComponent The current object (for fluent API support)
	 */
  public function setName($v)
  {
    $this->name = $v;
    
    return $this;
  }

  /**
	 * Get the name attribute value.
	 * 
	 * @return string
	 */
  public function getName()
  {
    return $this->name;
  }
  
  /**
	 * Set the value of url attribute.
	 * 
	 * @param string $v The new url
	 * @return gsDashmixMenuComponent The current object (for fluent API support)
	 */
  public function setUrl($v)
  {
    $this->url = $v;
    
    return $this;
  }
  
  /**
	 * Get the url attribute value.
	 * 
	 * @return string
	 */
  public function getUrl()
  {
    return $this->url;
  }

  /**
   * Set the value of url attribute.
   * 
   * @param string $t The target for url
   * @return gsDashmixMenuComponent The current object (for fluent API support)
   */
  public function setTarget($t)
  {
    $this->target = $t;
    
    return $this;
  }
  
  /**
   * Set the value of url attribute.
   * 
   * @param string $t The icon-class
   * @return gsDashmixMenuComponent The current object (for fluent API support)
   */
  public function setIconClass($t)
  {
    $this->icon_class = $t;
    
    return $this;
  }

  /**
   * Get the target attribute value.
   * 
   * @return string
   */
  public function getTarget()
  {
    return $this->target;
  }
  public function getIconClass()
  {
    return $this->icon_class;
  }
}
<?php

/**
 * Represents the Composite in the Composite pattern.
 * Represents a menu and all it's children.
 *
 * @author GsoftColombia
 */
class gsDashmixMenu extends gsDashmixMenuComponent
{
  /**
   * The composite children.
   * @var array
   */
  protected $children;
  
  /**
   * Indicates if the composite is a root.
   * @var boolean
   */
  protected $is_root;
   
  /**
   * Constructor.
   */
  public function __construct()
  {
    parent::__construct();
    
    $this->children = array();
    $this->is_root = false;
  }
  
  /**
	 * Create an instance of gsDashmixMenu from a yaml file.
	 * 
	 * @param string $yaml_file The yaml file path
	 * @return gsDashmixMenu
	 */
  public static function createFromYaml($yaml_file)
  {
    $yaml = sfYaml::load($yaml_file);
    
    $root = new gsDashmixMenu();
    $root->setRoot();
    
    $yaml = array_pop($yaml);
    
    foreach ($yaml as $name => $arr_menu)
    {
      $item = self::createMenu($arr_menu);
      $root->addChild($name, $item);
    }
    
    return $root;
  }
  
  /**
	 * Create a submenu from an array.
	 * 
	 * @param array $arr The array
	 * @return gsDashmixMenuComponent
	 */
  protected static function createMenu($arr)
  {
    $item = null;
    if (array_key_exists("menu", $arr))
    {
      $item = new gsDashmixMenu();
      foreach ($arr["menu"] as $name => $submenu)
      {
        $sitem = self::createMenu($submenu);
        $item->addChild($name, $sitem);
      }
    }
    else
    {
      $item = new gsDashmixMenuItem();
    }
    if (array_key_exists("credentials", $arr)) $item->setCredentials($arr["credentials"]);
    if (array_key_exists("name", $arr)) $item->setName($arr["name"]);
    if (array_key_exists("url", $arr)) $item->setUrl($arr["url"]);
    
    return $item;
  }
  
  /**
	 * Get the children attribute value.
	 * 
	 * @return array
	 */
  public function getChildren()
  {
    return $this->children;
  }
  
  /**
	 * Get a child.
	 *
	 * @param string $name The child name
	 * @return mixed
	 */
  public function getChild($name)
  {
    $child = null;
    
    if (isset($this->children[$name]))
    {
      $child = $this->children[$name];
    }
    
    return $child;
  }

  /**
	 * Adds a child.
	 *
	 * @param string $name The child name
	 * @param gsDashmixMenuComponent $component The child
	 * @return gsDashmixMenu The current object (for fluent API support)
	 */
  public function addChild($name, gsDashmixMenuComponent $component)
  {
    $this->children[$name] = $component;
    
    return $this;
  }
  
  /**
	 * Removes a child.
	 *
	 * @param string $name The child name
	 * @return gsDashmixMenu The current object (for fluent API support)
	 */
  public function removeChild($name)
  {
    unset($this->children[$name]);
    
    return $this;
  }

  /**
	 * Set the current object as the root.
	 * 
	 * @return gsDashmixMenu The current object (for fluent API support)
	 */
  public function setRoot()
  {
    $this->is_root = true;
    
    return $this;
  }
  
  /**
	 * Unset the current object as the root.
	 * 
	 * @return gsDashmixMenu (for fluent API support)
	 */
  public function unsetRoot()
  {
    $this->is_root = false;
    
    return $this;
  }
  
  /**
	 * Returns if the current object is the root.
	 * 
	 * @return boolean
	 */
  public function isRoot()
  {
    return $this->is_root;
  }
  
  
  
  /**
   * Renders the gsDashmixMenu.
   *
   * @return string
   */
  public function render()
  {
    $context = sfContext::getInstance();
    $context->getConfiguration()->loadHelpers(array("I18N", "Url"));
    
    $url = $this->getUrl() ? url_for($this->getUrl()) : "";
    $target = $this->getTarget();
    $name = __($this->getName());
    $icon_class = $this->getIconClass();
    $has_credentials = $context->getUser()->hasCredential($this->getCredentials(), $this->andMode);
    
    if ($has_credentials)
    {
      if($this->isRoot()){
        $str = <<<EOF
<!-- Sidebar -->
<!--
  Sidebar Mini Mode - Display Helper classes

  Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
  Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
      If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

  Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
  Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
  Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
-->
<nav id="sidebar" aria-label="Main Navigation">
  <!-- Side Header -->
  <div class="bg-header-light">
      <div class="content-header bg-white-10">
          <!-- Logo -->
          <div style="margin-left:auto;margin-right:auto;">
              <a href="<?php echo url_for('home/index')?>"><img src="/assets/logo-auth.png" style="max-width: 200px;"></a>
          </div>
          <!-- END Logo -->
      </div>
  </div>
  <!-- END Side Header -->

  <!-- Side Navigation -->
  <div class="content-side content-side-full">
      <ul class="nav-main">
EOF;
      }else{
        $str = <<<EOF
<li class="nav-main-item">
  <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="$url" target="$target">
      <i class="nav-main-link-icon $icon_class"></i>
      <span class="nav-main-link-name">$name</span>
  </a>
  <ul class="nav-main-submenu">
EOF;
      }

      
    
      foreach ($this->getChildren() as $child)
      {
        $str .= $child->render();
      }
      
      if($this->isRoot()){
        $str .= <<<EOF
      </ul>
    </div>
  <!-- END Side Navigation -->
</nav>
<!-- END Sidebar -->
EOF;
      }else{
        $str .= "</ul></li>";
      }
      return $str;
    }
    else
    {
      return "";
    }
  }
}
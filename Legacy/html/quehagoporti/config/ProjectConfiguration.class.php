<?php

require_once dirname(__FILE__).'/../../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  protected static $zendLoaded = false;

  public static $basePath   = '/../../lib/vendor';
 
  static public function registerZend()
  {
    $path = dirname(__FILE__).self::$basePath;

    if (self::$zendLoaded)
    {
      return;
    }
 
    set_include_path( $path.PATH_SEPARATOR.get_include_path() );
    require_once $path.'/Zend/Loader/Autoloader.php';
    Zend_Loader_Autoloader::getInstance();
    self::$zendLoaded = true;
  }
	
  public function setup()
  {
    $this->enablePlugins('sfDoctrinePlugin');
    $this->enablePlugins('sfDoctrineGuardPlugin');
    $this->enablePlugins('sfFormExtraPlugin');
    $this->enablePlugins('sfThumbnailPlugin');
    $this->enablePlugins('sfDoctrineActAsTaggablePlugin');
    $this->enablePlugins('sfJqueryReloadedPlugin');
    $this->enablePlugins('sfDoctrineNestedSetPlugin');
  }
}

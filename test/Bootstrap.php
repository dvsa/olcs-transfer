<?php

namespace Dvsa\OlcsTest\Transfer;

use Mockery as m;
use Doctrine\Common\Annotations\AnnotationRegistry;

error_reporting(-1);
chdir(dirname(__DIR__));
date_default_timezone_set('Europe/London');

/**
 * Test bootstrap, for setting up autoloading
 */
class Bootstrap
{
    protected static $config = array();

    public static function init()
    {
        ini_set('memory_limit', '1G');
        // Setup the autoloader
        $loader = static::initAutoloader();
        $loader->addPsr4('Dvsa\\OlcsTest\\Transfer\\', __DIR__ . '/src');

        AnnotationRegistry::registerLoader([$loader, 'loadClass']);

        // Grab the application config
        $config = array(
            'modules' => array(
                'Dvsa\Olcs\Transfer'
            ),
            'module_listener_options' => array(
                'module_paths' => array(
                    __DIR__ . '/../'
                )
            )
        );

        self::$config = $config;

        self::getServiceManager();
    }

    /**
     * Changed this method to return a mock
     *
     * @return \Zend\ServiceManager\ServiceManager
     */
    public static function getServiceManager()
    {
        $sm = m::mock('\Zend\ServiceManager\ServiceManager')
            ->makePartial()
            ->setAllowOverride(true);

        return $sm;
    }

    protected static function initAutoloader()
    {
        return require('vendor/autoload.php');
    }
}

Bootstrap::init();

<?php

namespace Dvsa\OlcsTest\Transfer;

use Mockery as m;

/**
 * Test bootstrap, for setting up autoloading
 */
class Bootstrap
{
    protected static $config = [];

    public static function init()
    {
        ini_set('memory_limit', '1500M');
        // Grab the application config
        $config = [
            'modules' => [
                'Dvsa\Olcs\Transfer'
            ],
            'module_listener_options' => [
                'module_paths' => [
                    __DIR__ . '/../'
                ]
            ]
        ];

        self::$config = $config;

        self::getServiceManager();
    }

    /**
     * Changed this method to return a mock
     *
     * @return \Laminas\ServiceManager\ServiceManager
     */
    public static function getServiceManager()
    {
        $sm = m::mock(\Laminas\ServiceManager\ServiceManager::class)
            ->makePartial()
            ->setAllowOverride(true);

        return $sm;
    }
}

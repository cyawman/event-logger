<?php

namespace EventLogger;

/**
 * 
 *
 * @author Chris Yawman <chris.yawman@neustar.biz>
 */
class Module implements AutoloaderProviderInterface, ConfigProviderInterface
{

    /**
     * 
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    /**
     * 
     * @return array
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}
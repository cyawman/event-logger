<?php

namespace EventLogger\Factory\Log;

use Zend\Log\Logger;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * 
 * @author Chris Yawman <cyawman@gmail.com>
 */
class LoggerFactory implements FactoryInterface
{

    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return Logger
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');
        $logger = new Logger($config['log']);
        return $logger;
    }
}

<?php

namespace EventLogger\Factory\Log\Listener;

use EventLogger\Log\Listener\AppListener;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * 
 * @author Chris Yawman <cyawman@gmail.com>
 */
class AppListenerFactory implements FactoryInterface
{

    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return AppListener
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $logger = $serviceLocator->get('EventLogger\Log\Logger');
        return new AppListener($logger);
    }
}

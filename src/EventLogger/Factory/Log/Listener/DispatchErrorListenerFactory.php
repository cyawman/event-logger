<?php

namespace EventLogger\Factory\Log\Listener;

use EventLogger\Log\Listener\DispatchErrorListener;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * 
 * 
 * @author Chris Yawman <cyawman@gmail.com>
 */
class DispatchErrorListenerFactory implements FactoryInterface
{

    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return DispatchErrorListener
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $logger = $serviceLocator->get('EventLogger\Log\Logger');
        return new DispatchErrorListener($logger);
    }
}

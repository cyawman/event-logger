<?php

namespace EventLogger\Factory\Log\Listener;

use EventLogger\Log\Listener\ListenerAggregate;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * 
 * 
 * @author Chris Yawman <cyawman@gmail.com>
 */
class ListenerAggregateFactory implements FactoryInterface
{

    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return ListenerAggregate
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new ListenerAggregate($serviceLocator);
    }
}

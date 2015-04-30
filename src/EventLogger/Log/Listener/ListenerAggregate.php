<?php

namespace EventLogger\Log\Listener;

use Zend\EventManager\AbstractListenerAggregate;
use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\MvcEvent;
use Zend\ServiceManager\ServiceManager;

/**
 * 
 * @author Chris Yawman <cyawman@gmail.com>
 */
class ListenerAggregate extends AbstractListenerAggregate
{

    /** @var ServiceManager */
    private $serviceManager;

    /**
     * 
     * @param ServiceManager $serviceManager
     */
    public function __construct(ServiceManager $serviceManager)
    {
        $this->serviceManager = $serviceManager;
    }

    /**
     * 
     * @param EventManagerInterface $events
     */
    public function attach(EventManagerInterface $events)
    {
        $this->listeners[] = $events->getSharedManager()->attach('*', 'log', array($this->serviceManager->get('EventLogger\Log\Listener\AppListener'), 'log'));
        $this->listeners[] = $events->attach(MvcEvent::EVENT_DISPATCH_ERROR, array($this->serviceManager->get('EventLogger\Log\Listener\DispatchErrorListener'), 'log'), -200);
    }
}

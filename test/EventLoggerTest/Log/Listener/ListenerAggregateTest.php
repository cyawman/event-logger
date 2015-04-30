<?php

namespace EventLoggerTest\Log\Listener;

use EventLogger\Log\Listener\ListenerAggregate;
use PHPUnit_Framework_TestCase;
use stdClass;
use Zend\EventManager\EventManager;
use Zend\EventManager\SharedEventManager;
use Zend\ServiceManager\ServiceManager;

/**
 * 
 *
 * @author Chris Yawman <cyawman@gmail.com>
 */
class ListenerAggregateTest extends PHPUnit_Framework_TestCase
{

    public function testCanCreateClass()
    {
        $class = new ListenerAggregate(new ServiceManager());

        $this->assertInstanceOf('Zend\EventManager\AbstractListenerAggregate', $class);
    }

    public function testCanAttachListeners()
    {
        $mockListener = $this->getMock('EventLogger\Log\Listener\LogListener');

        $serviceManager = new ServiceManager();
        $serviceManager->setService('EventLogger\Log\Listener\AppListener', $mockListener);
        $serviceManager->setService('EventLogger\Log\Listener\DispatchErrorListener', $mockListener);

        $eventManager = new EventManager();
        $eventManager->setSharedManager(new SharedEventManager());

        $listenerAggregate = new ListenerAggregate($serviceManager);
        $listenerAggregate->attach($eventManager);
    }
}

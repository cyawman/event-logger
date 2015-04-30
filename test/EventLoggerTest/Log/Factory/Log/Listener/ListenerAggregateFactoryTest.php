<?php

namespace EventLoggerTest\Factory\Log\Listener;

use EventLogger\Factory\Log\Listener\ListenerAggregateFactory;
use PHPUnit_Framework_TestCase;
use Zend\ServiceManager\ServiceManager;

/**
 * 
 *
 * @author Chris Yawman <cyawman@gmail.com>
 */
class ListenerAggregateFactoryTest extends PHPUnit_Framework_TestCase
{

    public function testCanCreateClass()
    {
        $class = new ListenerAggregateFactory();

        $this->assertInstanceOf('Zend\ServiceManager\FactoryInterface', $class);
    }

    public function testCanCreateService()
    {
        $serviceManager = new ServiceManager();

        $factory = new ListenerAggregateFactory();

        $service = $factory->createService($serviceManager);

        $this->assertInstanceOf('Zend\EventManager\AbstractListenerAggregate', $service);
    }
}

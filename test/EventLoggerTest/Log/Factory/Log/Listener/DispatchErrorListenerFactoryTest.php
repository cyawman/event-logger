<?php

namespace EventLoggerTest\Factory\Log\Listener;

use EventLogger\Factory\Log\Listener\DispatchErrorListenerFactory;
use PHPUnit_Framework_TestCase;
use Zend\Log\Logger;
use Zend\ServiceManager\ServiceManager;

/**
 * 
 *
 * @author Chris Yawman <cyawman@gmail.com>
 */
class DispatchErrorListenerFactoryTest extends PHPUnit_Framework_TestCase
{

    public function testCanCreateClass()
    {
        $class = new DispatchErrorListenerFactory();

        $this->assertInstanceOf('Zend\ServiceManager\FactoryInterface', $class);
    }

    public function testCanCreateService()
    {
        $serviceManager = new ServiceManager();
        $serviceManager->setService('EventLogger\Log\Logger', new Logger());

        $factory = new DispatchErrorListenerFactory();

        $listener = $factory->createService($serviceManager);

        $this->assertInstanceOf('EventLogger\Log\Listener\DispatchErrorListener', $listener);
    }
}

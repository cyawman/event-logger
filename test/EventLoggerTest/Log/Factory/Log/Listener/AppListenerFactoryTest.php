<?php

namespace EventLoggerTest\Factory\Log\Listener;

use EventLogger\Factory\Log\Listener\AppListenerFactory;
use PHPUnit_Framework_TestCase;
use Zend\Log\Logger;
use Zend\ServiceManager\ServiceManager;

/**
 * 
 *
 * @author Chris Yawman <cyawman@gmail.com>
 */
class AppListenerFactoryTest extends PHPUnit_Framework_TestCase
{

    public function testCanCreateClass()
    {
        $class = new AppListenerFactory();

        $this->assertInstanceOf('Zend\ServiceManager\FactoryInterface', $class);
    }

    public function testCanCreateService()
    {
        $serviceManager = new ServiceManager();
        $serviceManager->setService('EventLogger\Log\Logger', new Logger());

        $factory = new AppListenerFactory();

        $listener = $factory->createService($serviceManager);

        $this->assertInstanceOf('EventLogger\Log\Listener\AppListener', $listener);
    }
}

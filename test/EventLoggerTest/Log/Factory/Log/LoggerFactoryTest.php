<?php

namespace EventLoggerTest\Factory\Log;

use EventLogger\Factory\Log\LoggerFactory;
use PHPUnit_Framework_TestCase;
use Zend\ServiceManager\ServiceManager;

/**
 * 
 *
 * @author Chris Yawman <cyawman@gmail.com>
 */
class LoggerFactoryTest extends PHPUnit_Framework_TestCase
{

    public function testCanCreateClass()
    {
        $class = new LoggerFactory();

        $this->assertInstanceOf('Zend\ServiceManager\FactoryInterface', $class);
    }

    public function testCanCreateService()
    {
        $serviceManager = new ServiceManager();
        $serviceManager->setService('Config', array('log' => array()));

        $factory = new LoggerFactory();

        $logger = $factory->createService($serviceManager);

        $this->assertInstanceOf('Zend\Log\Logger', $logger);
    }
}

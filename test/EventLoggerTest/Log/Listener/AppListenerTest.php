<?php

namespace EventLoggerTest\Log\Listener;

use EventLogger\Log\Listener\AppListener;
use PHPUnit_Framework_TestCase;
use Zend\EventManager\Event;
use Zend\Log\Logger;
use Zend\Log\Writer\Mock;

/**
 * 
 *
 * @author Chris Yawman <chris.yawman@neustar.biz>
 */
class AppListenerTest extends PHPUnit_Framework_TestCase
{

    public function testCanCreateClass()
    {
        $logger = new Logger();

        $class = new AppListener($logger);

        $this->assertInstanceOf('EventLogger\Log\Listener\LogListener', $class);
    }

    public function testCanLogEvent()
    {
        $writer = new Mock();
        $logger = new Logger();
        $logger->addWriter($writer);

        $event = new Event('log', $this, array('priority' => 1, 'message' => 'testing'));

        $listener = new AppListener($logger);
        $listener->log($event);

        $this->assertEquals(1, $writer->events[0]['priority']);
        $this->assertEquals('testing', $writer->events[0]['message']);
    }
}

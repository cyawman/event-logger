<?php

namespace EventLoggerTest\Log\Listener;

use EventLogger\Log\Listener\DispatchErrorListener;
use Exception;
use PHPUnit_Framework_TestCase;
use stdClass;
use Zend\Log\Logger;
use Zend\Log\Writer\Mock;
use Zend\Mvc\MvcEvent;

/**
 * 
 *
 * @author Chris Yawman <chris.yawman@neustar.biz>
 */
class DispatchErrorListenerTest extends PHPUnit_Framework_TestCase
{

    public function testCanCreateClass()
    {
        $logger = new Logger();

        $class = new DispatchErrorListener($logger);

        $this->assertInstanceOf('EventLogger\Log\Listener\LogListener', $class);
    }

    public function testCanLogEvent()
    {
        $writer = new Mock();
        $logger = new Logger();
        $logger->addWriter($writer);

        $result = new stdClass();
        $result->exception = new Exception("ERROR!");

        $event = new MvcEvent('dispatch.error', $this, array());
        $event->setResult($result);

        $listener = new DispatchErrorListener($logger);

        $listener->log($event);

        $this->assertNotEmpty($writer->events);
    }

    public function testWontLogEventWithoutException()
    {
        $writer = new Mock();
        $logger = new Logger();
        $logger->addWriter($writer);

        $result = new stdClass();
        $result->exception = null;

        $event = new MvcEvent('dispatch.error', $this, array());
        $event->setResult($result);

        $listener = new DispatchErrorListener($logger);

        $listener->log($event);

        $this->assertEmpty($writer->events);
    }
}

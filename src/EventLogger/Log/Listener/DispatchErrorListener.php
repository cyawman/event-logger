<?php

namespace EventLogger\Log\Listener;

use Zend\EventManager\EventInterface;
use Zend\Log\Logger;

/**
 * 
 * @author Chris Yawman <cyawman@gmail.com>
 */
class DispatchErrorListener implements LogListener
{

    /** @var Logger */
    private $logger;

    /**
     * 
     * @param Logger $logger
     */
    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * 
     * @param EventInterface $event
     */
    public function log(EventInterface $event)
    {
        $exception = $event->getResult()->exception;

        if (!$exception) {
            return;
        }

        $trace = $exception->getTraceAsString();
        $i = 1;
        do {
            $messages[] = $i++ . ": " . $exception->getMessage();
        } while ($e = $exception->getPrevious());

        $log = "Exception:n" . implode("n", $messages);
        $log .= "nTrace:n" . $trace;

        $this->logger->err($log);
    }
}

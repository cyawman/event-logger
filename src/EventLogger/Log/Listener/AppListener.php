<?php

namespace EventLogger\Log\Listener;

use Zend\EventManager\EventInterface;
use Zend\Log\Logger;

/**
 * 
 * @author Chris Yawman <cyawman@gmail.com>
 */
class AppListener implements LogListener
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
        $message = $event->getParam('message', 'No message provided');
        $priority = $event->getParam('priority', Logger::INFO);

        $this->logger->log($priority, $message);
    }
}

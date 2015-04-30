<?php

namespace EventLogger\Log\Listener;

use Zend\EventManager\EventInterface;

/**
 * 
 *
 * @author Chris Yawman <cyawman@gmail.com>
 */
interface LogListener
{

    public function log(EventInterface $event);
}

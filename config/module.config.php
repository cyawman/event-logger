<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'EventLogger\Log\Logger' => 'EventLogger\Factory\Log\LoggerFactory',
            'EventLogger\Log\Listener\AppListener' => 'EventLogger\Factory\Log\Listener\AppListenerFactory',
            'EventLogger\Log\Listener\DispatchErrorListener' => 'EventLogger\Factory\Log\Listener\DispatchErrorListenerFactory',
            'EventLogger\Log\Listener\ListenerAggregate' => 'EventLogger\Factory\Log\Listener\ListenerAggregateFactory'
        )
    )
);

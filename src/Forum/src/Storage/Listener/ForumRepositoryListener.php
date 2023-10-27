<?php

declare(strict_types=1);

namespace Forum\Storage\Listener;

use Laminas\Db\TableGateway\Feature\EventFeature;
use Laminas\Db\TableGateway\Feature\EventFeature\TableGatewayEvent;
use Laminas\EventManager\AbstractListenerAggregate;
use Laminas\EventManager\EventManagerInterface;

final class ForumRepositoryListener extends AbstractListenerAggregate
{

    public function attach(EventManagerInterface $events, $priority = 1)
    {
        $this->listeners[] = $events->attach(EventFeature::EVENT_POST_SELECT, [$this, 'postSelect'], $priority);
    }

    public function postSelect(TableGatewayEvent $event)
    {
        $resultSet = $event->getParam('result_set');
        $row = $resultSet->current();
    }
}

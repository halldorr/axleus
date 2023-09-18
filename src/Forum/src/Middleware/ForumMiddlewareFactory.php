<?php

declare(strict_types=1);

namespace Forum\Middleware;

use Psr\Container\ContainerInterface;

class ForumMiddlewareFactory
{
    public function __invoke(ContainerInterface $container) : ForumMiddleware
    {
        return new ForumMiddleware();
    }
}

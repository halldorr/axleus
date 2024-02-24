<?php

declare(strict_types=1);

namespace PageManager\AdminMiddleware;

use Psr\Container\ContainerInterface;

class DashBoardMiddlewareFactory
{
    public function __invoke(ContainerInterface $container) : DashBoardMiddleware
    {
        return new DashBoardMiddleware();
    }
}

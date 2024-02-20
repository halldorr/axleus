<?php

declare(strict_types=1);

namespace PageManager\AdminMiddleware;

use Psr\Container\ContainerInterface;

class CreatePageMiddlewareFactory
{
    public function __invoke(ContainerInterface $container) : CreatePageMiddleware
    {
        return new CreatePageMiddleware();
    }
}

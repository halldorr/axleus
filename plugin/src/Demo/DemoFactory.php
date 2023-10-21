<?php

declare(strict_types=1);

namespace Plugin\Demo;

use Psr\Container\ContainerInterface;

final class DemoFactory
{
    public function __invoke(ContainerInterface $container): Demo
    {
        return new Demo();
    }
}

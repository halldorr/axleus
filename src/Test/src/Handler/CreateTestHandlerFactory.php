<?php

declare(strict_types=1);

namespace Test\Handler;

use Mezzio\Template\TemplateRendererInterface;
use Psr\Container\ContainerInterface;

class CreateTestHandlerFactory
{
    public function __invoke(ContainerInterface $container) : CreateTestHandler
    {
        return new CreateTestHandler($container->get(TemplateRendererInterface::class));
    }
}

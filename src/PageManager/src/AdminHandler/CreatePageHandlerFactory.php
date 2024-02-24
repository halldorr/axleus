<?php

declare(strict_types=1);

namespace PageManager\AdminHandler;

use Mezzio\Template\TemplateRendererInterface;
use Psr\Container\ContainerInterface;

class CreatePageHandlerFactory
{
    public function __invoke(ContainerInterface $container) : CreatePageHandler
    {
        return new CreatePageHandler($container->get(TemplateRendererInterface::class));
    }
}

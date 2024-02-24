<?php

declare(strict_types=1);

namespace PageManager\AdminMiddleware;

use Mezzio\Template\TemplateRendererInterface;
use Psr\Container\ContainerInterface;

class CreatePageMiddlewareFactory
{
    public function __invoke(ContainerInterface $container) : CreatePageMiddleware
    {
        return new CreatePageMiddleware(
            $container->get(TemplateRendererInterface::class)
        );
    }
}

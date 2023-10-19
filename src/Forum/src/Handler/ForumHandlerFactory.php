<?php

declare(strict_types=1);

namespace Forum\Handler;

use Mezzio\Template\TemplateRendererInterface;
use Psr\Container\ContainerInterface;

class ForumHandlerFactory
{
    public function __invoke(ContainerInterface $container): ForumHandler
    {
        /** @var TemplateRendererInterface $renderer */
        $renderer = $container->get(TemplateRendererInterface::class);
        return new ForumHandler($renderer);
    }
}

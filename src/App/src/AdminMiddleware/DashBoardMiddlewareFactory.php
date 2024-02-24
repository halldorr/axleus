<?php

declare(strict_types=1);

namespace App\AdminMiddleware;

use Mezzio\Template\TemplateRendererInterface;
use Psr\Container\ContainerInterface;

class DashBoardMiddlewareFactory
{
    public function __invoke(ContainerInterface $container) : DashBoardMiddleware
    {
        return new DashBoardMiddleware(
            $container->get(TemplateRendererInterface::class)
        );
    }
}

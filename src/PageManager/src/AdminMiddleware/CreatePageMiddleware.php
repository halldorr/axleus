<?php

declare(strict_types=1);

namespace PageManager\AdminMiddleware;

use Mezzio\Template\TemplateRendererInterface;
use PageManager\AdminHandler\CreatePageHandler;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class CreatePageMiddleware implements MiddlewareInterface
{
    public function __construct(
        private TemplateRendererInterface $renderer,
    ) {
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler) : ResponseInterface
    {
        return $handler->handle($request);
    }
}

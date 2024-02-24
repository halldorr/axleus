<?php

declare(strict_types=1);

namespace App\AdminMiddleware;

use App\AdminHandler\DashBoardHandler;
use Axleus\Authorization\AuthorizationContextInterface;
use Laminas\View\Renderer\PhpRenderer;
use Mezzio\Template\TemplateRendererInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class DashBoardMiddleware implements MiddlewareInterface
{
    public function __construct(
        private TemplateRendererInterface|PhpRenderer $renderer,
    ) {
    }
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler) : ResponseInterface
    {
        return $handler->handle($request);
    }
}

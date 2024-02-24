<?php

declare(strict_types=1);

namespace PageManager\AdminMiddleware;

use Axleus\Middleware\DashBoardMiddlewareInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class DashBoardMiddleware implements MiddlewareInterface, DashBoardMiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler) : ResponseInterface
    {
        // $response = $handler->handle($request);
    }
}

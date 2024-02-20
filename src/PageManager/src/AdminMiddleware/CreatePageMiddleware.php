<?php

declare(strict_types=1);

namespace PageManager\AdminMiddleware;

use Axleus\Authorization\AuthorizationContextInterface;
use PageManager\AdminHandler\CreatePageHandler;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class CreatePageMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler) : ResponseInterface
    {
        $request = $request->withAttribute(
            AuthorizationContextInterface::class,
            [
                'resource'  => CreatePageHandler::class,
                'routeName' => 'admin.pagemanager.create',
                'privilege' => 'create'
            ]
        );
        $response = $handler->handle($request);
        return $response;
    }
}

<?php

declare(strict_types=1);

namespace PageManager\AdminHandler;

use Axleus\Authorization\AdminResourceInterface;
use Axleus\Authorization\PrivilegeInterface;
use Axleus\Authorization\ResourceInterfaceTrait;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Laminas\Diactoros\Response\HtmlResponse;
use Mezzio\Template\TemplateRendererInterface;

class CreatePageHandler implements AdminResourceInterface, PrivilegeInterface, RequestHandlerInterface
{
    use ResourceInterfaceTrait;

    public const PRIVILEGE_ID = 'create';

    /**
     * @var TemplateRendererInterface
     */
    private $renderer;

    public function __construct(TemplateRendererInterface $renderer)
    {
        $this->renderer = $renderer;
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        // Do some work...
        // Render and return a response:
        return new HtmlResponse($this->renderer->render(
            'page-manager::create-page',
            [] // parameters to pass to template
        ));
    }

    public function getPrivilegeId(): string
    {
        return static::PRIVILEGE_ID;
    }
}

<?php

declare(strict_types=1);

namespace App\AdminHandler;

use Axleus\Authorization\AuthorizedServiceInterface;
use Axleus\Authorization\AuthorizedServiceTrait;
use Axleus\Authorization\AdminResourceInterface;
use Axleus\Authorization\PrivilegeInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Laminas\Diactoros\Response\HtmlResponse;
use Mezzio\Template\TemplateRendererInterface;

class DashBoardHandler implements AuthorizedServiceInterface, RequestHandlerInterface
{
    use AuthorizedServiceTrait;
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
            'app::dash-board',
            ['layout' => 'layout::admin'] // parameters to pass to template
        ));
    }

    public function getResourceId()
    {
        return static::class;
    }

    public function getPrivilegeId(): string
    {
        return 'dashboard';
    }
}

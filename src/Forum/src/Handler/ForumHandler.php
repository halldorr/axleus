<?php

declare(strict_types=1);

namespace Forum\Handler;

use Forum\Storage\ForumRepository;
use Laminas\Diactoros\Response\HtmlResponse;
use Mezzio\Template\TemplateRendererInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ForumHandler implements RequestHandlerInterface
{

    public function __construct(
        private TemplateRendererInterface $renderer,
        private ForumRepository $forumRepository
    ) {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {

        // Do some work...
        // Render and return a response:
        return new HtmlResponse($this->renderer->render(
            'forum::forum',
            [
                //'forums' => $this->forumRepository->fetchAll()
            ] // parameters to pass to template
        ));
    }
}

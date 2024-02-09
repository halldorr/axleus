<?php

declare(strict_types=1);

namespace UserManager\Auth;

use Axleus\CommandBus\Exception\CommandFailedException;
use Exception;
use Mezzio\Authentication\AuthenticationInterface;
use Mezzio\Authentication\UserInterface;

final class LoginCommandHandler
{
    public function __construct(
        private AuthenticationInterface $auth
    ) {
    }

    public function handle(LoginCommand $command): ?UserInterface
    {
        // User session takes precedence over user/pass POST in
        // the auth adapter so we remove the session prior
        // to auth attempt
        $command->session->unset(UserInterface::class);
        $result = $this->auth->authenticate($command->request);
        if (! $result instanceof UserInterface) {
            throw new CommandFailedException('command_login_failed');
        }
        return $result;
    }
}

<?php

declare(strict_types=1);

namespace UserManager\Storage;

use Axleus\Authorization\ProprietaryInterfaceTrait;
use Axleus\Authorization\ResourceInterfaceTrait;
use Axleus\Db;
use Laminas\Permissions\Acl\ProprietaryInterface;
use Laminas\Permissions\Acl\Resource\ResourceInterface;

final class UserEntity implements Db\EntityInterface, ProprietaryInterface, ResourceInterface
{
    use Db\EntityTrait;
    use ProprietaryInterfaceTrait;
    use ResourceInterfaceTrait;

    public function __construct(
        private ?int $id,
        private ?string $email,
        private ?string $firstName,
        private ?string $lastName,
        private ?string $birthday,
        #[\SensitiveParameter]
        private ?string $password
    ) {
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setBirthday(string $birthday): void
    {
        $this->birthday = $birthday;
    }

    public function getBirthday(): ?string
    {
        return $this->birthday;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }
}

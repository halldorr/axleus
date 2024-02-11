<?php

declare(strict_types=1);

namespace PageManager\Storage;

use Laminas\Db\ResultSet\ResultSetInterface;
use Axleus\Db\EntityInterface;
use Axleus\Db;
use Axleus\Storage\AbstractRepository;

class PageRepository extends AbstractRepository
{
    /**
     * @psalm-suppress InvalidReturnType
     */
    public function delete(EntityInterface $entity): int { }
    /**
     * @psalm-suppress InvalidReturnType
     */
    public function findOneById(int $id): EntityInterface { }
    /**
     * @psalm-suppress InvalidReturnType
     */
    public function findOneByColumn(string $column, int|string $value): ResultSetInterface|EntityInterface { }
    /**
     * @psalm-suppress InvalidReturnType
     */
    public function findManyByColumn(array $titles): ResultSetInterface { }
    /**
     * @psalm-suppress InvalidReturnType
     */
    public function fetchAll(): ResultSetInterface { }
}

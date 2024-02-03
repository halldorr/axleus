<?php

declare(strict_types=1);

namespace PageManager\Storage;

use Laminas\Db\ResultSet\ResultSetInterface;
use Axleus\Db\EntityInterface;
use Axleus\Db;
use Axleus\Storage\AbstractRepository;

class PageRepository extends AbstractRepository
{

    // public function save(EntityInterface $entity): EntityInterface|int
    // {
    //     $set = $this->hydrator->extract($entity);
    //     if ($set === []) {
    //         throw new \InvalidArgumentException('Repository can not save empty entity.');
    //     }
    //     try {
    //         if (! isset($set['id']) ) {
    //             // insert
    //             $this->gateway->insert($set);
    //             $set['id'] = $this->gateway->getLastInsertValue();
    //         } else {
    //             $this->gateway->update($set, ['id' => $set['id']]);
    //         }

    //     } catch (\Throwable $th) {
    //         // todo: add logging, throw exception
    //     }
    //     return $this->hydrator->hydrate($set, $entity);
    // }
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

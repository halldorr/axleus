<?php

declare(strict_types=1);

namespace App\Db;

final class DoctrineRepository
{
    public function __construct(
        private TableGateway $table
    ) {
    }

    // public function select(array $columns, array $where)
    // {
    //     return $this->table->select($columns, $where);
    // }

    /**
     *
     * @param mixed $name
     * @param mixed $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        return $this->table->$name(...$arguments);
    }
}

<?php

declare(strict_types=1);

namespace App\Db;

use Doctrine\DBAL\Query\QueryBuilder;

abstract class AbstractTableGateway
{
    protected QueryBuilder $qb;

    /**
     *
     * @param array<int, string> $columns ['email', 'firstName'....]
     * @param array<string, mixed> $where ['column_name' => $target_value]
     * @return void
     */
    public function select(array $columns, array $where = [])
    {
        $this->qb->select(\implode(',', $columns));

        if ($where !== []) {
            foreach ($where as $column => $value) {
                $this->qb->where(
                    $column . ' = ' . $this->qb->createNamedParameter($value)
                );
            }
        }
        return $this->qb->fetchAllAssociative();
    }
}

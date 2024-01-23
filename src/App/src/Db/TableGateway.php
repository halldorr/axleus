<?php

declare(strict_types=1);

namespace App\Db;

use Doctrine\DBAL\Query\QueryBuilder;

class TableGateway extends AbstractTableGateway
{
    public function __construct(
        private TableIdentifier $table,
        protected QueryBuilder $qb
    ) {
        $this->qb->from((string)$table);
    }
}

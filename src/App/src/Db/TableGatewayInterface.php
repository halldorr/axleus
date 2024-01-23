<?php

declare(strict_types=1);

namespace App\Db;

interface TableGatewayInterface
{
    public function insert(array $set);
    public function update();
}

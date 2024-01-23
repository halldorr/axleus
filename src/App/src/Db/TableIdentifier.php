<?php

declare(strict_types=1);

namespace App\Db;

use Stringable;
use Exception;

final class TableIdentifier implements Stringable
{
    private string $identifier;

    public function __construct(
        private ?string $prefix = null,
        private ?string $table = null
    ) {
    }

    public function __invoke(string $prefix = null, string $table = null): string
    {
        if ($prefix !== null) {
            $this->prefix = $prefix;
        }
        if ($table !== null) {
            $this->table = $table;
        }
        $this->buildIdentifier();
        return $this->identifier;
    }

    private function buildIdentifier(): void
    {
        $this->identifier = $this->prefix.$this->table;
    }

    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    public function setTable(string $table): void
    {
        $this->table = $table;
        $this->buildIdentifier();
    }

    public function getTable(): ?string
    {
        return $this->table;
    }

    public function __toString(): string
    {
        if ($this->identifier === null) {
            $this->buildIdentifier();
        }
        return $this->getIdentifier();
    }
}

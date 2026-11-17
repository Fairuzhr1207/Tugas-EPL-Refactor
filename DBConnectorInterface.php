<?php

declare(strict_types=1);

interface DBConnectorInterface
{
    public function query(string $query): void;

    public function getNumRows(): int;

    public function fetchRow(): ?array;
}
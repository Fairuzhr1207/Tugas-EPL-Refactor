<?php

declare(strict_types=1);
class DBConnector

implements DBConnectorInterface
{
    private $users = [];
    private $cursor = 0;

    public function query(string $query): void
    {

        $this->users = [];
        $this->cursor = 0;

        for ($i=1; $i<=4; $i++) {
            $this->users[] = array('name' => 'Username' . $i);
        }    
    }

    public function getNumRows(): int
    {
        return count($this->users);
    }

    public function fetchRow(): ?array
    {
        if (!isset($this->users[$this->cursor])) {
            return null;
        }

        return $this->users[$this->cursor++];
    }
}

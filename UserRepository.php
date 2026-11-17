<?php

declare(strict_types=1);

class UserRepository
{
    private DBConnectorInterface $dbConnector;

    public function __construct(DBConnectorInterface $dbConnector)
    {
        $this->dbConnector = $dbConnector;
    }

    /**
     * @return User[]
     */
    public function getAll(int $limit = 10): array
    {
        $safeLimit = max(1, $limit);
        $this->dbConnector->query("SELECT * FROM users LIMIT {$safeLimit}");

        $users = [];
        if ($this->dbConnector->getNumRows() > 0) {
            while (($row = $this->dbConnector->fetchRow()) !== null) {
                $users[] = new User($row);
            }
        }

        return $users;
    }
}
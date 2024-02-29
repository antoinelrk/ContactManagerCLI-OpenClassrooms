<?php

class Contact
{
    public function __construct(
        protected readonly \PDO $db
    ) {}

    public function all(): array
    {
        $query = $this->db->prepare("SELECT * FROM contacts");
        $query->execute();
        return $query->fetchAll();
    }

    public function find(int $id): array
    {
        $query = $this->db->prepare("SELECT * FROM contacts WHERE id = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll();
    }
}
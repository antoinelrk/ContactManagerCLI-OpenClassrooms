<?php

class Contact
{
    public function __construct(
        protected readonly \PDO $db
    ) {}

    /**
     * Return all contact data.
     * 
     * @return array
     */
    public function all(): array
    {
        $query = $this->db->prepare("SELECT * FROM contacts");
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * Return one line where id.
     * 
     * @return array
     */
    public function find(int $id): array
    {
        $query = $this->db->prepare("SELECT * FROM contacts WHERE id = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * Just pass attributes for create new entry.
     * 
     * @return array
     */
    public function create($attribute): array
    {
        return [];
    }

    /**
     * Pass id and attributes for data updating.
     * 
     * @return array
     */
    public function update($id, $attribute): array
    {
        return [];
    }

    /**
     * Return true if data has been deleted.
     * 
     * @return bool
     */
    public function delete($id): bool
    {
        return true;
    }
}
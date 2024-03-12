<?php

use Core\Validator;

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
    public function all(): void
    {
        $query = $this->db->prepare("SELECT * FROM contacts");
        $query->execute();
        $this->render($query->fetchAll());
    }

    /**
     * Return one line where id.
     *
     * @return array
     */
    public function find(int $id): void
    {
        $query = $this->db->prepare("SELECT * FROM contacts WHERE id = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $this->render($query->fetchAll());
    }

    /**
     * Just pass attributes for create new entry.
     *
     * @return array
     */
    public function create(string $raws): void
    {
        $attributes = Helper::toObject($raws);

        $validator = Validator::make($attributes, [
            'name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'phone_number|required'
        ]);

        /**
         * Vérifier si les clés existent (name, email etc..) faire un système de validation.
         */

//        $query = $this->db->prepare("INSERT INTO utilisateurs (nom, prenom, email) VALUES (:nom, :prenom, :email)");
//        $query->bindParam(':name', $attributes);
    }

    /**
     * Pass id and attributes for data updating.
     *
     * @return array
     */
    public function update($id, $attributes): void
    {

    }

    /**
     * Return true if data has been deleted.
     *
     * @return bool
     */
    public function delete($params): void
    {
        $id = intval($params[0]);
        $query = $this->db->prepare("DELETE FROM contacts WHERE id = :id");
        $query->bindParam(':id', $id);

        if ($query->execute()) {
            Helper::print("Le contact n°$id a été supprimée avec succès.");
        } else {
            echo "Erreur lors de la suppression : " . $query->error;
        }
    }

    public function render(array $data): void
    {
        Helper::print("+---+-----------------------------------+--------------------------------------------+-------------------------+");
        Helper::print("| # | Name                              | Email                                      | Phone Number            |");
        Helper::print("+---+-----------------------------------+--------------------------------------------+-------------------------+");

        foreach ($data as $element) {
            printf(
                "| %-1s | %-33s | %-42s | %-23s |\n",
                $element['id'],
                $element['name'],
                $element['email'],
                $element['phone_number'],
            );
        }

        Helper::print("+---+-----------------------------------+--------------------------------------------+-------------------------+");
    }
}

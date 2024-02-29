<?php
require './core/Helper.php';

include './includes/bootstrap.php';

$on = true;

while($on) {
    $line = readline("Entrez votre commande: ");

    switch($line) {
        case "list":
            $query = $connection->prepare("SELECT * FROM contacts");
            $query->execute();
            $data = $query->fetchAll();

            foreach ($data as $element) {
                Helper::print("\033[0;31m| " . $element['name'] . " | " . $element['email'] . " | " . $element['phone_number'] . " |\033[0m");
            }
            break;
        case "q":
            Helper::print("Goodbye");
            $on = false;
            break;
    }
}

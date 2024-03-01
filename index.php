<?php
require_once './core/Helper.php';
require_once './core/Contact.php';

include_once './includes/bootstrap.php';

$contact = new Contact($connection);

$on = true;

while($on) {
    $raws = explode(' ', readline("Entrez votre commande: "));
    $command = array_shift($raws);

    $params = $raws;

    switch($command) {
        case "detail":
            $data = $contact->find(intval($params[0]));
            printTable($data);

            break;
        case "list":
            $data = $contact->all();
            printTable($data);

            break;
        case "quit":
            Helper::print("Goodbye");
            $on = false;
            break;
        default:
            Helper::print("Command '$command' not found!");
    }
}

function printTable($data) {
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

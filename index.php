<?php
require_once './core/Helper.php';
require_once './core/Contact.php';
require_once './core/Commands.php';

include_once './includes/bootstrap.php';

$on = true;

$contact = new Contact($connection);
$commandManager = new Commands($connection);

while($on) {
    $raws = explode(' ', readline("Entrez votre commande: "));
    $command = array_shift($raws);
    $params = $raws;

    switch($command) {
        case "detail":
            $commandManager->detail($command, $params);
            break;
        case "list":
            $commandManager->list($command, $params);
            break;
        case "create":
            $commandManager->create($command, $params);
            break;
        case "update":
            $commandManager->update($command, $params);
            break;
        case "delete":
            $commandManager->delete($command, $params);
            break;
        case "help":
            $commandManager->help($command, $params);
            break;
        case "quit":
            Helper::print("Goodbye");
            $on = false;
            break;
        default:
            Helper::print("Command '$command' not found!", 'error');
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

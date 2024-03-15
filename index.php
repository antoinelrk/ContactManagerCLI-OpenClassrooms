<?php
require_once './core/Helper.php';
require_once './core/Contact.php';
require_once './core/Commands.php';

include_once './includes/bootstrap.php';

$on = true;

$contact = new Contact($connection);
$commandManager = new Commands($connection);

function canard() {
    $bar = "oui";

    return compact(['bar']);
}

while($on) {
    $command = $commandManager->initCommand(readline("Entrez votre commande: "));

    switch($command->commandName) {
        case "detail":
            $commandManager->detail($command->commandName, $command->params);
            break;
        case "list":
            $commandManager->list($command->commandName, $command->params);
            break;
        case "create":
            $commandManager->create($command->commandName, $command->line);
            break;
        case "update":
            $commandManager->update($command->commandName, $command->line);
            break;
        case "delete":
            $commandManager->delete($command->commandName, $command->params);
            break;
        case "help":
            $commandManager->help($command->commandName, $command->params);
            break;
        case "quit":
            Helper::print("Goodbye");
            $on = false;
            break;
        default:
            Helper::print("Command '$command->commandName' not found!", 'error');
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

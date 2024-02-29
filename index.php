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
            draw($data);

            break;
        case "list":
            $data = $contact->all();
            draw($data);

            break;
        case "q":
            Helper::print("Goodbye");
            $on = false;
            break;
    }
}

function draw($data) {
    echo "+---+-------------------------------+-----------------------------------+----------------------+\n";
    echo "| # | Name                          | Email                             | Phone Number         |\n";
    echo "+---+-------------------------------+-----------------------------------+----------------------+\n";

    foreach ($data as $element) {
        printf(
            "| %-1s | %-29s | %-33s | %-20s |\n",
            $element['id'],
            $element['name'],
            $element['email'],
            $element['phone_number'],
        );
    }

    echo "+---+-------------------------------+-----------------------------------+----------------------+\n";
}

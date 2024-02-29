<?php

include './core/Database.php';

$db = new Database('database', 'ocp5', 'root', 'local');
$connection = $db->getConnection();

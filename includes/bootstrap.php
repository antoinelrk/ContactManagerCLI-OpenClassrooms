<?php

include_once './Constants.php';
include_once './core/Database.php';

$db = new Database(DB_HOST, DB_DATABASE, DB_USER, DB_PASSWORD);
$connection = $db->getConnection();

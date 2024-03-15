<?php

include_once './core/Database.php';

$db = new Database('database', 'ocp5', 'root', 'local');
$connection = $db->getConnection();
const REGEX = '/(\w+)\s*:\s*"([^"]+)"\s*|\s*(\w+)\s*:\s*(\S+)/';

<?php
require __DIR__ . '/../src/autoload.php';

$factory = new Factory;
$db = $factory->getDatabase();

$statement = new OrdersInYearStatement($db);
$rows      = $statement->execute((int) $_GET['jahr']);

$mapper = new OrderMapper;
$data = $mapper->map($rows);

header('Content-Type: application/json; charset=utf-8');
print json_encode($data) . PHP_EOL;

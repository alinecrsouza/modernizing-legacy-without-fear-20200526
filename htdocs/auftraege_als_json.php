<?php
require __DIR__ . '/../src/autoload.php';

$factory = new Factory;
$db = $factory->getDatabase();

$statement = new OrdersInYearStatement($db);
$rows      = $statement->execute((int) $_GET['jahr']);

$mapper = new OrderMapper;
$data = $mapper->map($rows);

$response = new Response;

$response->addHeader('Content-Type: application/json; charset=utf-8');

$response->setBody(json_encode($data) . PHP_EOL);

$response->send();

<?php
require __DIR__ . '/../src/autoload.php';

$factory = new Factory;

$request = Request::fromSuperglobals();

$action = $factory->getOrderListAction();

$action->execute($request)->send();

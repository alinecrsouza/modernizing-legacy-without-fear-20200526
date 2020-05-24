<?php
require __DIR__ . '/../src/autoload.php';

$factory = new Factory;

$action = $factory->getOrderListAction();

$action->execute()->send();

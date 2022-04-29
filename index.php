<?php

require __DIR__ . '/vendor/autoload.php';

$request = Symfony\Component\HttpFoundation\Request::createFromGlobals();

var_dump($request);
die();

// $name = isset($_GET['name']) ? $_GET['name'] : "World";

// printf('Hello %s', $name);

<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/controllers/HelloController.php';

$app = AppFactory::create();

$app->get('/hello',"HelloController:hello");   //gestito in /controllers/HelloController.php 

$app->get('/hello/{name}',"HelloController:hello_with_name");

$app->get('/json/{name}', "HelloController:json_name");

$app->run();
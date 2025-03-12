<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/controllers/HelloController.php';
require __DIR__ . '/controllers/AlunniController.php';


$app = AppFactory::create();

$app->get('/hello',"HelloController:hello");   //gestito in /controllers/HelloController.php 

$app->get('/hello/{name}',"HelloController:hello_with_name");

$app->get('/json/{name}', "HelloController:json_name");


//es da copiare dalla lavagna
$app->get('/alunni', "AlunniController:index");

$app->get('/alunni/{id}', "AlunniController:view");

//curl -X POST localhost:8080/alunni --data '{"nome":"aaa","cognome":"bbb"}' -H "Content-Type: application/json"
$app->post('/alunni', "AlunniController:create");

//curl -X PUT localhost:8080/alunni/{id} --data '{"nome":"stefano","cognome":"cherubini"}' -H "Content-Type: application/json"
//curl -X PUT localhost:8080/alunni/3 --data '{"nome":"Stefano","cognome":"il meglio"}' -H "Content-Type: application/json"

$app->put('/alunni/{id}', "AlunniController:update");

$app->run();


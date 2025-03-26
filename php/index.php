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

//ricerca
$app->get('/alunni', "AlunniController:search");

$app->get('/alunni/{id}', "AlunniController:view");

//curl -X POST localhost:8080/alunni -d '{"nome":"aaa","cognome":"bbb"}' -H "Content-Type: application/json"
$app->post('/alunni', "AlunniController:create");


//curl -X PUT localhost:8080/alunni/3 -d '{"nome":"Stefano","cognome":"il meglio"}' -H "Content-Type: application/json"
$app->put('/alunni/{id}', "AlunniController:update");


//curl -X DELETE localhost:8080/alunni/3 
$app->delete('/alunni/{id}', "AlunniController:delete");


$app->run();


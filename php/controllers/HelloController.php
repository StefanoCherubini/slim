<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HelloController{
    public function hello(Request $request, Response $response, array $args){    // intercetta la rotta /hello e stampa "Hello teste di minchia"
        $response->getBody()->write("Hello teste di minchia");
        return $response;
    }

    public function hello_with_name(Request $request, Response $response, array $args){  // intercetta la rotta /hello/{name} e stampa "Hello $name"
        $name = $args['name'];
        $response->getBody()->write("Hello $name");
        return $response;
    }

    public function json_name(Request $request, Response $response, array $args){    // intercetta la rotta /json/{name} e stampa "{'nome' : '$name'}" sotto forma di json
        $name = $args['name'];
        $response->getBody()->write("{'nome' : '$name'}"); 
        return $response-> withHeader('Content-Type', 'application/json');
    }
}
?>
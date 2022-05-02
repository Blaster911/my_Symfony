<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;



require __DIR__ . '/../vendor/autoload.php';


$request = Request::createFromGlobals();

$response = new Response();

$routes = require __DIR__ . '/../src/routes.php';



$context = new RequestContext();
$context->fromRequest($request);

$urlMatcher = new UrlMatcher($routes, $context);

$pathInfo = $request->getPathInfo();

try {
    extract($urlMatcher->match($pathInfo));


    ob_start();
    include __DIR__ . '/../src/pages/' . $_route . '.php';
    $response->setContent(ob_get_clean());
} catch (ResourceNotFoundException $e) {
    $response->setContent("La page demandée n'existe pas");
    $response->setStatusCode(404);
}
$resultat = $urlMatcher->match($pathInfo);



$response->send();
